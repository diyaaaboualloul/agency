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

                    {{-- Agency Info --}}
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

                  {{-- Map Picker --}}
<div class="mb-3">
    <label class="form-label">📍 Agency Location</label>
    <div id="map" style="height: 300px;" class="mb-3 border rounded"></div>

    <input type="hidden" name="latitude" id="latitude" 
           value="{{ old('latitude', $contactInfo->latitude) }}">
    <input type="hidden" name="longitude" id="longitude" 
           value="{{ old('longitude', $contactInfo->longitude) }}">
</div>

                    <button type="submit" class="btn btn-primary">
                        💾 Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
{{-- Leaflet JS & Script --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // ✅ If DB has values, use them. Otherwise, fallback to Beirut
        let lat = parseFloat("{{ $contactInfo->latitude ?? 33.8938 }}");
        let lng = parseFloat("{{ $contactInfo->longitude ?? 35.5018 }}");

        let map = L.map('map').setView([lat, lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        let marker = L.marker([lat, lng], {draggable:true}).addTo(map);

        function updateInputs(lat, lng) {
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        }

        // Update on drag
        marker.on('dragend', function () {
            let pos = marker.getLatLng();
            updateInputs(pos.lat, pos.lng);
        });

        // Update on click
        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            updateInputs(e.latlng.lat, e.latlng.lng);
        });

        updateInputs(lat, lng);
    });
</script>

</x-app-layout>
