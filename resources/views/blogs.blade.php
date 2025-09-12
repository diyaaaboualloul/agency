@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')

  <div class="aximo-breadcrumb">
    <div class="container">
      <h1 class="post__title">Our Blog</h1>
      <nav class="breadcrumbs">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li aria-current="page"> Our Blog</li>
        </ul>
      </nav>

    </div>
  </div>
  <!-- End breadcrumb -->

  <div class="section aximo-section-padding2">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="single-post-item wow fadeInUpX" data-wow-delay="0.1s">
            <div class="post-thumbnail">
              <img src="assets/images/blog/blog3.png" alt="">
            </div>
            <div class="post-content">
              <div class="post-meta">
                <div class="post-category">
                  <a href="">Marketing</a>
                </div>
                <div class="post-date">
                  June 18, 2024
                </div>
              </div>
              <a href="single-blog.html">
                <h3 class="entry-title">
                  Learn these five high-income skills to build your one-person business and get rich
                </h3>
              </a>
              <p>As a first-generation immigrant, money and networks weren’t given to me. So instead of going through the front door, I tried a back door approach...</p>
              <a class="post-read-more" href="single-blog.html">read more <img src="assets/images/icon/arrow-right.svg" alt=""></a>
            </div>
          </div>
          <div class="single-post-item wow fadeInUpX" data-wow-delay="0.2s">
            <div class="post-thumbnail">
              <img src="assets/images/blog/blog4.png" alt="">
            </div>
            <div class="post-content">
              <div class="post-meta">
                <div class="post-category">
                  <a href="">Business</a>
                </div>
                <div class="post-date">
                  June 18, 2024
                </div>
              </div>
              <a href="single-blog.html">
                <h3 class="entry-title">
                  I run a $10,000/month business with 0 employees, here's how I use AI tools
                </h3>
              </a>
              <p>Making more money with the help of AI tools. — Up until now, I’ve shared two posts discussing the AI tools I’ve incorporated into my...</p>
              <a class="post-read-more" href="single-blog.html">read more <img src="assets/images/icon/arrow-right.svg" alt=""></a>
            </div>
          </div>
          <div class="single-post-item wow fadeInUpX" data-wow-delay="0.3s">
            <div class="post-thumbnail">
              <img src="assets/images/blog/blog5.png" alt="">
            </div>
            <div class="post-content">
              <div class="post-meta">
                <div class="post-category">
                  <a href="">Technology</a>
                </div>
                <div class="post-date">
                  June 18, 2024
                </div>
              </div>
              <a href="single-blog.html">
                <h3 class="entry-title">
                  Technical loan, product loan or business loan: different types and how to deal withit
                </h3>
              </a>
              <p>Tech debt part two — a deeper dive into product and business debt and the ripple effect on organizations — in part one...</p>
              <a class="post-read-more" href="single-blog.html">read more <img src="assets/images/icon/arrow-right.svg" alt=""></a>
            </div>
          </div>
          <div class="aximo-navigation">
            <nav class="navigation pagination" aria-label="Posts">
              <div class="nav-links">
                <span aria-current="page" class="page-numbers current">1</span>
                <a class="page-numbers" href="">2</a>
                <a class="next page-numbers" href="">
                  <img src="assets/images/icon/arrow-right8.svg" alt="">
                </a>
              </div>
            </nav>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="right-sidebar">
            <div class="widget">
              <div class="wp-block-search__inside-wrapper">
                <input type="search" placeholder="Type keyword here" class="wp-block-search__input">
                <button id="wp-block-search__button" type="submit">
                  <img src="assets/images/icon/search.svg" alt="">
                </button>
              </div>
            </div>
            <div class="widget">
              <h3 class="wp-block-heading">Categories:</h3>
              <ul>
                <li><a href="">Business</a></li>
                <li><a href="">Development</a></li>
                <li><a href="">Technology</a></li>
                <li><a href="">Creative Director</a></li>
                <li><a href="">Uncategorized</a></li>
              </ul>
            </div>
            <div class="widget aximo_recent_posts_Widget">
              <h3 class="wp-block-heading">Recent Posts:</h3>
              <div class="post-item">
                <div class="post-thumb">
                  <a href="">
                    <img src="assets/images/blog/blog1.png" alt="">
                  </a>
                </div>
                <div class="post-text">
                  <div class="post-date">
                    June 18, 2024
                  </div>
                  <a class="post-title" href="">7 businesses for easy money</a>
                </div>
              </div>
              <div class="post-item">
                <div class="post-thumb">
                  <a href="">
                    <img src="assets/images/blog/blog2.png" alt="">
                  </a>
                </div>
                <div class="post-text">
                  <div class="post-date">
                    June 18, 2024
                  </div>
                  <a class="post-title" href="">My 3 tips for business ideas</a>
                </div>
              </div>
              <div class="post-item">
                <div class="post-thumb">
                  <a href="">
                    <img src="assets/images/blog/blog3.png" alt="">
                  </a>
                </div>
                <div class="post-text">
                  <div class="post-date">
                    June 18, 2024
                  </div>
                  <a class="post-title" href="">12 Halloween costume ideas</a>
                </div>
              </div>
            </div>
            <div class="widget">
              <h3 class="wp-block-heading">Tags:</h3>
              <div class="wp-block-tag-cloud">
                <a href="">Marketing</a>
                <a href="">Business</a>
                <a href="">Solutions</a>
                <a href="">Studio</a>
                <a href="">Brand</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End section -->

@endsection
