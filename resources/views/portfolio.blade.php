@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')

 <div class="aximo-breadcrumb">
    <div class="container">
      <h1 class="post__title">Portfolio One Column</h1>
      <nav class="breadcrumbs">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li aria-current="page"> Portfolio One Column</li>
        </ul>
      </nav>

    </div>
  </div>
  <!-- End breadcrumb -->

  <div class="aximo-project-one-column">
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
      <div class="aximo-project-wrap3 wow fadeInUpX" data-wow-delay="0.1s">
        <div class="aximo-project-thumb3">
          <img src="assets/images/portfolio/p_9.png" alt="">
          <a href="single-portfolio.html" class="aximo-project-link">
            <img src="assets/images/icon/link2.svg" alt="">
          </a>
        </div>
        <div class="aximo-project-data3">
          <h3><a href="single-portfolio.html">Product Design</a></h3>
          <p>Developing the look and feel of physical products, considering ergonomics, aesthetics, & functionality.</p>
        </div>
      </div>
      <div class="aximo-project-wrap3 wow fadeInUpX" data-wow-delay="0.2s">
        <div class="aximo-project-thumb3">
          <img src="assets/images/portfolio/p_10.png" alt="">
          <a href="single-portfolio.html" class="aximo-project-link">
            <img src="assets/images/icon/link2.svg" alt="">
          </a>
        </div>
        <div class="aximo-project-data3">
          <h3> <a href="single-portfolio.html">Market Expansion Blueprint</a></h3>
          <p>Develop a comprehensive strategy to expand your market reach, identify new opportunities, and grow</p>
        </div>
      </div>
      <div class="aximo-project-wrap3 wow fadeInUpX" data-wow-delay="0.3s">
        <div class="aximo-project-thumb3">
          <img src="assets/images/portfolio/p_11.png" alt="">
          <a href="single-portfolio.html" class="aximo-project-link">
            <img src="assets/images/icon/link2.svg" alt="">
          </a>
        </div>
        <div class="aximo-project-data3">
          <h3><a href="single-portfolio.html">Strategic Growth Accelerator</a></h3>
          <p>Develop a growth-focused on strategy, including all the market expansion, and the product development.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- End section -->


@endsection
