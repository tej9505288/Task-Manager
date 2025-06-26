<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">

    <!-- Custom Glassmorphism Styles -->
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
            min-height: 100vh;
        }
        .glass-card {
            background: rgba(255,255,255,0.85);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.12);
            backdrop-filter: blur(6px);
            border-radius: 1.2rem;
            border: 1px solid rgba(255,255,255,0.18);
        }
        .navbar-glass {
            background: rgba(255,255,255,0.95)!important;
            box-shadow: 0 2px 8px rgba(31,38,135,0.07);
            backdrop-filter: blur(4px);
        }
        .footer-glass {
            background: rgba(255,255,255,0.85);
            box-shadow: 0 -2px 8px rgba(31,38,135,0.07);
            backdrop-filter: blur(4px);
            border-top: 1px solid #e0e7ef;
        }
        .task-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .task-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.15);
            border-color: rgba(255,255,255,0.3);
        }
        .kanban-column {
            min-height: 200px;
        }
        .kanban-column .sortable-ghost {
            opacity: 0.5;
            background: rgba(0,123,255,0.1);
            border: 2px dashed #007bff;
        }
        .btn {
            transition: all 0.2s ease;
        }
        .btn:hover {
            transform: translateY(-1px);
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.12);
            backdrop-filter: blur(6px);
            border-radius: 0.8rem;
        }
        .modal-content {
            border: none;
            box-shadow: 0 20px 60px 0 rgba(31, 38, 135, 0.15);
        }
        .form-control, .form-select {
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 0.8rem;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.15);
        }
        .badge {
            font-weight: 500;
        }
        .avatar {
            transition: all 0.2s ease;
        }
        .avatar:hover {
            transform: scale(1.1);
        }
        
        /* Ensure dropdown menu displays properly */
        .dropdown-menu.show {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
        
        /* Debug styles */
        .dropdown-menu {
            transition: all 0.2s ease;
        }
    </style>

    <!-- Scripts -->
    <!-- Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-9490438c.css') }}">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <!-- Bootstrap JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script type="module" src="{{ asset('build/assets/app-b7637e8f.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-glass sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <i class="bi bi-kanban-fill fs-3 text-primary"></i>
                    <span class="fw-bold">Task Manager</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tasks.index') }}">
                                    <i class="bi bi-list-task"></i> My Tasks
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="avatar bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center" style="width:32px;height:32px;">
                                        <i class="bi bi-person-fill"></i>
                                    </span>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item p-0">
                                        @csrf
                                        <button type="submit" class="btn btn-link text-decoration-none w-100 text-start px-3 py-2">
                                            <i class="bi bi-box-arrow-right me-2"></i>{{ __('Logout') }}
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer-glass py-3 mt-auto text-center small text-muted">
            <div class="container">
                <span>&copy; {{ date('Y') }} Task Manager. All rights reserved.</span>
            </div>
        </footer>
    </div>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    
    <!-- Global JavaScript Functions -->
    <script>
        // Initialize Bootstrap dropdowns with more robust handling
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing dropdowns...');
            
            // Method 1: Try using Bootstrap's built-in initialization
            try {
                var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
                console.log('Found dropdown elements:', dropdownElementList.length);
                
                dropdownElementList.forEach(function (dropdownToggleEl) {
                    console.log('Initializing dropdown for:', dropdownToggleEl);
                    new bootstrap.Dropdown(dropdownToggleEl, {
                        autoClose: true
                    });
                });
            } catch (error) {
                console.error('Bootstrap dropdown initialization failed:', error);
            }
            
            // Method 2: Manual click handler as fallback
            const profileDropdown = document.getElementById('navbarDropdown');
            if (profileDropdown) {
                console.log('Adding manual click handler to profile dropdown');
                profileDropdown.addEventListener('click', function(e) {
                    e.preventDefault();
                    const dropdownMenu = this.nextElementSibling;
                    if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
                        dropdownMenu.classList.toggle('show');
                        console.log('Toggled dropdown menu');
                    }
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!profileDropdown.contains(e.target)) {
                        const dropdownMenu = profileDropdown.nextElementSibling;
                        if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
                            dropdownMenu.classList.remove('show');
                        }
                    }
                });
            }
        });

        // Global functions for task management
        function editTask(taskId, title, status) {
            document.getElementById('editTitle' + taskId).value = title;
            document.getElementById('editStatus' + taskId).value = status;
            new bootstrap.Modal(document.getElementById('editTaskModal' + taskId)).show();
        }

        function deleteTask(taskId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/tasks/${taskId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Task deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            throw new Error('Delete failed');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Error', 'Could not delete task', 'error');
                    });
                }
            });
        }

        function updateStatus(taskId, status) {
            fetch(`/tasks/${taskId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: status })
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
                    }).then(() => {
                        location.reload();
                    });
                }
            })
            .catch(error => {
                Swal.fire('Error', 'Could not update status', 'error');
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>
