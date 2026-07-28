@extends('layouts.app')

@section('title', 'Login - Dinevo')

@section('content')

      <!-- breadcrumb section start -->
      <section
        class="breadcrumb-five section"
        data-background="{{ asset('assets/images/patisserie/breadcrumb/pattern.png') }}"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div
                class="breadcrumb-five__header patisserie__header fade-anim"
                data-direction="bottom"
                data-delay="1.5"
                data-duration="1"
              >
                <h1 class="header-title">
                  <span class="line-text position-relative">
                    <span class="top-tag v2">my account</span>
                    my Account
                    <span class="bottom-tag v3">food delivery</span>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- breadcrumb section end -->

      <!-- contact info section start -->
      <section class="login-main section section-padding">
        <div class="container">
          <div class="row justify-content-center fade-anim">
            <div class="col-12">
              <div class="cafe__header text-center fade-anim">
                <h2 class="section-title tp-text-revel-anim" data-delay="0.1">
                  Login
                </h2>
              </div>
            </div>
          </div>
          <div class="row row-padding-top">
            <div class="col-12">
              <form action="#" class="login-main__form v4">
                <div class="row g-4">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="username">Username Or Email Address *</label>
                      <div class="input-wrap">
                        <input
                          type="text"
                          id="username"
                          class="form-control"
                          placeholder="Username or email address"
                        />
                        <i class="fa-light fa-circle-user"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="password">Password *</label>
                      <div class="input-wrap">
                        <input
                          type="password"
                          id="password"
                          class="form-control"
                          placeholder="Password"
                        />
                        <i
                          class="fa-light fa-eye-slash toggle-password cursor-pointer"
                        ></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group submit-group">
                      <button type="submit" class="common-button-five v2">
                        <span class="btn-text">Submit Now</span>
                      </button>

                      <div class="remember-me-wrap ms-0 ms-sm-4">
                        <input type="checkbox" id="rememberMe" />
                        <label for="rememberMe" class="remember-label"
                          >Remember Me</label
                        >
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <a class='lost-password' href="{{ route('contact') }}">Lost Your Password?</a
                    >
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- contact info section end -->
    
@endsection
