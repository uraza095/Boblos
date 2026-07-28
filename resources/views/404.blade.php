@extends('layouts.app')

@section('title', '404 - Dinevo')

@section('content')

      <!-- 404 section start -->
      <section class="error-common v5 section">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="error-common__content">
                <div
                  class="patisserie__header fade-anim"
                  data-direction="bottom"
                  data-delay="1.5"
                  data-duration="1"
                >
                  <h2 class="header-title">4<span>0</span>4</h2>
                </div>
                <h3 class="content-title">Oop! Page not found</h3>
                <div class="back-button row-margin-top">
                  <a class='common-button-five v2' href="{{ route('home') }}">
                    <span class="btn-text">Back To Home</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- 404 section end -->
    
@endsection
