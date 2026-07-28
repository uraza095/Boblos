<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>@yield('title', 'Boblos – Modern Restaurant & Cafe')</title>

    <link
      rel="icon"
      href="{{ asset('assets/images/favicon-5.ico') }}"
      type="image/gif"
      sizes="20x20"
    />

    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  </head>
  <body class="patisserie-page">
    <!-- Custom Cursor -->

    <div class="cursor d-none d-lg-block"></div>

    <!-- Custom Cursor End -->

    <!-- Preloader -->

    <!-- <div class="preloader v5">
      <div class="spinner-wrap">
        <div class="preloader-logo">
          <img src="{{ asset('assets/img/fav.png') }}" alt="" class="img-fluid" />
        </div>
        <div class="spinner"></div>
      </div>
    </div> -->

    <!-- Preloader End -->

    <!-- back to to button start-->
    <div class="progress-wrap">
      <svg
        class="progress-circle svg-content"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
      >
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
      </svg>
    </div>
    <!-- back to to button end-->
    <!-- ================= Sidebar area start here ================= -->
    <div class="hamburger-area" data-lenis-prevent>
      <div class="hamburger_bg"></div>
      <div class="hamburger_wrapper">
        <div
          class="hamburger_top d-flex align-items-center justify-content-between"
        >
          <div class="hamburger_logo">
            <a class='mobile_logo' href="{{ route('home') }}">
              @if(\App\Models\Setting::get('logo'))
                <img src="{{ asset('storage/' . \App\Models\Setting::get('logo')) }}" alt="Logo" />
              @else
                <img src="{{ asset('assets/images/Logo_pink.png') }}" alt="Logo" />
              @endif
            </a>
          </div>
          <div class="hamburger_close">
            <button class="hamburger_close_btn">
              <i class="fa-thin fa-times"></i>
            </button>
          </div>
        </div>
        <div class="hamburger_search">
          <form method="get" action="index.html">
            <button type="submit"><i class="fal fa-search"></i></button>
            <input
              type="search"
              autocomplete="off"
              name="s"
              value=""
              placeholder="Search here"
            />
          </form>
        </div>
        <div class="hamburger_menu">
          <div class="mobile_menu"></div>
        </div>
        <div class="hamburger-infos">
          <h4 class="hamburger-title">About Us</h4>
          <p class="hamburger-text">
            Creative design is about connecting your brand with the right
            audience at the right time. By leveraging strategies like branding,
            web development, and digital art.
          </p>
          <a class='common-button-five v2' href="{{ route('about') }}">
            <span class="btn-text">About us</span>
          </a>
          <div class="contact-item">
            <div class="icon">
              <i class="fa-solid fa-bell"></i>
            </div>
            <div class="contact-text">
              <div class="text">
                <a class="link" href="tel:+00921108541443"
                  >+00 (92110) 854 1443</a
                >
              </div>
            </div>
          </div>
          <div class="contact-item">
            <div class="icon">
              <i class="fa-solid fa-paper-plane"></i>
            </div>
            <div class="contact-text">
              <div class="text">
                <a class="link" href="mailto:needhelp@example.com"
                  >needhelp@example.com</a
                >
              </div>
            </div>
          </div>
          <div class="contact-item">
            <div class="icon">
              <i class="fa-solid fa-globe"></i>
            </div>
            <div class="contact-text">
              <div class="text">
                <a class="link" href="www.example.html">www.example.com</a>
              </div>
            </div>
          </div>
          <div class="contact-item">
            <div class="icon">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="contact-text">
              <div class="text">88 Broklyn Golden USA</div>
            </div>
          </div>
        </div>
        <div class="hamburger-socials">
          <ul>
            <li>
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </li>
            <li>
              <a href="#">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  version="1.1"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  width="16"
                  height="16"
                  x="0"
                  y="0"
                  viewBox="0 0 497.904 497.904"
                  style="enable-background: new 0 0 512 512"
                  xml:space="preserve"
                  class=""
                >
                  <g>
                    <path
                      d="M485.584 338.959 328.987 67.724c-35.303-61.149-124.923-60.878-160.071 0L12.318 338.959C-22.894 399.947 21.72 475.94 91.233 475.94c31.226 0 62.08-16.013 79.212-45.687l78.506-135.977 78.506 135.977c17.105 29.628 47.937 45.687 79.212 45.687 69.466 0 114.146-75.96 78.915-136.981zm-342.852 75.294c-13.822 23.942-41.921 34.781-67.794 27.341-37.155-10.795-54.038-53.502-34.908-86.636 16.384-28.379 52.612-38.092 80.998-21.704 28.381 16.386 38.092 52.615 21.704 80.999zm34.696-60.094c-14.906-42.335-58.535-67.563-102.701-59.294L163.14 141.73c3.939 12.044 1.172 5.946 67.337 120.547zm258.74 81.798c-28.377 16.386-64.611 6.68-80.998-21.704L198.573 143.018c-29.882-51.757 27.723-110.637 79.054-80.998 19.208 11.09 13.923 4.861 180.245 292.938 16.347 28.315 6.611 64.651-21.704 80.999z"
                      fill="currentColor"
                      opacity="1"
                      data-original="#000000"
                    ></path>
                  </g>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- ================= Sidebar area end here ================= -->

    <!-- Cart Toggle -->
    <div class="menu-toggle-btn-full-shape">
      <div class="menu-toggle-wrap">
        <div
          class="cart-wrap d-flex align-items-center justify-content-between"
        >
          <h2 class="h2">Your Cart (01)</h2>
          <div class="cross-icon">
            <svg
              width="34"
              height="34"
              viewBox="0 0 34 34"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M14.1667 19.8333L17 17M17 17L19.8333 14.1667M17 17L14.1667 14.1667M17 17L19.8333 19.8333M29.75 17C29.75 24.0416 24.0416 29.75 17 29.75C9.95837 29.75 4.25 24.0416 4.25 17C4.25 9.95837 9.95837 4.25 17 4.25C24.0416 4.25 29.75 9.95837 29.75 17Z"
                stroke="#17191C"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
        </div>
        <div
          class="menu-toggle-body d-flex flex-column justify-content-between h-100"
        >
          <div class="cart-count-box-wrap">
            <div
              class="cart-count-box d-flex flex-column flex-md-row align-items-sm-start align-items-md-center"
            >
              <img
                class="cart-count-img"
                src="{{ asset('assets/images/shop/cart-toggle-img-1.png') }}"
                alt=""
              />
              <div class="cart-count-info">
                <h5 class="font-family-abril-display">
                  <b>Coconut Milk Machismo</b>
                </h5>
                <div
                  class="number-input number-input-shop-info d-flex align-items-center justify-content-between mt-3 mb-3"
                >
                  <button
                    class="minus number-btn border-0"
                    aria-label="Decrease by one"
                    disabled
                  >
                    <svg
                      width="11"
                      height="2"
                      viewBox="0 0 11 2"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M0 1H11" stroke="black" stroke-width="1.5" />
                    </svg>
                  </button>
                  <div class="number dim">0</div>
                  <button
                    class="plus number-btn border-0"
                    aria-label="Increase by one"
                  >
                    <svg
                      width="11"
                      height="11"
                      viewBox="0 0 11 11"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M0 5.5H11" stroke="black" stroke-width="1.5" />
                      <path
                        d="M5.5 0L5.5 11"
                        stroke="black"
                        stroke-width="1.5"
                      />
                    </svg>
                  </button>
                </div>
                <p><b>1 x $10.00</b></p>
              </div>
            </div>
            <div class="cart-count-box d-flex align-items-center">
              <img
                class="cart-count-img"
                src="{{ asset('assets/images/shop/cart-toggle-img-1.png') }}"
                alt=""
              />
              <div class="cart-count-info">
                <h5 class="font-family-abril-display">
                  <b>Coconut Milk Machismo</b>
                </h5>
                <div
                  class="number-input number-input-shop-info d-flex align-items-center justify-content-between mt-3 mb-3"
                >
                  <button
                    class="minus number-btn border-0"
                    aria-label="Decrease by one"
                    disabled
                  >
                    <svg
                      width="11"
                      height="2"
                      viewBox="0 0 11 2"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M0 1H11" stroke="black" stroke-width="1.5" />
                    </svg>
                  </button>
                  <div class="number dim">0</div>
                  <button
                    class="plus number-btn border-0"
                    aria-label="Increase by one"
                  >
                    <svg
                      width="11"
                      height="11"
                      viewBox="0 0 11 11"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M0 5.5H11" stroke="black" stroke-width="1.5" />
                      <path
                        d="M5.5 0L5.5 11"
                        stroke="black"
                        stroke-width="1.5"
                      />
                    </svg>
                  </button>
                </div>
                <p><b>1 x $10.00</b></p>
              </div>
            </div>
          </div>
          <div class="cart-total pt-3 border-top">
            <p class="d-flex justify-content-between align-items-center">
              Subtotal: <span>$10.00</span>
            </p>
            <a class='common-btn w-100 text-center style-border mt-3 mb-2' href="{{ route('cart') }}"><span>View Cart</span></a
            >
            <a class='common-btn w-100 text-center' href="{{ route('checkout') }}"><span>Checkout</span></a
            >
          </div>
        </div>
      </div>
    </div>
    <!-- Cart Toggle End -->

    
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')



    <!-- Modal start-->
    <div
      class="modal fade"
      id="globalVideoModal"
      tabindex="-1"
      role="dialog"
      aria-label="Video Preview"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content comon-modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <i class="fa-chisel fa-regular fa-xmark"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="ratio ratio-16x9">
              <iframe
                id="globalVideoIFrame"
                title="YouTube video player"
                allow="
                  accelerometer;
                  autoplay;
                  clipboard-write;
                  encrypted-media;
                  gyroscope;
                  picture-in-picture;
                  web-share;
                "
                allowfullscreen
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal end-->

    <!-- Jquery JS -->
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <!-- Marquee JS -->
    <script src="{{ asset('assets/js/vendor/marquee.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <!-- Swiper Carousel JS -->
    <script src="{{ asset('assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <!-- Mean menu JS -->
    <script src="{{ asset('assets/js/vendor/jquery.meanmenu.min.js') }}"></script>
    <!-- flatpickr JS -->
    <script src="{{ asset('assets/js/vendor/flatpickr.js') }}"></script>
    <!-- GSAP -->
    <script src="{{ asset('assets/js/vendor/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/MotionPathPlugin.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/Draggable.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/InertiaPlugin.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/lenis.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/SplitText.min.js') }}"></script>

    <!-- BackToTop JavaScript File -->
    <script src="{{ asset('assets/js/vendor/backToTop.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>

<!-- Mirrored from dinevo-html.netlify.app/index-5 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jul 2026 05:33:53 GMT -->
</html>
