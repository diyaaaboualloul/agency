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
            <form action="#">
              <div class="aximo-main-field">
                <label>Your name</label>
                <input type="text">
              </div>
              <div class="aximo-main-field">
                <label>Email Address</label>
                <input type="email">
              </div>
              <div class="aximo-main-field">
                <label>Phone No</label>
                <input type="text">
              </div>
              <div class="aximo-main-field">
                <label>Write your message here...</label>
                <textarea name="textarea"></textarea>
              </div>
              <button id="aximo-main-btn" type="submit">Send Message</button>
            </form>
          </div>
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
        <div class="col-xl-4 col-md-6">
          <a href="">
            <div class="aximo-contact-info-box wow fadeInUpX" data-wow-delay="0.1s">
              <div class="aximo-contact-info-icon">
                <img src="assets/images/icon/call2.svg" alt="">
              </div>
              <div class="aximo-contact-info-data">
                <span>Call us</span>
                <p>+088-234-6532-789</p>
                <p>+088-456-3217-005</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-4 col-md-6">
          <a href="">
            <div class="aximo-contact-info-box wow fadeInUpX" data-wow-delay="0.2s">
              <div class="aximo-contact-info-icon">
                <img src="assets/images/icon/email.svg" alt="">
              </div>
              <div class="aximo-contact-info-data">
                <span>Call us</span>
                <p>example@gmail.com</p>
                <p>example@gmail.com</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="aximo-contact-info-box wow fadeInUpX" data-wow-delay="0.3s">
            <div class="aximo-contact-info-icon">
              <img src="assets/images/icon/map.svg" alt="">
            </div>
            <div class="aximo-contact-info-data">
              <span>Office address</span>
              <p>4132 Thornridge City, New York.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end section -->

  <div class="section">
    <div class="container">
      <div class="aximo-map-wrap">
        <div id="map"></div>
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
