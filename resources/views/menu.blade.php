@extends('layouts.app')

@section('title', "Our Menu - Boblo's")

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
                    <span class="top-tag v2">Menu</span>
                    Boblo's Menu
                    <span class="bottom-tag v3">Delicious & Fresh</span>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- breadcrumb section end -->

      <!-- Menu section start -->
      <section class="menu-three section section-padding">
        <div class="container">
          @if(isset($categories) && $categories->count() > 0)
            @foreach($categories as $category)
              @if($category->menuItems && $category->menuItems->count() > 0)
                <div class="row mb-5">
                  <div class="col-12">
                    <div class="menu-three__wrapper has-solid-border p-4 p-md-5">
                      <div class="menu-three__list-wrapper fade-anim w-100">
                        <h3 class="menu-name mb-4" style="color: #ee7c8b; border-bottom: 2px solid rgba(238, 124, 139, 0.2); padding-bottom: 10px;">{{ $category->name }}</h3>
                        <div class="menu-list row">
                          @foreach($category->menuItems as $item)
                            <div class="col-md-6 mb-4">
                              <div class="menu-three__item v2 h-100 p-3 rounded" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08);">
                                <div class="item-content w-100">
                                  <div class="item-header d-flex justify-content-between align-items-baseline gap-2 mb-1">
                                    <h4 class="item-title m-0 font-weight-bold" style="font-size: 1.1rem;">
                                      <span>{{ $item->name }}</span>
                                    </h4>
                                    <span class="item-price font-weight-bold" style="color: #ee7c8b; white-space: nowrap; font-size: 1.05rem;">
                                      @if($item->price > 0)
                                        Rs. {{ number_format($item->price, 0) }}
                                      @else
                                        -
                                      @endif
                                    </span>
                                  </div>
                                  @if($item->description)
                                    <p class="item-desc text-muted m-0 text-sm" style="font-size: 0.88rem; opacity: 0.8;">{{ $item->description }}</p>
                                  @endif
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
          @else
            <div class="row">
              <div class="col-12 text-center py-5">
                <p class="lead">No menu categories available at the moment.</p>
              </div>
            </div>
          @endif
        </div>
      </section>
      <!-- Menu section end -->

@endsection
