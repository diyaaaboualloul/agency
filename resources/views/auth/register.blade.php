<x-guest-layout>
   <div class="min-vh-90 d-flex align-items-center justify-content-center bg-light">
    <div class="card shadow-lg border-0 rounded-4 w-100" 
         style="max-width: 420px; max-height: 90vh; overflow-y: auto;">
      <div class="card-body p-4">
        <!-- Title -->
        <div class="text-center mb-2">
          <i class="bi bi-person-plus fs-1 text-success"></i>
          <h3 class="fw-bold text-dark mt-2">Create an Account</h3>
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <!-- Name -->
          <div class="mb-3">
            <label for="name" class="form-label fw-semibold">{{ __('Full Name') }}</label>
            <input id="name" type="text" name="name" 
                   class="form-control rounded-3 @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" 
                   class="form-control rounded-3 @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required autocomplete="username">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" 
                   class="form-control rounded-3 @error('password') is-invalid @enderror"
                   required autocomplete="new-password">
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Confirm Password -->
          <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" 
                   class="form-control rounded-3 @error('password_confirmation') is-invalid @enderror"
                   required autocomplete="new-password">
            @error('password_confirmation')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Actions -->
          <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('login') }}" class="small text-decoration-none text-primary fw-semibold">
              {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-success rounded-3 px-4 fw-bold">
              {{ __('Register') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-guest-layout>
