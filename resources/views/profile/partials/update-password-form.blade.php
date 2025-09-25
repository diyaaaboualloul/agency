<section>
    <header class="mb-4">
        <h2 class="h4 text-white fw-bold">
            🔒 Update Password
        </h2>
        <p class="text-light small">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div class="mb-3">
            <label for="current_password" class="form-label fw-semibold">Current Password</label>
            <input type="password" 
                   id="current_password" 
                   name="current_password" 
                   autocomplete="current-password"
                   class="form-control @error('current_password', 'updatePassword') is-invalid @enderror">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- New Password --}}
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">New Password</label>
            <input type="password" 
                   id="password" 
                   name="password" 
                   autocomplete="new-password"
                   class="form-control @error('password', 'updatePassword') is-invalid @enderror">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
            <input type="password" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   autocomplete="new-password"
                   class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror">
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Save Button --}}
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-success">
                💾 Save
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-success small fw-semibold">✔ Saved.</span>
            @endif
        </div>
    </form>
</section>
