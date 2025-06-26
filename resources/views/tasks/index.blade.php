@extends('layouts.app')

@section('content')
<div class="container py-3">
    <!-- Success Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show glass-card" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0"><i class="bi bi-kanban-fill text-primary"></i> Teja's Task Manager</h2>
        <button class="btn btn-primary rounded-pill shadow-sm px-4" data-bs-toggle="modal" data-bs-target="#taskCreateModal">
            <i class="bi bi-plus-circle me-2"></i> Add Task
        </button>
    </div>
    
    <div class="row g-4 kanban-board">
        <!-- To Do Column -->
        <div class="col-md-4">
            <div class="glass-card p-3 h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-list-task fs-4 text-primary me-2"></i>
                    <h5 class="mb-0">To Do <span class="badge bg-primary-subtle text-primary ms-2">{{ $todoTasks->count() }}</span></h5>
                </div>
                <div class="kanban-column" id="todo-column">
                    @forelse($todoTasks as $task)
                        @include('tasks.partials.card', ['task' => $task])
                    @empty
                        <div class="text-center text-muted py-4">
                            <i class="bi bi-inbox fs-2 mb-2"></i>
                            <p>No tasks in To Do</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        <!-- In Progress Column -->
        <div class="col-md-4">
            <div class="glass-card p-3 h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-lightning-charge-fill fs-4 text-warning me-2"></i>
                    <h5 class="mb-0">In Progress <span class="badge bg-warning-subtle text-warning ms-2">{{ $inProgressTasks->count() }}</span></h5>
                </div>
                <div class="kanban-column" id="progress-column">
                    @forelse($inProgressTasks as $task)
                        @include('tasks.partials.card', ['task' => $task])
                    @empty
                        <div class="text-center text-muted py-4">
                            <i class="bi bi-clock-history fs-2 mb-2"></i>
                            <p>No tasks in progress</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        <!-- Done Column -->
        <div class="col-md-4">
            <div class="glass-card p-3 h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-check-circle-fill fs-4 text-success me-2"></i>
                    <h5 class="mb-0">Done <span class="badge bg-success-subtle text-success ms-2">{{ $doneTasks->count() }}</span></h5>
                </div>
                <div class="kanban-column" id="done-column">
                    @forelse($doneTasks as $task)
                        @include('tasks.partials.card', ['task' => $task])
                    @empty
                        <div class="text-center text-muted py-4">
                            <i class="bi bi-check2-circle fs-2 mb-2"></i>
                            <p>No completed tasks</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Task Modal -->
<div class="modal fade" id="taskCreateModal" tabindex="-1" aria-labelledby="taskCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content glass-card">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="taskCreateModalLabel"><i class="bi bi-plus-circle me-2"></i> Add New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="To Do">To Do</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
    // Initialize drag-and-drop when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Drag-and-drop Kanban columns
        ['todo-column', 'progress-column', 'done-column'].forEach(function(id) {
            const element = document.getElementById(id);
            if (element) {
                new Sortable(element, {
                    group: 'kanban',
                    animation: 200,
                    onEnd: function (evt) {
                        const taskId = evt.item.getAttribute('data-task-id');
                        let newStatus = '';
                        if (evt.to.id === 'todo-column') newStatus = 'To Do';
                        if (evt.to.id === 'progress-column') newStatus = 'In Progress';
                        if (evt.to.id === 'done-column') newStatus = 'Done';
                        if (taskId && newStatus) {
                            fetch(`/tasks/${taskId}/status`, {
                                method: 'PATCH',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({ status: newStatus })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Task status updated',
                                        showConfirmButton: false,
                                        timer: 1200
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire('Error', 'Could not update status', 'error');
                            });
                        }
                    }
                });
            }
        });
    });
</script>
@endpush
@endsection 