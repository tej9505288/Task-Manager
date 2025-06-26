<div class="task-card glass-card p-3 mb-3 shadow-sm" data-task-id="{{ $task->id }}" style="cursor: grab; transition: all 0.2s ease;">
    <div class="d-flex justify-content-between align-items-start mb-2">
        <h6 class="card-title mb-0 fw-semibold">{{ $task->title }}</h6>
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="editTask({{ $task->id }}, '{{ $task->title }}', '{{ $task->status }}')">
                    <i class="bi bi-pencil me-2"></i>Edit
                </a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#" onclick="deleteTask({{ $task->id }})">
                    <i class="bi bi-trash me-2"></i>Delete
                </a></li>
            </ul>
        </div>
    </div>
    
    <div class="d-flex align-items-center justify-content-between">
        <small class="text-muted">
            <i class="bi bi-calendar3 me-1"></i>
            {{ $task->created_at->format('M d, Y') }}
        </small>
        <span class="badge rounded-pill 
            @if($task->status === 'To Do') bg-primary-subtle text-primary
            @elseif($task->status === 'In Progress') bg-warning-subtle text-warning
            @else bg-success-subtle text-success
            @endif">
            {{ $task->status }}
        </span>
    </div>
    
    <div class="mt-3 d-flex gap-1">
        @if($task->status === 'To Do')
            <button class="btn btn-sm btn-primary rounded-pill" onclick="updateStatus({{ $task->id }}, 'In Progress')">
                <i class="bi bi-play-fill me-1"></i>Start
            </button>
        @elseif($task->status === 'In Progress')
            <button class="btn btn-sm btn-success rounded-pill" onclick="updateStatus({{ $task->id }}, 'Done')">
                <i class="bi bi-check-lg me-1"></i>Complete
            </button>
            <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="updateStatus({{ $task->id }}, 'To Do')">
                <i class="bi bi-arrow-left me-1"></i>Back
            </button>
        @else
            <button class="btn btn-sm btn-warning rounded-pill" onclick="updateStatus({{ $task->id }}, 'In Progress')">
                <i class="bi bi-arrow-clockwise me-1"></i>Reopen
            </button>
        @endif
    </div>
</div>

<!-- Edit Task Modal -->
<div class="modal fade" id="editTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="editTaskModalLabel{{ $task->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content glass-card">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="editTaskModalLabel{{ $task->id }}">
                    <i class="bi bi-pencil-square me-2"></i>Edit Task
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTitle{{ $task->id }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="editTitle{{ $task->id }}" name="title" value="{{ $task->title }}" required maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="editStatus{{ $task->id }}" class="form-label">Status</label>
                        <select class="form-select" id="editStatus{{ $task->id }}" name="status" required>
                            <option value="To Do" {{ $task->status === 'To Do' ? 'selected' : '' }}>To Do</option>
                            <option value="In Progress" {{ $task->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Done" {{ $task->status === 'Done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </div>
            </form>
        </div>
    </div>
</div> 