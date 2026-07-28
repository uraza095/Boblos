@extends('layouts.app')

@section('title', 'Cart - Dinevo')

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
      <section class="cart-four section section-padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="cart-four__carts">
                <div class="cart-header">
                  <p class="h-empty"></p>
                  <p class="h-empty"></p>
                  <p class="h-product">Product</p>
                  <p class="h-price">Price</p>
                  <p class="h-quantity">Quantity</p>
                  <p class="h-subtotal">Subtotal</p>
                </div>

                <div class="cart-item">
                  <div class="remove-col">
                    <button class="remove-btn">
                      <i class="fa-solid fa-xmark"></i>
                    </button>
                  </div>
                  <div class="img-col">
                    <div class="img">
                      <img
                        src="{{ asset('assets/images/patisserie/cart/thumb-1.png') }}"
                        alt="chocolate eclair"
                      />
                    </div>
                  </div>
                  <div class="product-title-col">
                    <p class="product-title">chocolate eclair</p>
                  </div>
                  <div class="price">
                    <p>$5.00</p>
                  </div>
                  <div class="quantity">
                    <div class="number-input">
                      <button
                        class="plus number-btn border-0"
                        aria-label="Increase by one"
                      >
                        <i class="fa-regular fa-plus"></i>
                      </button>
                      <span class="number-field text-dark">1</span>
                      <button
                        class="minus number-btn border-0"
                        aria-label="Decrease by one"
                        disabled
                      >
                        <i class="fa-regular fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="subtotal">
                    <p>$5.00</p>
                  </div>
                </div>

                <div class="cart-item">
                  <div class="remove-col">
                    <button class="remove-btn">
                      <i class="fa-solid fa-xmark"></i>
                    </button>
                  </div>
                  <div class="img-col">
                    <div class="img">
                      <img
                        src="{{ asset('assets/images/patisserie/cart/thumb-2.png') }}"
                        alt="Coconut Cream"
                      />
                    </div>
                  </div>
                  <div class="product-title-col">
                    <p class="product-title">Coconut Cream</p>
                  </div>
                  <div class="price">
                    <p>$7.00</p>
                  </div>
                  <div class="quantity">
                    <div class="number-input">
                      <button
                        class="plus number-btn border-0"
                        aria-label="Increase by one"
                      >
                        <i class="fa-regular fa-plus"></i>
                      </button>
                      <span class="number-field text-dark">1</span>
                      <button
                        class="minus number-btn border-0"
                        aria-label="Decrease by one"
                        disabled
                      >
                        <i class="fa-regular fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="subtotal">
                    <p>$7.00</p>
                  </div>
                </div>
              </div>

              <div class="cart-four__bottom">
                <form action="#" class="cupon-code">
                  <div class="input-wrap">
                    <input type="text" placeholder="Coupon code" />
                  </div>
                  <div class="btn-group">
                    <button type="submit" class="common-button-five v2">
                      <span class="btn-text">Apply Cuppon</span>
                    </button>
                  </div>
                </form>
                <div class="update-cart">
                  <div class="btn-group">
                    <button class="common-button-five">
                      <span class="btn-text">Update Cart</span>
                    </button>
                  </div>
                </div>
              </div>
              <div class="cart-four__total">
                <div class="total-box">
                  <h3 class="title">Cart total</h3>
                  <ul class="total-list list-unstyled">
                    <li>
                      <span class="label">Subtotal</span>
                      <span class="value">$12.00</span>
                    </li>
                    <li>
                      <span class="label">Total</span>
                      <span class="value">$12.00</span>
                    </li>
                  </ul>
                  <a class='common-button-five v2' href="{{ route('checkout') }}">
                    <span class="btn-text">Proceed to checkout</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- contact info section end -->
    
@endsection
