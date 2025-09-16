<x-app-layout>
    <x-slot name="header">
        <h2 class="h4">✏️ Edit Contact Info</h2>
    </x-slot>

    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.contact-info.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Agency Name</label>
                        <input type="text" name="agency_name"
                               value="{{ old('agency_name', $contactInfo->agency_name) }}"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                               value="{{ old('email', $contactInfo->email) }}"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone"
                               value="{{ old('phone', $contactInfo->phone) }}"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">WhatsApp</label>
                        <input type="text" name="whatsapp"
                               value="{{ old('whatsapp', $contactInfo->whatsapp) }}"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address Line 1</label>
                        <input type="text" name="address_line1"
                               value="{{ old('address_line1', $contactInfo->address_line1) }}"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address Line 2</label>
                        <input type="text" name="address_line2"
                               value="{{ old('address_line2', $contactInfo->address_line2) }}"
                               class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city"
                                   value="{{ old('city', $contactInfo->city) }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">State</label>
                            <input type="text" name="state"
                                   value="{{ old('state', $contactInfo->state) }}"
                                   class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        💾 Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
