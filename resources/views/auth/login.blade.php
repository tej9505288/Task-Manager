@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-4">
            <div class="glass-card p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-kanban-fill fs-1 text-primary mb-3"></i>
                    <h3 class="fw-bold">Welcome Back</h3>
                    <p class="text-muted">Sign in to your account</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope me-2"></i>{{ __('Email Address') }}
                        </label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock me-2"></i>{{ __('Password') }}
                        </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Login') }}
                        </button>
                    </div>

                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        
                        @if (Route::has('register'))
                            <div class="mt-3">
                                <span class="text-muted">Don't have an account?</span>
                                <a class="text-decoration-none ms-1" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
