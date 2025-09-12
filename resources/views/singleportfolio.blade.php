@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')

<div class="aximo-breadcrumb">
    <div class="container">
      <h1 class="post__title">Portfolio Details</h1>
      <nav class="breadcrumbs">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li aria-current="page"> Portfolio Details</li>
        </ul>
      </nav>

    </div>
  </div>
  <!-- End breadcrumb -->

  <div class="aximo-project-single-section">
    <div class="container">
      <div class="aximo-project-single-thumb wow fadeInUpX" data-wow-delay="0.1s">
        <img src="assets/images/portfolio/p_single.png" alt="">
      </div>
      <div class="aximo-project-info-wrap">
        <div class="aximo-project-info">
          <h3>Client:</h3>
          <p>Alfado Company,UK</p>
        </div>
        <div class="aximo-project-info">
          <h3>Date:</h3>
          <p>June</p>
        </div>
        <div class="aximo-project-info">
          <h3>Duration:</h3>
          <p>Two Months</p>
        </div>
        <div class="aximo-project-info">
          <h3>Cost:</h3>
          <p>50k USD</p>
        </div>
      </div>
      <div class="aximo-project-single-wrap">
        <div class="row">
          <div class="col-lg-4 order-lg-2">
            <div class="aximo-project-single-thumb2 wow fadeInRight" data-wow-delay="0.1s">
              <img src="assets/images/portfolio/p_single2.png" alt="">
            </div>
          </div>
          <div class="col-lg-8">
            <div class="aximo-default-content m-right-gap">
              <h2>
                How we initiate and
                <span class="aximo-title-animation">
                resolve the project
                <span class="aximo-title-icon">
                  <img src="assets/images/v1/star2.png" alt="">
                </span>
                </span>
              </h2>
              <p>The project began when a leading technology identified a market need for an innovative and energy-efficient smart home thermostat.</p>
              <div class="aximo-resolve-project-wrap">
                <div class="aximo-resolve-project-item">
                  <h3>1. Concept Development:</h3>
                  <p>Based on the market research findings, the design team began developing conceptual designs for the smart thermostat. They brainstormed ideas, created mood boards, and explored various design directions.</p>
                </div>
                <div class="aximo-resolve-project-item">
                  <h3>2. Manufacturing and Production:</h3>
                  <p>Once the design was finalized, the project transitioned to the manufacturing phase. Materials, suppliers, and production processes were carefully selected to ensure quality and cost-effectiveness.</p>
                </div>
                <div class="aximo-resolve-project-item">
                  <h3>3. Success and Impact:</h3>
                  <p>The smart home thermostat quickly gained popularity and was well-received in the market. The project was a success, benefiting both the company and the environment.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end section -->

  <div class="section aximo-project-page aximo-section-padding">
    <div class="container">
      <div class="aximo-section-title center">
        <h2>
          Have a wide range of
          <span class="aximo-title-animation">
          creative projects
          <span class="aximo-title-icon">
            <img src="assets/images/v1/star2.png" alt="">
          </span>
          </span>
        </h2>
      </div>
    </div>
    <div class="swiper aximo-project-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="aximo-project-thumb">
            <img src="assets/images/portfolio/p_1.png" alt="">
            <div class="aximo-project-wrap">
              <div class="aximo-project-data">
                <a href="">
                  <h3>Product Design</h3>
                </a>
                <p>Developing the look and feel of physical products, aesthetics, and functionality.</p>
              </div>
              <a class="aximo-project-icon" href="">
                <svg width="34" height="28" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.9795 2C19.9795 2 20.5 8 25.9795 11.2C28.4887 12.6653 31.9795 14 31.9795 14M31.9795 14H2M31.9795 14C31.9795 14 28.5339 15.415 25.9795 16.8C19.9795 20.0533 19.9795 26 19.9795 26" stroke="#FDFDE1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="aximo-project-thumb">
            <img src="assets/images/portfolio/p_2.png" alt="">
            <div class="aximo-project-wrap">
              <div class="aximo-project-data">
                <a href="">
                  <h3>Logo and Branding</h3>
                </a>
                <p>Creating or refreshing a company's logo and developing a cohesive visual identity.</p>
              </div>
              <a class="aximo-project-icon" href="">
                <svg width="34" height="28" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.9795 2C19.9795 2 20.5 8 25.9795 11.2C28.4887 12.6653 31.9795 14 31.9795 14M31.9795 14H2M31.9795 14C31.9795 14 28.5339 15.415 25.9795 16.8C19.9795 20.0533 19.9795 26 19.9795 26" stroke="#FDFDE1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="aximo-project-thumb">
            <img src="assets/images/portfolio/p_3.png" alt="">
            <div class="aximo-project-wrap">
              <div class="aximo-project-data">
                <a href="">
                  <h3>App UI/UX Design</h3>
                </a>
                <p>Designing the UI/UXe for mobile apps and web applications to ensure usability & engagement.</p>
              </div>
              <a class="aximo-project-icon" href="">
                <svg width="34" height="28" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.9795 2C19.9795 2 20.5 8 25.9795 11.2C28.4887 12.6653 31.9795 14 31.9795 14M31.9795 14H2M31.9795 14C31.9795 14 28.5339 15.415 25.9795 16.8C19.9795 20.0533 19.9795 26 19.9795 26" stroke="#FDFDE1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="aximo-project-thumb">
            <img src="assets/images/portfolio/p_4.png" alt="">
            <div class="aximo-project-wrap">
              <div class="aximo-project-data">
                <a href="">
                  <h3>Packaging Design</h3>
                </a>
                <p>Creating packaging solutions for products that not only protect attract customers on store.</p>
              </div>
              <a class="aximo-project-icon" href="">
                <svg width="34" height="28" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.9795 2C19.9795 2 20.5 8 25.9795 11.2C28.4887 12.6653 31.9795 14 31.9795 14M31.9795 14H2M31.9795 14C31.9795 14 28.5339 15.415 25.9795 16.8C19.9795 20.0533 19.9795 26 19.9795 26" stroke="#FDFDE1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="aximo-project-thumb">
            <img src="assets/images/portfolio/p_5.png" alt="">
            <div class="aximo-project-wrap">
              <div class="aximo-project-data">
                <a href="">
                  <h3>Environmental Design</h3>
                </a>
                <p>Designing trade show booths, exhibition spaces, and immersive installations for events and conferences.</p>
              </div>
              <a class="aximo-project-icon" href="">
                <svg width="34" height="28" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.9795 2C19.9795 2 20.5 8 25.9795 11.2C28.4887 12.6653 31.9795 14 31.9795 14M31.9795 14H2M31.9795 14C31.9795 14 28.5339 15.415 25.9795 16.8C19.9795 20.0533 19.9795 26 19.9795 26" stroke="#FDFDE1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="aximo-project-thumb">
            <img src="assets/images/portfolio/p_6.png" alt="">
            <div class="aximo-project-wrap">
              <div class="aximo-project-data">
                <a href="">
                  <h3>Environmental Design</h3>
                </a>
                <p>Designing trade show booths, exhibition spaces, and immersive installations for events and conferences.</p>
              </div>
              <a class="aximo-project-icon" href="">
                <svg width="34" height="28" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.9795 2C19.9795 2 20.5 8 25.9795 11.2C28.4887 12.6653 31.9795 14 31.9795 14M31.9795 14H2M31.9795 14C31.9795 14 28.5339 15.415 25.9795 16.8C19.9795 20.0533 19.9795 26 19.9795 26" stroke="#FDFDE1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- End section -->




@endsection
