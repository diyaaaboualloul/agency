<section>
    <header class="mb-4">
        <h2 class="h4 text-white fw-bold">
            🙍 Profile Information
        </h2>
        <p class="text-light small">
            Update your account's profile information and email address.
        </p>
    </header>

    {{-- Send verification form --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Update profile --}}
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   value="{{ old('name', $user->name) }}" 
                   required autofocus autocomplete="name"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" 
                   id="email" 
                   name="email" 
                   value="{{ old('email', $user->email) }}" 
                   required autocomplete="username"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-warning small">
                        Your email address is unverified.
                        <button form="send-verification" 
                                class="btn btn-link btn-sm text-decoration-underline p-0">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small fw-semibold">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Save Button --}}
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                💾 Save
            </button>

            @if (session('status') === 'profile-updated')
                <span class="text-success small fw-semibold">✔ Saved.</span>
            @endif
        </div>
    </form>
</section>
