@extends('layouts.frontend')

@section('title', 'Contact Us')

@section('content')

  {{-- Breadcrumb with background image --}}
  <div class="aximo-breadcrumb" 
       style="margin-top: 70px; background: url('{{ asset('assets/images/contact/braedcrupm imgg.jpg') }}') center/cover no-repeat; padding: 80px 0; color: #fff;">
    <div class="container text-center">
      <h1 class="post__title fw-bold" style="color: #fff;">Contact Us</h1>
      <nav class="breadcrumbs">
        <ul class="d-inline-flex list-unstyled justify-content-center gap-2">
          <li><a href="{{ url('/') }}" class="text-white fw-semibold">Home</a></li>
          <li aria-current="page" class="text-light">/ Contact Us</li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->

  {{-- Contact Form --}}
  <div class="section py-5">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6">
          <div class="mb-4">
            <h2 class="fw-bold">Let’s Talk 📩</h2>
            <p class="text-muted">We’d love to hear from you! Fill in the form and our team will get back to you as soon as possible.</p>
          </div>

          {{-- Success / Error Message --}}
          <div id="form-message"></div>

          <form id="contactForm" class="p-4 bg-light shadow rounded">
            @csrf
            <div class="mb-3">
              <label class="form-label">Your Name</label>
              <input type="text" name="name" class="form-control" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="+961 70 123 456">
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Write your message..." required></textarea>
            </div>
            <button id="aximo-main-btn" type="submit" class="btn btn-primary w-100 fw-semibold">
              Send Message 🚀
            </button>
          </form>
        </div>

        <div class="col-lg-6 text-center">
          <img src="{{ asset('assets/images/contact/ContactUs_3.jpg') }}" 
               alt="Contact Illustration" 
               class="img-fluid wow fadeInRight rounded shadow">
        </div>
      </div>
    </div>
  </div>

  {{-- Contact Info --}}
  <div class="section py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">📌 Get in Touch</h2>
        <p class="text-muted">Here’s how you can reach us directly.</p>
      </div>
      <div class="row g-4">
        {{-- Phone --}}
        <div class="col-md-4">
          <div class="card shadow h-100 border-0 text-center p-4">
            <div class="mb-3">
              <i class="bi bi-telephone-fill text-primary fs-1"></i>
            </div>
            <h5 class="fw-bold">Call Us</h5>
            <p class="mb-1">{{ $contactInfo->phone }}</p>
            <p class="mb-0 text-muted">WhatsApp: {{ $contactInfo->whatsapp }}</p>
          </div>
        </div>
        {{-- Email --}}
        <div class="col-md-4">
          <div class="card shadow h-100 border-0 text-center p-4">
            <div class="mb-3">
              <i class="bi bi-envelope-fill text-success fs-1"></i>
            </div>
            <h5 class="fw-bold">Email Us</h5>
            <p class="mb-0">{{ $contactInfo->email }}</p>
          </div>
        </div>
        {{-- Address --}}
        <div class="col-md-4">
          <div class="card shadow h-100 border-0 text-center p-4">
            <div class="mb-3">
              <i class="bi bi-geo-alt-fill text-danger fs-1"></i>
            </div>
            <h5 class="fw-bold">Visit Us</h5>
            <p class="mb-0">
              {{ $contactInfo->address_line1 }} <br>
              {{ $contactInfo->city }}, {{ $contactInfo->state }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Map --}}
  <div class="section py-0">
    <div class="container-fluid px-0">
      @if($contactInfo && $contactInfo->latitude && $contactInfo->longitude)
        <iframe 
          width="100%" 
          height="450" 
          style="border:0;" 
          loading="lazy" 
          allowfullscreen 
          referrerpolicy="no-referrer-when-downgrade"
          src="https://www.google.com/maps?q={{ $contactInfo->latitude }},{{ $contactInfo->longitude }}&hl=en&z=15&output=embed">
        </iframe>
      @else
        <p class="text-center text-muted py-5">📍 Map location not available yet.</p>
      @endif
    </div>
  </div>

  {{-- AJAX Form Submission --}}
  <script>
    document.getElementById("contactForm").addEventListener("submit", async function(e) {
      e.preventDefault();

      let form = e.target;
      let formData = new FormData(form);

      let response = await fetch("{{ route('contact.store') }}", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        },
        body: formData
      });

      let messageBox = document.getElementById("form-message");

      if (response.ok) {
        messageBox.innerHTML =
          `<div class="alert alert-success mt-3">✅ Your message has been sent successfully!</div>`;
        form.reset();
      } else {
        messageBox.innerHTML =
          `<div class="alert alert-danger mt-3">❌ Something went wrong. Please try again.</div>`;
      }
    });
  </script>

@endsection
