<header>
      <!-- Menu -->
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="header-top__content">
                <p>Get 20% Off on your first order</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="menu-area menu-area-two header-five">
        <div class="container position-relative">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto order-2 order-lg-1">
              <div class="mainmenu">
                <ul>
                  <li>
                    <a href="{{ route('home') }}">Home</a>
                  </li>
                  <li>
                    <a href="{{ route('about') }}">About Us</a>
                  </li>
                  <li>
                    <a href="{{ route('menu') }}">Menu</a>
                  </li>
                  <li>
                    <a href="{{ route('blog') }}">Blog</a>
                  </li>
                  <li>
                    <a href="{{ route('contact') }}">Contact Us</a>
                  </li>
                </ul>
                <div class="menu-btn-wrap flex-shrink-0 d-lg-none pb-5">
                  <a class='sign-btn common-btn mt-4' href="{{ route('login') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Sign in</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-auto col-xl-2 order-1 order-lg-2">
              <div class="menu-logo-wrap">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/Logo_pink.png') }}" alt="logo"
                /></a>
              </div>
            </div>
            <div class="col-auto order-3 hamburger-menu position-relative">
              <div
                class="d-flex menu-info-item align-items-center justify-content-between justify-content-lg-end"
              >
                <div class="menu-meta d-none d-sm-flex align-items-center">
                  <a href="tel:+15551234567" class="phone-call"
                    >+1 (555) 123-4567</a
                  >
                </div>
                <div class="header__right-hamburger">
                  <span class="line"></span>
                  <span class="line"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Menu end -->
    </header>