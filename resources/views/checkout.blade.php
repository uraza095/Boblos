@extends('layouts.app')

@section('title', 'Checkout - Dinevo')

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
                    <span class="top-tag v2">Check out</span>
                    Check out
                    <span class="bottom-tag v3">food delivery</span>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- breadcrumb section end -->

      <!-- Check info section start -->
      <section class="check-two v4 section section-padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="check-two__header">
                <p>
                  Have a coupon? <a href="{{ route('about') }}">Click here to enter your code</a
                  >
                </p>
              </div>
            </div>
          </div>
          <div class="row row-padding-top">
            <div class="col-12">
              <div class="check-two__wrapper">
                <div class="check-two__billing">
                  <h3 class="billing-title">BILLING DETAILS</h3>
                  <form action="#" class="billing-form">
                    <div class="row g-4">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>First Name <span>*</span></label>
                          <div class="input-wrapper">
                            <input type="text" placeholder="Diannel" />
                            <i class="fa-regular fa-user"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Last Name <span>*</span></label>
                          <div class="input-wrapper">
                            <input type="text" placeholder="Russell" />
                            <i class="fa-regular fa-user"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <input type="text" placeholder="United States (US)" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <input
                            type="text"
                            placeholder="House number and street name"
                          />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <input
                            type="text"
                            placeholder="Apartment, suite, unit, etc. (optional)"
                          />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Town / City <span>*</span></label>
                          <input type="text" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>State <span>*</span></label>
                          <input type="text" placeholder="California" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Zip Code <span>*</span></label>
                          <input type="text" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Phone (Optional) <span>*</span></label>
                          <input type="tel" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Email Address <span>*</span></label>
                          <input type="email" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Additional Information <span>*</span></label>
                          <textarea></textarea>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="check-two__order">
                  <h3 class="order-title">YOUR ORDER</h3>

                  <div class="order-table">
                    <div class="order-table-header">
                      <span>PRODUCT</span>
                      <span>SUBTOTAL</span>
                    </div>

                    <ul class="order-table-list">
                      <li>
                        <span class="product-name">Steaming Espresso</span>
                        <span class="product-price">$5.00</span>
                      </li>
                      <li>
                        <span class="product-name">Steaming Espresso</span>
                        <span class="product-price">$7.00</span>
                      </li>
                    </ul>

                    <div class="order-table-subtotal">
                      <span>Subtotal</span>
                      <span>$12.00</span>
                    </div>

                    <div class="order-table-total">
                      <span>Total</span>
                      <span>$12.00</span>
                    </div>
                  </div>

                  <div class="order-payment">
                    <div class="payment-method active">
                      <label class="custom-radio">
                        <input type="radio" name="payment_method" checked />
                        <span class="checkmark"></span>
                        Direct Bank Transfer
                      </label>
                      <div class="payment-description">
                        Make your payment directly into our bank account. Please
                        use your Order ID as the payment reference. Your order
                        will not be shipped until the funds have cleared in our
                        account.
                      </div>
                    </div>

                    <div class="payment-method">
                      <label class="custom-radio">
                        <input type="radio" name="payment_method" />
                        <span class="checkmark"></span>
                        Check Payments
                      </label>
                    </div>

                    <div class="payment-method">
                      <label class="custom-radio">
                        <input type="radio" name="payment_method" />
                        <span class="checkmark"></span>
                        Cash On Delivery
                      </label>
                    </div>
                  </div>

                  <div class="order-privacy">
                    <p>
                      Your personal data will be used to process your order,
                      support your experience throughout this website, and for
                      other purposes described in our
                      <a href="#">privacy policy.</a>
                    </p>
                  </div>

                  <a href="#" class="common-button-five v2">
                    <span class="btn-text">Place Order</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Check info section end -->
    
@endsection
