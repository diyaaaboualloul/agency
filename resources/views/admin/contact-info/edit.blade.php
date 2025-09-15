<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Contact Info</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        @if(session('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.contact-info.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block">Agency Name</label>
                <input type="text" name="agency_name" 
                       value="{{ old('agency_name', $contactInfo->agency_name) }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block">Email</label>
                <input type="email" name="email" 
                       value="{{ old('email', $contactInfo->email) }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block">Phone</label>
                <input type="text" name="phone" 
                       value="{{ old('phone', $contactInfo->phone) }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block">WhatsApp</label>
                <input type="text" name="whatsapp" 
                       value="{{ old('whatsapp', $contactInfo->whatsapp) }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block">Address Line 1</label>
                <input type="text" name="address_line1" 
                       value="{{ old('address_line1', $contactInfo->address_line1) }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block">Address Line 2</label>
                <input type="text" name="address_line2" 
                       value="{{ old('address_line2', $contactInfo->address_line2) }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block">City</label>
                <input type="text" name="city" 
                       value="{{ old('city', $contactInfo->city) }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block">State</label>
                <input type="text" name="state" 
                       value="{{ old('state', $contactInfo->state) }}"
                       class="w-full border rounded p-2">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                Save Changes
            </button>
        </form>
    </div>
</x-app-layout>
