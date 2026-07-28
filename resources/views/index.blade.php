@extends('layouts.app')

@section('title', 'Home - Dinevo')

@section('content')
<style>
  .menu-five__item .item-header .item-title, .menu-five__item .item-header .item-price{
    line-height: 2;
  }
  .common-button-five{
    color: #fff;
    border: 1px solid #fff
  }
</style>
@php
  $heroSection = \App\Models\PageSection::where('section_key', 'home_hero')->first();
  $heroContent = $heroSection ? $heroSection->content : [];
  $badge = $heroContent['badge'] ?? 'Sweet & Elegant';
  $titleLineOne = $heroContent['title_line_one'] ?? 'Simply';
  $titleLineTwo = $heroContent['title_line_two'] ?? 'Patisserie';
  $btn1Text = $heroContent['button_one_text'] ?? 'View menu';
  $btn1Url = $heroContent['button_one_url'] ?? route('menu');
  $btn2Text = $heroContent['button_two_text'] ?? 'Book an Event';
  $btn2Url = $heroContent['button_two_url'] ?? route('menu');
  $uploadVideo = $heroContent['upload_video'] ?? '';
@endphp
      <section
        class="hero-five section shape-move"
        style="position: relative; overflow: hidden; z-index: 1; background-color: transparent !important;"
      >
        <video autoplay loop muted playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
          @if($uploadVideo)
            <source src="{{ asset('storage/' . $uploadVideo) }}" type="video/mp4">
          @else
            <source src="{{ asset('assets/video/patisserie/patisserie.webm') }}" type="video/webm">
          @endif
        </video>
        <!-- White overlay for video -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgb(238 124 139 / 19%); z-index: -1;"></div>
        <div class="icon-1 shape-image">
          <img
            src="{{ asset('assets/img/Icon-1.svg') }}"
            alt="icon"
            class="shape"
            data-speed="0.03"
          />
        </div>
        <div class="icon-2 shape-image">
          <img
            src="{{ asset('assets/img/Icon-2.svg') }}"
            alt="icon"
            class="shape"
            data-speed="0.06"
          />
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-five__wrapper">
                <div class="hero-five__content">
                  <div class="patisserie__header">
                    <h1
                      class="header-title fade-anim"
                      data-delay="1"
                      data-duration="1"
                    >
                      <span class="line-text position-relative">
                        <span class="top-tag v2">{{ $badge }}</span>
                        {{ $titleLineOne }}
                      </span>
                      <br />
                      <span class="line-text position-relative">
                        {{ $titleLineTwo }}
                      </span>
                    </h1>
                  </div>
                  <div
                    class="content-buttons fade-anim"
                    data-delay="1.3"
                    data-duration="1"
                  >
                    @if($btn1Text)
                      <a class='common-button-five v2' href="{{ $btn1Url }}">
                        <span class="btn-text">{{ $btn1Text }}</span>
                      </a>
                    @endif
                    @if($btn2Text)
                      <a class='common-button-five' href="{{ $btn2Url }}">
                        <span class="btn-text">{{ $btn2Text }}</span>
                      </a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="category-five section section-padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="patisserie__header text-center">
                <h2 class="header-title mx-auto">
                  <span class="line-text position-relative">
                    <span class="top-tag">Category</span>
                    Explore our
                  </span>
                  <br />
                  <span class="line-text position-relative">
                    category Patisserie
                    <span class="bottom-tag">Cake item</span>
                  </span>
                </h2>
              </div>
            </div>
          </div>
          <div class="row row-padding-top">
            <div class="col-12">
              <div class="swiper category-five__slider">
                <div class="swiper-wrapper linear">
                  @if(isset($categories) && $categories->count() > 0)
                    @foreach($categories as $index => $category)
                      <div class="swiper-slide">
                        <div
                          class="category-five__item fade-anim"
                          data-delay="{{ sprintf('%.2f', 0.10 * (($index % 7) + 1)) }}"
                        >
                          <a class='item-thumb' href="{{ route('menu') }}">
                            @if($category->image)
                              <img
                                src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}"
                              />
                            @else
                              <img
                                src="{{ asset('assets/images/patisserie/category/icon-' . (($index % 7) + 1) . '.png') }}"
                                alt="{{ $category->name }}"
                              />
                            @endif
                          </a>
                          <div class="item-content">
                            <h3 class="item-title">
                              <a href="{{ route('menu') }}">{{ $category->name }}</a>
                            </h3>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="shop-five section section-padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="patisserie__header text-center">
                <h2 class="header-title mx-auto">
                  <span class="line-text position-relative">
                    <span class="top-tag">Trending</span>
                    Freshly baked
                  </span>
                  <br />
                  <span class="line-text position-relative">
                    every day
                    <span class="bottom-tag v2">Items</span>
                  </span>
                </h2>
              </div>
            </div>
          </div>
          <div class="row g-3 gy-4 gy-lg-3 row-padding-top">
            @if(isset($featuredItems) && $featuredItems->count() > 0)
              @foreach($featuredItems as $index => $item)
                <div class="col-sm-6 col-lg-3">
                  <div class="shop-five__item">
                    <div class="item-thumb">
                      <a href="{{ route('menu') }}">
                        @if($item->image)
                          <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->name }}"
                          />
                        @else
                          <img
                            src="{{ asset('assets/images/patisserie/shop/thumb-' . (($index % 4) + 1) . '.png') }}"
                            alt="{{ $item->name }}"
                          />
                        @endif
                      </a>
                    </div>
                    <div class="item-content">
                      <h3 class="item-title">
                        <a href="{{ route('menu') }}">{{ $item->name }}</a>
                      </h3>
                      <span class="item-price">PKR {{ number_format($item->price, 0) }}</span>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </section>
      
      <section class="menu-five section section-padding-top position-relative" style="background:url({{ asset('assets/img/1.jpeg') }}) center/cover no-repeat;">
        <!-- Overlay to highlight the menu -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.85); z-index: 1;"></div>
        <style>
          .menu-five__list {
            justify-content: flex-start !important;
            gap: 20px !important;
          }
          .menu-five__item {
            margin-bottom: 0 !important;
            padding-bottom: 18px !important;
          }
          .menu-five__item:last-child {
            padding-bottom: 0 !important;
            border-bottom: 0 !important;
          }
          .menu-five .container {
            position: relative;
            z-index: 2;
          }
        </style>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="patisserie__header text-center">
                <h2 class="header-title mx-auto">Our Menu</h2>
              </div>
              
              @if(isset($homeMenuCategories) && $homeMenuCategories->count() > 0)
                <nav class="menu-five__nav">
                  <div class="nav nav-tabs menu-five__tabs justify-content-center" id="menu-five__tabs" role="tablist">
                    @foreach($homeMenuCategories as $index => $category)
                      <button
                        class="nav-link {{ $index === 0 ? 'active' : '' }}"
                        id="nav-cat-{{ $category->id }}-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-cat-{{ $category->id }}"
                        type="button"
                        role="tab"
                        aria-controls="nav-cat-{{ $category->id }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                      >
                        <span class="icon">
                          <i class="fa-solid fa-utensils"></i>
                        </span>
                        {{ $category->name }}
                      </button>
                    @endforeach
                  </div>
                </nav>

                <div class="tab-content menu-five__tabContent row-padding" id="menu-five__tabContent">
                  @foreach($homeMenuCategories as $index => $category)
                    <div
                      class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                      id="nav-cat-{{ $category->id }}"
                      role="tabpanel"
                      aria-labelledby="nav-cat-{{ $category->id }}-tab"
                      tabindex="0"
                    >
                      <div class="menu-five__wrapper">
                        @php
                          $items = $category->menuItems;
                          $half = ceil($items->count() / 2);
                          $leftItems = $items->slice(0, $half);
                          $rightItems = $items->slice($half);
                        @endphp

                        <div class="menu-five__list">
                          @foreach($leftItems as $item)
                            <div class="menu-five__item">
                              <div class="item-header">
                                <h4 class="item-title">
                                  <a href="javascript:void(0)">{{ $item->name }}</a>
                                </h4>
                                <h4 class="item-price">
                                  @if($item->price > 0)
                                    Rs. {{ number_format($item->price, 0) }}
                                  @else
                                    -
                                  @endif
                                </h4>
                              </div>
                              @if($item->description)
                                <p class="item-desc">{{ $item->description }}</p>
                              @endif
                            </div>
                          @endforeach
                        </div>

                        <div class="menu-five__thumb text-center">
                          @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="max-height: 280px; object-fit: contain;" />
                          @else
                            <img src="{{ asset('assets/img/thumb-1.png') }}" alt="{{ $category->name }}" style="max-height: 280px; object-fit: contain;" />
                          @endif
                        </div>

                        <div class="menu-five__list">
                          @foreach($rightItems as $item)
                            <div class="menu-five__item">
                              <div class="item-header">
                                <h4 class="item-title">
                                  <a href="javascript:void(0)">{{ $item->name }}</a>
                                </h4>
                                <h4 class="item-price">
                                  @if($item->price > 0)
                                    Rs. {{ number_format($item->price, 0) }}
                                  @else
                                    -
                                  @endif
                                </h4>
                              </div>
                              @if($item->description)
                                <p class="item-desc">{{ $item->description }}</p>
                              @endif
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @endif

            </div>
          </div>
        </div>
      </section>
      <section class="tricker-five section section-padding">
        <div class="slide-track" data-speed="30" data-gap="10">
          <h3 class="tricker-text no-fill">Luxury Bakes</h3>
          <div class="tricker-icon no-fill">
            <img
              src="{{ asset('assets/img/tricker/Icon-1.svg') }}"
              alt="Icon"
            />
          </div>
          <h3 class="tricker-text">Fresh & Sweet</h3>
          <div class="tricker-icon no-fill">
            <img
              src="{{ asset('assets/img/tricker/Icon-2.svg') }}"
              alt="Icon"
            />
          </div>
          <h3 class="tricker-text no-fill">Fine Desserts</h3>
          <div class="tricker-icon no-fill">
            <img
              src="{{ asset('assets/img/tricker/Icon-1.svg') }}"
              alt="Icon"
            />
          </div>
          <h3 class="tricker-text">Fresh & Sweet</h3>
          <div class="tricker-icon no-fill">
            <img
              src="{{ asset('assets/img/tricker/Icon-2.svg') }}"
              alt="Icon"
            />
          </div>
        </div>
      </section>
      @php
        $timingSection = \App\Models\PageSection::where('section_key', 'home_timing')->first();
        $timingContent = $timingSection ? $timingSection->content : [];
        $img1 = $timingContent['image_one'] ?? '';
        $img2 = $timingContent['image_two'] ?? '';
      @endphp
      <section class="opening-five section">
        <div class="opening-five__wrapper">
          <div class="opening-five__thumb">
            @if($img1)
              <img
                src="{{ asset('storage/' . $img1) }}"
                alt="thumb"
              />
            @else
              <img
                src="{{ asset('assets/images/patisserie/opening/thumb-1.png') }}"
                alt="thumb"
              />
            @endif
          </div>
          <div class="opening-five__content">
            <div class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="120"
                height="120"
                viewBox="0 0 120 120"
                fill="none"
              >
                <path
                  d="M60 33.54C74.5896 33.54 86.46 45.4104 86.46 60C86.46 74.5896 74.5896 86.46 60 86.46C45.4092 86.46 33.5388 74.5896 33.5388 60C33.5388 45.4104 45.4092 33.54 60 33.54ZM60 84.06C73.2672 84.06 84.06 73.2672 84.06 60C84.06 46.7328 73.2672 35.94 60 35.94C46.7328 35.94 35.9388 46.7328 35.9388 60C35.9388 73.2672 46.7328 84.06 60 84.06Z"
                  fill="currentColor"
                />
                <path
                  d="M10.4735 90.523C4.97994 81.643 1.79995 71.1874 1.79995 60.001C1.79995 27.9082 27.9083 1.7998 60 1.7998C92.0916 1.7998 118.2 27.9082 118.2 60.001C118.2 72.055 114.516 83.2642 108.215 92.563C108.169 92.6434 108.119 92.7154 108.058 92.785C97.5648 108.116 79.9403 118.2 60 118.2C39.2316 118.2 20.9796 107.258 10.6776 90.8434C10.5936 90.7438 10.5203 90.6406 10.4735 90.523ZM106.876 29.7874L102.988 30.9598C102.872 30.9946 102.756 31.0114 102.641 31.0114C102.125 31.0114 101.648 30.6766 101.492 30.157C101.302 29.5222 101.66 28.8526 102.295 28.6618L105.463 27.7078C95.3376 13.495 78.7392 4.1998 60 4.1998C34.2407 4.1998 12.5147 21.7486 6.11874 45.5158L9.16195 49.3834C9.57115 49.9042 9.48235 50.659 8.96035 51.0682C8.74075 51.2422 8.47914 51.325 8.21995 51.325C7.86355 51.325 7.51195 51.1678 7.27555 50.8666L5.40115 48.4858C4.61874 52.2034 4.19994 56.0542 4.19994 60.001C4.19994 70.7602 7.26955 80.8126 12.5663 89.3434C13.7339 90.3094 20.1936 95.4094 25.8143 94.7302C28.0139 94.4602 29.7719 93.3406 31.1903 91.3054C31.1939 91.3006 31.1987 91.2994 31.2011 91.2946C31.2048 91.291 31.2047 91.2862 31.2071 91.2826C31.2827 91.1782 31.3764 91.0438 31.4843 90.8842C32.6376 89.2078 35.7011 84.7534 40.8479 84.3538C44.9207 84.0286 49.278 86.323 53.838 91.135C53.8391 91.1362 53.8403 91.1362 53.8415 91.1374C57.1152 94.363 64.686 98.929 71.0723 97.4494C71.4371 97.3654 71.784 97.2406 72.132 97.1194L68.8559 92.7082C68.4599 92.1766 68.5716 91.4242 69.1044 91.0294C69.636 90.6358 70.3883 90.7474 70.7831 91.2766L74.3088 96.0226C76.6595 94.4518 78.5148 91.8118 79.8228 88.0858C79.8228 88.0846 79.8228 88.0846 79.824 88.0834C81.888 81.9334 87.5339 78.2998 94.2383 78.8398C99.5639 79.2646 105.401 82.5694 107.653 89.005C112.819 80.5474 115.8 70.6162 115.8 60.001C115.8 48.8722 112.512 38.503 106.876 29.7874ZM60 115.8C79.0043 115.8 95.8116 106.243 105.892 91.6906C104.554 85.0222 99.0383 81.6274 94.0464 81.2302C89.8127 80.8906 84.1548 82.6906 82.0919 88.8622C82.0907 88.8658 82.0883 88.867 82.0872 88.8706C82.0859 88.873 82.0872 88.8766 82.0859 88.879C79.9356 95.005 76.4123 98.6758 71.6136 99.787C70.6104 100.019 69.5843 100.125 68.5511 100.125C62.0519 100.125 55.2935 95.9386 52.1555 92.8462C52.1496 92.8402 52.1483 92.833 52.1423 92.827C52.1376 92.8222 52.1303 92.8198 52.1255 92.815C48.0768 88.5298 44.3556 86.4694 41.0315 86.7454C37.0271 87.0562 34.5287 90.691 33.4608 92.2426C33.3419 92.4154 33.2436 92.5582 33.1584 92.6734C33.1584 92.6746 33.1583 92.6758 33.1571 92.677C33.1535 92.6818 33.1499 92.6854 33.1476 92.6902C33.1451 92.6926 33.1427 92.6974 33.1403 92.6998C33.1403 92.701 33.1391 92.701 33.1379 92.701C31.3343 95.2762 28.9679 96.7618 26.1035 97.1122C25.6595 97.1662 25.2155 97.1914 24.7703 97.1914C21.8159 97.1914 18.8495 96.0706 16.4123 94.7806C26.6471 107.579 42.3767 115.8 60 115.8Z"
                  fill="currentColor"
                />
                <path
                  d="M85.26 21.5999C84.9192 21.5999 84.5796 21.4547 84.342 21.1739L80.0364 16.0739C79.6092 15.5675 79.6729 14.8103 80.1793 14.3831C80.6845 13.9571 81.4428 14.0195 81.87 14.5259L86.1756 19.6259C86.6028 20.1323 86.5392 20.8895 86.0328 21.3167C85.8084 21.5063 85.5336 21.5999 85.26 21.5999Z"
                  fill="currentColor"
                />
                <path
                  d="M23.3604 68.0268C23.2284 68.0736 23.094 68.0952 22.962 68.0952C22.4676 68.0952 22.0032 67.7868 21.8304 67.2936L19.6152 60.9972C19.3944 60.372 19.7244 59.6868 20.3484 59.4672C20.9736 59.2476 21.6588 59.5752 21.8784 60.2004L24.0936 66.4968C24.3144 67.1232 23.9844 67.8072 23.3604 68.0268Z"
                  fill="currentColor"
                />
                <path
                  d="M106.571 75.2305C106.424 75.7633 105.942 76.1125 105.414 76.1125C105.31 76.1125 105.202 76.0981 105.096 76.0693C104.456 75.8941 104.081 75.2341 104.256 74.5945L106.024 68.1601C106.199 67.5205 106.861 67.1437 107.498 67.3213C108.138 67.4965 108.514 68.1565 108.338 68.7961L106.571 75.2305Z"
                  fill="currentColor"
                />
                <path
                  d="M98.928 59.5033C98.7084 59.6761 98.448 59.7589 98.1876 59.7589C97.8324 59.7589 97.4796 59.6017 97.2432 59.2993L93.1224 54.0481C92.7132 53.5261 92.8044 52.7725 93.3252 52.3633C93.846 51.9541 94.6008 52.0441 95.01 52.5661L99.1308 57.8173C99.5412 58.3405 99.45 59.0953 98.928 59.5033Z"
                  fill="currentColor"
                />
                <path
                  d="M48.2172 20.5202L41.6076 21.4538C41.5512 21.4622 41.4936 21.4658 41.4384 21.4658C40.8504 21.4658 40.3356 21.0326 40.2516 20.4338C40.1592 19.7774 40.6164 19.1702 41.2728 19.0778L47.8824 18.1442C48.54 18.0494 49.146 18.509 49.2384 19.1654C49.3296 19.8206 48.8736 20.4266 48.2172 20.5202Z"
                  fill="currentColor"
                />
                <path
                  d="M27.42 51.2869C27.1836 51.5425 26.8608 51.6721 26.5392 51.6721C26.2476 51.6721 25.956 51.5665 25.7244 51.3529C25.2384 50.9029 25.2072 50.1445 25.6572 49.6573L30.186 44.7541C30.6372 44.2657 31.3968 44.2381 31.8816 44.6869C32.3676 45.1369 32.3988 45.8953 31.9488 46.3825L27.42 51.2869Z"
                  fill="currentColor"
                />
                <path
                  d="M93.6384 68.9003L91.5504 75.2387C91.3836 75.7439 90.9156 76.0643 90.4104 76.0643C90.2856 76.0643 90.1596 76.0451 90.0348 76.0043C89.406 75.7967 89.0628 75.1187 89.2704 74.4887L91.3584 68.1503C91.566 67.5215 92.2428 67.1783 92.874 67.3847C93.5028 67.5923 93.846 68.2715 93.6384 68.9003Z"
                  fill="currentColor"
                />
                <path
                  d="M104.742 44.7434C104.666 44.7434 104.59 44.7362 104.513 44.7218L97.9596 43.4534C97.3092 43.3274 96.8832 42.6974 97.0092 42.047C97.1352 41.3966 97.7664 40.9694 98.4156 41.0966L104.969 42.365C105.619 42.491 106.045 43.121 105.919 43.7714C105.808 44.345 105.306 44.7434 104.742 44.7434Z"
                  fill="currentColor"
                />
                <path
                  d="M67.3308 25.2131L60.954 27.1811C60.8364 27.2171 60.7164 27.2351 60.6 27.2351C60.0876 27.2351 59.6124 26.9039 59.454 26.3879C59.2584 25.7543 59.6136 25.0823 60.2472 24.8879L66.624 22.9199C67.254 22.7255 67.9296 23.0807 68.124 23.7131C68.3196 24.3455 67.9644 25.0175 67.3308 25.2131Z"
                  fill="currentColor"
                />
                <path
                  d="M28.0872 33.0204C27.9552 33.0672 27.8208 33.0888 27.6888 33.0888C27.1944 33.0888 26.73 32.7804 26.5572 32.2872L24.342 25.9908C24.1212 25.3656 24.4512 24.6804 25.0752 24.4608C25.7004 24.2412 26.3856 24.5688 26.6052 25.194L28.8204 31.4904C29.0412 32.1156 28.7124 32.8008 28.0872 33.0204Z"
                  fill="currentColor"
                />
                <path
                  d="M15.1549 70.525C15.7885 70.7206 16.1437 71.3926 15.9493 72.025L13.9861 78.4054C13.8265 78.9214 13.3525 79.2526 12.8389 79.2526C12.7225 79.2526 12.6037 79.2358 12.4861 79.1998C11.8525 79.0042 11.4973 78.3322 11.6917 77.6998L13.6549 71.3194C13.8505 70.6882 14.5213 70.327 15.1549 70.525Z"
                  fill="currentColor"
                />
                <path
                  d="M86.5752 32.3388L79.9584 33.2244C79.9044 33.2316 79.8504 33.2352 79.7976 33.2352C79.206 33.2352 78.6912 32.7972 78.6096 32.1948C78.522 31.5384 78.9828 30.9336 79.6392 30.846L86.256 29.9604C86.9064 29.8752 87.5172 30.3336 87.6048 30.99C87.6924 31.6464 87.2316 32.25 86.5752 32.3388Z"
                  fill="currentColor"
                />
                <path
                  d="M63.5568 13.9968C63.48 13.9968 63.402 13.9896 63.324 13.974L56.7756 12.684C56.1252 12.5568 55.7016 11.9256 55.83 11.2752C55.9572 10.6248 56.5908 10.1976 57.24 10.3296L63.7884 11.6196C64.4388 11.7468 64.8624 12.378 64.734 13.0284C64.62 13.6008 64.1184 13.9968 63.5568 13.9968Z"
                  fill="currentColor"
                />
                <path
                  d="M41.562 29.7707C41.8932 30.3455 41.6952 31.0787 41.1216 31.4099L35.3388 34.7411C35.1504 34.8491 34.944 34.9007 34.7412 34.9007C34.326 34.9007 33.9216 34.6847 33.7008 34.2995C33.3696 33.7247 33.5676 32.9915 34.1412 32.6603L39.924 29.3291C40.4976 28.9991 41.232 29.1971 41.562 29.7707Z"
                  fill="currentColor"
                />
                <path
                  d="M22.9921 83.2678L29.2885 81.0526C29.9149 80.8294 30.5989 81.1606 30.8185 81.7858C31.0381 82.411 30.7093 83.0962 30.0853 83.3158L23.7889 85.531C23.6569 85.5778 23.5225 85.5994 23.3905 85.5994C22.8961 85.5994 22.4317 85.291 22.2589 84.7978C22.0381 84.1726 22.3681 83.4874 22.9921 83.2678Z"
                  fill="currentColor"
                />
                <path
                  d="M20.6748 49.5254C20.6388 49.5254 20.6004 49.5242 20.5632 49.5206L13.9164 48.911C13.2564 48.851 12.7716 48.2666 12.8316 47.6066C12.8928 46.9466 13.458 46.4642 14.1372 46.5218L20.784 47.1314C21.444 47.1914 21.9288 47.7758 21.8688 48.4358C21.8124 49.0586 21.2892 49.5254 20.6748 49.5254Z"
                  fill="currentColor"
                />
              </svg>
            </div>
            <span class="verticle-line"></span>
            <div class="opening-times">
              <h4 class="title">Opening Time</h4>
              <div class="times">
                <p>{!! nl2br(e(\App\Models\Setting::get('opening_hours', "Mon – Fri: 12 PM – 10 PM\nSat – Sun: 1 PM – 11 PM"))) !!}</p>
              </div>
            </div>
            <div class="opening-location">
              <h4 class="title">Location</h4>
              <p class="address">
                {!! nl2br(e(\App\Models\Setting::get('contact_address', "Location: Main Street,\nCity Center, London, UK"))) !!}
              </p>
            </div>
          </div>
          <div class="opening-five__thumb">
            @if($img2)
              <img
                src="{{ asset('storage/' . $img2) }}"
                alt="thumb"
              />
            @else
              <img
                src="{{ asset('assets/images/patisserie/opening/thumb-2.png') }}"
                alt="thumb"
              />
            @endif
          </div>
        </div>
      </section>
      <section class="testimonial-five section section-padding">
        <div class="container">
          <div
            class="row g-4 justify-content-between align-items-end text-center text-md-start"
          >
            <div class="col-md-auto">
              <div class="patisserie__header">
                <h2 class="header-title">
                  <span class="line-text position-relative">
                    <span class="top-tag v2">Testimonials</span>
                    What Our Guests
                  </span>
                  <br />
                  <span class="line-text position-relative">
                    Say Feedback
                    <span class="bottom-tag v4">4.5/5 Rating</span>
                  </span>
                </h2>
              </div>
            </div>
            <div class="col-md-auto">
              <a class='common-button-five' href="{{ route('about') }}">
                <span class="btn-text">View all</span>
              </a>
            </div>
          </div>
          <div class="row row-padding-top">
            <div class="col-12">
              <div class="testimonial-five__wrapper">
                <div class="testimonial-five__thumb">
                  <img
                    src="{{ asset('assets/img/2.jpeg') }}"
                    alt="thumb"
                  />
                </div>
                <div class="testimonial-five__content">
                  <div class="testimonial-five__slider-wrapper">
                    <div class="swiper testimonial-five__slider">
                      <div class="swiper-wrapper">
                        @if(isset($testimonials) && $testimonials->count() > 0)
                          @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                              <div class="testimonial-five__item">
                                <div class="item-icon">
                                  <img
                                    src="{{ asset('assets/img/quote-icon.svg') }}"
                                    alt="author"
                                  />
                                </div>
                                <p class="item-text">
                                  “ {{ $testimonial->content }} ”
                                </p>
                                <div class="item-footer">
                                  <div class="author">
                                    <div class="author-thumb">
                                      @if($testimonial->image)
                                        <img
                                          src="{{ asset('storage/' . $testimonial->image) }}"
                                          alt="{{ $testimonial->name }}"
                                        />
                                      @else
                                        <img
                                          src="{{ asset('assets/images/patisserie/testimonial/author-' . (($loop->index % 3) + 1) . '.png') }}"
                                          alt="{{ $testimonial->name }}"
                                        />
                                      @endif
                                    </div>
                                    <div class="author-info">
                                      <h4 class="name">{{ $testimonial->name }}</h4>
                                      <span class="designation">{{ $testimonial->role }}</span>
                                    </div>
                                  </div>
                                  <div class="item-number">
                                    <span class="current-slide">{{ sprintf('%02d', $loop->iteration) }}</span>
                                    <span class="total-slide">{{ sprintf('%02d', $loop->count) }}</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        @else
                        
                        @endif
                      </div>
                    </div>

                    <div class="testimonial-five__footer">
                      <div class="ratings">
                        <div class="author-thumbs">
                          <img
                            src="{{ asset('assets/img/rating-avatar-1.png') }}"
                            alt="thumb"
                          />
                          <img
                            src="{{ asset('assets/img/rating-avatar-2.png') }}"
                            alt="thumb"
                          />
                          <img
                            src="{{ asset('assets/img/rating-avatar-3.png') }}"
                            alt="thumb"
                          />
                        </div>
                        <div class="rating-content">
                          <div class="rating">
                            <ul>
                              <li>
                                <i class="fa-solid fa-solid fa-star"></i>
                              </li>
                              <li>
                                <i class="fa-solid fa-solid fa-star"></i>
                              </li>
                              <li>
                                <i class="fa-solid fa-solid fa-star"></i>
                              </li>
                              <li>
                                <i class="fa-solid fa-solid fa-star"></i>
                              </li>
                              <li>
                                <i class="fa-solid fa-star-half-stroke"></i>
                              </li>
                            </ul>
                          </div>
                          <p class="rating-text">10K+ feedback</p>
                        </div>
                      </div>
                      <img
                        src="{{ asset('assets/img/brand-logo.svg') }}"
                        alt="brand-logo"
                      />
                    </div>
                  </div>
                  <div class="testimonial-five__stats">
                    <div class="stat-item">
                      <div class="stat-number">
                        <span class="counter-item">4.9/5</span>
                      </div>
                      <div class="stat-label">Average Rating</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                      <div class="stat-number">
                        <span class="counter-item">98%</span>
                      </div>
                      <div class="stat-label">Positive Feedback</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                      <div class="stat-number">
                        <span class="counter-item">10K+</span>
                      </div>
                      <div class="stat-label">Freshly Baked</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contact-five section section-padding-top">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="patisserie__header text-center">
                <h2 class="header-title mx-auto">
                  <span class="line-text position-relative">
                    <span class="top-tag v2">Our store</span>
                    Find Your Nearest
                  </span>
                  <br />
                  <span class="line-text position-relative">
                    Shop Nearby
                    <span class="bottom-tag v4">Location</span>
                  </span>
                </h2>
              </div>
            </div>
          </div>
          <div class="row row-padding-top">
            <div class="col-12">
              <div class="contact-five__wrapper section-padding-bottom">
                <div class="contact-five__thumb">
                  <img
                    src="{{ asset('assets/img/4.jpeg') }}"
                    alt="thumb"
                  />
                </div>
                <div class="contact-five__content">
                  <div class="content-icon-wrapper">
                    <div class="content-icon">
                      <img
                        src="{{ asset('assets/img/Icon-11.svg') }}"
                        alt="icon"
                      />
                    </div>
                    <span class="verticle-line"></span>
                  </div>
                  <div class="opening-location">
                    <h4 class="title">Location</h4>
                    <p class="text">{!! nl2br(e(\App\Models\Setting::get('contact_address', "123 Sweet Street, City Center"))) !!}</p>
                  </div>
                  <div class="opening-times">
                    <h4 class="title">Opening Time</h4>
                    <p class="text">{!! nl2br(e(\App\Models\Setting::get('opening_hours', "Mon – Fri: 12 PM – 10 PM\nSat – Sun: 1 PM – 11 PM"))) !!}</p>
                  </div>
                  <a class='common-button-five' href="{{ route('contact') }}">
                    <span class="btn-text">Discover all branch</span>
                  </a>
                </div>
                <div class="contact-five__info">
                  <div class="opening-location">
                    <h4 class="title">Location 01</h4>
                    <p class="text">123 Sweet Street, City Center</p>
                  </div>
                  <div class="opening-location">
                    <h4 class="title">Location 02</h4>
                    <p class="text">45 Bakery Avenue, Riverside</p>
                  </div>
                  <div class="contact-map">
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3747016.891503112!2d87.70352446720406!3d23.489442187647825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2sBangladesh!5e0!3m2!1sen!2sbd!4v1761018733651!5m2!1sen!2sbd"
                      style="border: 0"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="faq-five section section-padding">
        <div class="container">
          <div class="row g-4">
            <div class="col-lg-6">
              <div class="patisserie__header text-center text-lg-start">
                <h2 class="header-title mx-auto">
                  <span class="line-text position-relative">
                    <span class="top-tag v2">FAQ’s</span>
                    Frequently Asked
                  </span>
                  <br />
                  <span class="line-text position-relative">
                    Questions
                    <span class="bottom-tag v4">pastries</span>
                  </span>
                </h2>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="accordion faq-five__accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >
                      Are your pastries baked fresh daily?
                    </button>
                  </h2>
                  <div
                    id="collapseOne"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Yes! We bake all of our breads, croissants, and pastries
                      fresh every single morning to ensure the best quality and
                      taste.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo"
                      aria-expanded="false"
                      aria-controls="collapseTwo"
                    >
                      Do you offer eggless options?
                    </button>
                  </h2>
                  <div
                    id="collapseTwo"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Absolutely! We have a dedicated selection of eggless cakes
                      and pastries available. Just ask our staff for details.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseThree"
                      aria-expanded="false"
                      aria-controls="collapseThree"
                    >
                      Can I place orders online?
                    </button>
                  </h2>
                  <div
                    id="collapseThree"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Yes, you can easily place orders through our website for
                      in-store pickup or get them delivered straight to your
                      door.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseFour"
                      aria-expanded="false"
                      aria-controls="collapseFour"
                    >
                      Are non-coffee drinks available?
                    </button>
                  </h2>
                  <div
                    id="collapseFour"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Yes, we offer a selection of refreshing teas, fresh
                      juices, hot chocolate, and organic smoothies to enjoy with
                      treats.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseFive"
                      aria-expanded="false"
                      aria-controls="collapseFive"
                    >
                      Do you have multiple branches?
                    </button>
                  </h2>
                  <div
                    id="collapseFive"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Currently, we operate from our main downtown location, but
                      we are looking forward to opening new branches very soon!
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cta-five section section-padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="cta-five__content">
                <img
                  src="{{ asset('assets/img/badge-text.png') }}"
                  alt="text"
                  class="rotating-text"
                />
                <div
                  class="content-box"
                  data-background="{{ asset('assets/img/badge-pattern.png') }}"
                >
                  <img
                    src="{{ asset('assets/img/badge-img.png') }}"
                    alt="content-img"
                    class="content-img"
                  />
                  <a class='common-button-five v3' href="{{ route('menu') }}">
                    <span class="btn-text">View Our Menu</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
@endsection
