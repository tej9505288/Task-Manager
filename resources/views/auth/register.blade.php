@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-4">
            <div class="glass-card p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-person-plus-fill fs-1 text-primary mb-3"></i>
                    <h3 class="fw-bold">Create Account</h3>
                    <p class="text-muted">Join us and start managing your tasks</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="bi bi-person me-2"></i>{{ __('Name') }}
                        </label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope me-2"></i>{{ __('Email Address') }}
                        </label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email">
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
                               name="password" required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">
                            <i class="bi bi-shield-lock me-2"></i>{{ __('Confirm Password') }}
                        </label>
                        <input id="password-confirm" type="password" class="form-control" 
                               name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-person-plus me-2"></i>{{ __('Register') }}
                        </button>
                    </div>

                    <div class="text-center">
                        <span class="text-muted">Already have an account?</span>
                        <a class="text-decoration-none ms-1" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
