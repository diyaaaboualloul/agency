<x-guest-layout>
  <div class="min-vh-90 d-flex align-items-center justify-content-center bg-light">
    <div class="card shadow-lg border-0 rounded-4 w-100" 
         style="max-width: 420px; max-height: 95vh; overflow-y: auto;">
      <div class="card-body p-4">
        <!-- Logo / Title -->
        <div class="text-center mb-4">
          <div class="mb-3">
            <i class="bi bi-shield-lock fs-1 text-primary"></i>
          </div>
          <h3 class="fw-bold text-dark mb-1">Welcome Back</h3>
          <p class="text-muted">Login to continue</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" 
                   class="form-control rounded-3 @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" 
                   class="form-control rounded-3 @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Remember Me -->
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
              <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            @if (Route::has('password.request'))
              <a class="small text-decoration-none text-primary fw-semibold" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
              </a>
            @endif
          </div>

          <!-- Login Button -->
          <div class="d-grid">
            <button type="submit" class="btn btn-primary rounded-3 py-2 fw-bold">
              {{ __('Log in') }}
            </button>
          </div>
        </form>

        <!-- Register CTA -->
        @if (Route::has('register'))
          <div class="text-center mt-4">
            <p class="mb-1 text-muted">Don’t have an account?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-success rounded-3 fw-semibold">
              {{ __('Register Now') }}
            </a>
          </div>
        @endif
      </div>
    </div>
  </div>
</x-guest-layout>
