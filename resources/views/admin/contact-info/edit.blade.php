@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        <h2 class="h3 mb-3 text-white fw-bold">✏️ Edit Contact Info</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.contact-info.update') }}">
            @csrf
            @method('PUT')

            {{-- Agency Info --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Agency Name</label>
                <input type="text" name="agency_name" 
                       value="{{ old('agency_name', $contactInfo->agency_name) }}"
                       class="form-control custom-input">
            </div>

            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Email</label>
                <input type="email" name="email" 
                       value="{{ old('email', $contactInfo->email) }}"
                       class="form-control custom-input">
            </div>

            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Phone</label>
                <input type="text" name="phone" 
                       value="{{ old('phone', $contactInfo->phone) }}"
                       class="form-control custom-input">
            </div>

            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">WhatsApp</label>
                <input type="text" name="whatsapp" 
                       value="{{ old('whatsapp', $contactInfo->whatsapp) }}"
                       class="form-control custom-input">
            </div>

            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Address Line 1</label>
                <input type="text" name="address_line1" 
                       value="{{ old('address_line1', $contactInfo->address_line1) }}"
                       class="form-control custom-input">
            </div>

            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Address Line 2</label>
                <input type="text" name="address_line2" 
                       value="{{ old('address_line2', $contactInfo->address_line2) }}"
                       class="form-control custom-input">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold fs-5">City</label>
                    <input type="text" name="city" 
                           value="{{ old('city', $contactInfo->city) }}"
                           class="form-control custom-input">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold fs-5">State</label>
                    <input type="text" name="state" 
                           value="{{ old('state', $contactInfo->state) }}"
                           class="form-control custom-input">
                </div>
            </div>

            {{-- Map Picker --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">📍 Agency Location</label>
                <div id="map" style="height: 300px; border-radius: 8px; overflow: hidden;" class="mb-3"></div>

                <input type="hidden" name="latitude" id="latitude" 
                       value="{{ old('latitude', $contactInfo->latitude) }}">
                <input type="hidden" name="longitude" id="longitude" 
                       value="{{ old('longitude', $contactInfo->longitude) }}">
            </div>

            {{-- Actions --}}
            <button type="submit" class="btn btn-success btn-lg">💾 Save Changes</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg">⬅ Back</a>
        </form>
    </div>
</div>
@endsection

{{-- Leaflet CSS/JS --}}
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    .content-centered {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(6px);
    }

    .custom-input {
        background: rgba(255,255,255,0.1);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.3);
    }
    .custom-input:focus {
        background: rgba(255,255,255,0.15);
        border-color: #0d6efd;
        box-shadow: 0 0 6px #0d6efd;
        color: #fff;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
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

    marker.on('dragend', function () {
        let pos = marker.getLatLng();
        updateInputs(pos.lat, pos.lng);
    });

    map.on('click', function (e) {
        marker.setLatLng(e.latlng);
        updateInputs(e.latlng.lat, e.latlng.lng);
    });

    updateInputs(lat, lng);
});
</script>
@endpush
