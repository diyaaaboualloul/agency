<section>
    <header class="mb-4">
        <h2 class="h4 text-danger fw-bold">
            ⚠️ Delete Account
        </h2>
        <p class="text-light small">
            Once your account is deleted, all of its resources and data will be permanently deleted. 
            Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    {{-- Delete Account Button (opens modal) --}}
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
        🗑 Delete Account
    </button>

    {{-- Confirm Delete Modal --}}
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-0 shadow-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-danger fw-bold" id="confirmDeleteModalLabel">
                        Are you sure you want to delete your account?
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-3">
                        Once your account is deleted, all of its resources and data will be permanently deleted.  
                        Please enter your password to confirm you would like to permanently delete your account.
                    </p>

                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="delete_password" class="form-label fw-semibold">Password</label>
                            <input type="password" 
                                   id="delete_password" 
                                   name="password" 
                                   placeholder="Enter your password"
                                   class="form-control @error('password', 'userDeletion') is-invalid @enderror">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
