@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')

  <div class="aximo-breadcrumb">
    <div class="container">
      <h1 class="post__title">Contact Us</h1>
      <nav class="breadcrumbs">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li aria-current="page"> Contact Us</li>
        </ul>
      </nav>

    </div>
  </div>
  <!-- End breadcrumb -->

  <div class="section aximo-section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="aximo-section-title">
            <h2>
              <span class="aximo-title-animation">
              Contact us for a
              <span class="aximo-title-icon">
                <img src="assets/images/v1/star2.png" alt="">
              </span>
              </span>
              personal experience
            </h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-5 order-lg-2">
          <div class="aximo-contact-thumb wow fadeInRight" data-wow-delay="0.1s">
            <img src="assets/images/contact/contact-thumb.png" alt="">
          </div>
        </div>
        <div class="col-lg-7">
       <div class="aximo-main-form">
    <div id="form-message"></div> {{-- 🔹 Success/Error message placeholder --}}

    <form id="contactForm">
        @csrf
        <div class="aximo-main-field">
            <label>Your name</label>
            <input type="text" name="name" required>
        </div>
        <div class="aximo-main-field">
            <label>Email Address</label>
            <input type="email" name="email" required>
        </div>
        <div class="aximo-main-field">
            <label>Phone No</label>
            <input type="text" name="phone">
        </div>
        <div class="aximo-main-field">
            <label>Write your message here...</label>
            <textarea name="message" required></textarea>
        </div>
        <button id="aximo-main-btn" type="submit">Send Message</button>
    </form>
</div>

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

    if (response.ok) {
        document.getElementById("form-message").innerHTML =
            `<div class="alert alert-success" style="margin: 15px 0; padding: 10px; border: 1px solid #28a745; background: #d4edda; color: #155724; border-radius: 5px;">
                ✅ Your message has been sent successfully!
             </div>`;
        form.reset(); // clear form
    } else {
        document.getElementById("form-message").innerHTML =
            `<div class="alert alert-danger">❌ Something went wrong. Please try again.</div>`;
    }
});
</script>


        </div>

      </div>
    </div>
  </div>
  <!-- End section -->
<div class="aximo-contact-info-section">
    <div class="container">
        <div class="aximo-contact-info-title">
            <h2>
                <span class="aximo-title-animation">
                Contact Information
                <span class="aximo-title-icon">
                    <img src="assets/images/v1/star2.png" alt="">
                </span>
                </span>
            </h2>
        </div>
        <div class="row">
            {{-- Phone --}}
            <div class="col-xl-4 col-md-6">
                <a href="tel:{{ $contactInfo->phone }}">
                    <div class="aximo-contact-info-box wow fadeInUpX" data-wow-delay="0.1s">
                        <div class="aximo-contact-info-icon">
                            <img src="assets/images/icon/call2.svg" alt="">
                        </div>
                        <div class="aximo-contact-info-data">
                            <span>Call us</span>
                            <p>{{ $contactInfo->phone }}</p>
                            <p>{{ $contactInfo->whatsapp }}</p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Email --}}
            <div class="col-xl-4 col-md-6">
                <a href="mailto:{{ $contactInfo->email }}">
                    <div class="aximo-contact-info-box wow fadeInUpX" data-wow-delay="0.2s">
                        <div class="aximo-contact-info-icon">
                            <img src="assets/images/icon/email.svg" alt="">
                        </div>
                        <div class="aximo-contact-info-data">
                            <span>Email us</span>
                            <p>{{ $contactInfo->email }}</p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Address --}}
            <div class="col-xl-4 col-md-6">
                <div class="aximo-contact-info-box wow fadeInUpX" data-wow-delay="0.3s">
                    <div class="aximo-contact-info-icon">
                        <img src="assets/images/icon/map.svg" alt="">
                    </div>
                    <div class="aximo-contact-info-data">
                        <span>Office address</span>
                        <p>{{ $contactInfo->address_line1 }}, {{ $contactInfo->city }}, {{ $contactInfo->state }} {{ $contactInfo->postal_code }}</p>
                        <p>{{ $contactInfo->country }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="section">
    <div class="container">
        <div class="aximo-map-wrap">
            @if($contactInfo && $contactInfo->map_embed_url)
                {{-- ✅ Show Google Map from DB --}}
                <iframe 
                    src="{{ $contactInfo->map_embed_url }}" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            @else
                {{-- ❌ Fallback if no map is set in DB --}}
                <p style="color: gray; text-align: center;">Map location is not available yet.</p>
            @endif
        </div>
    </div>
</div>

  </div>
  <!-- end section -->

  <div class="section aximo-section-padding">
    <div class="container">
      <div class="aximo-section-title center">
        <h2>
          These FAQs help
          <span class="aximo-title-animation">
          clients learn about us
          <span class="aximo-title-icon">
            <img src="assets/images/v1/star2.png" alt="">
          </span>
          </span>
        </h2>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="aximo-accordion-normal-wrap responsive-margin">
            <div class="aximo-accordion-normal-item">
              <div class="aximo-accordion-normal-icon">
                <img src="assets/images/icon/question.svg" alt="">
              </div>
              <div class="aximo-accordion-normal-data">
                <h3>What services does agency offer?</h3>
                <p>Clients often seek to understand the range of design services an agency provides, such as graphic design, web design, branding.</p>
              </div>
            </div>
            <div class="aximo-accordion-normal-item">
              <div class="aximo-accordion-normal-icon">
                <img src="assets/images/icon/question.svg" alt="">
              </div>
              <div class="aximo-accordion-normal-data">
                <h3>What is your design process like?</h3>
                <p>Explaining the design agency's process from initial concept to final delivery helps clients understand what to expect.</p>
              </div>
            </div>
            <div class="aximo-accordion-normal-item">
              <div class="aximo-accordion-normal-icon">
                <img src="assets/images/icon/question.svg" alt="">
              </div>
              <div class="aximo-accordion-normal-data">
                <h3>How much does design work cost?</h3>
                <p>The cost of our design services varies depending on the scope of the project. We provide customized quotes after discussing requirements.</p>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-6">
          <div class="aximo-accordion-normal-wrap">
            <div class="aximo-accordion-normal-item">
              <div class="aximo-accordion-normal-icon">
                <img src="assets/images/icon/question.svg" alt="">
              </div>
              <div class="aximo-accordion-normal-data">
                <h3>What's your design process like?</h3>
                <p>Our design process typically involves discovery, concept development, design, revisions based on feedback, and finalization.</p>
              </div>
            </div>
            <div class="aximo-accordion-normal-item">
              <div class="aximo-accordion-normal-icon">
                <img src="assets/images/icon/question.svg" alt="">
              </div>
              <div class="aximo-accordion-normal-data">
                <h3>How do you handle user feedback?</h3>
                <p>We value client feedback and work closely with you to make sure user happy with the final design. We offer a specific number of revisions.</p>
              </div>
            </div>
            <div class="aximo-accordion-normal-item">
              <div class="aximo-accordion-normal-icon">
                <img src="assets/images/icon/question.svg" alt="">
              </div>
              <div class="aximo-accordion-normal-data">
                <h3>Can we see samples of your work?</h3>
                <p>Yes, we're proud to showcase a portfolio of our previous projects. You can find examples of our work on our website or view our portfolio.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End section -->


@endsection
