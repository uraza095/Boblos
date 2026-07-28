@extends('layouts.app')

@section('title', 'Faq - Dinevo')

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
                    <span class="top-tag v2">Faq’s</span>
                    Faq’s
                    <span class="bottom-tag v3">food delivery</span>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- breadcrumb section end -->

      <!-- faq section start -->
      <section class="faq-common v4 section section-padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="faq-common__main">
                <h2 class="faq-title">Shipping & Delivery</h2>
                <div class="accordion faq-common__accordion" id="faqAccordion">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne"
                      >
                        Do you offer home delivery?
                      </button>
                    </h2>
                    <div
                      id="collapseOne"
                      class="accordion-collapse collapse show"
                      aria-labelledby="headingOne"
                      data-bs-parent="#faqAccordion"
                    >
                      <div class="accordion-body">
                        Delivery fees may vary based on distance. The exact
                        charge will be shown at checkout.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo"
                        aria-expanded="false"
                        aria-controls="collapseTwo"
                      >
                        How long does delivery take?
                      </button>
                    </h2>
                    <div
                      id="collapseTwo"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingTwo"
                      data-bs-parent="#faqAccordion"
                    >
                      <div class="accordion-body">
                        Delivery fees may vary based on distance. The exact
                        charge will be shown at checkout.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree"
                      >
                        Is there a delivery charge?
                      </button>
                    </h2>
                    <div
                      id="collapseThree"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingThree"
                      data-bs-parent="#faqAccordion"
                    >
                      <div class="accordion-body">
                        Delivery fees may vary based on distance. The exact
                        charge will be shown at checkout.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseFour"
                        aria-expanded="false"
                        aria-controls="collapseFour"
                      >
                        Can I schedule my order in advance?
                      </button>
                    </h2>
                    <div
                      id="collapseFour"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingFour"
                      data-bs-parent="#faqAccordion"
                    >
                      <div class="accordion-body">
                        Delivery fees may vary based on distance. The exact
                        charge will be shown at checkout.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseFive"
                        aria-expanded="false"
                        aria-controls="collapseFive"
                      >
                        Do you offer same-day delivery?
                      </button>
                    </h2>
                    <div
                      id="collapseFive"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingFive"
                      data-bs-parent="#faqAccordion"
                    >
                      <div class="accordion-body">
                        Delivery fees may vary based on distance. The exact
                        charge will be shown at checkout.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="faq-common__main section-padding-top">
                <h2 class="faq-title">Payment Method</h2>
                <div
                  class="accordion faq-common__accordion"
                  id="faqAccordionTwo"
                >
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne"
                      >
                        What payment methods do you accept?
                      </button>
                    </h2>
                    <div
                      id="collapseOne"
                      class="accordion-collapse collapse show"
                      aria-labelledby="headingOne"
                      data-bs-parent="#faqAccordionTwo"
                    >
                      <div class="accordion-body">
                        We accept all major credit cards including Visa,
                        Mastercard, American Express, and Discover. We also
                        accept digital wallets like Apple Pay and Google Pay.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo"
                        aria-expanded="false"
                        aria-controls="collapseTwo"
                      >
                        Is online payment secure?
                      </button>
                    </h2>
                    <div
                      id="collapseTwo"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingTwo"
                      data-bs-parent="#faqAccordionTwo"
                    >
                      <div class="accordion-body">
                        Yes, your online payments are highly secure. We use
                        industry-standard encryption protocols and do not store
                        your credit card information on our servers.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree"
                      >
                        Can I request a refund?
                      </button>
                    </h2>
                    <div
                      id="collapseThree"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingThree"
                      data-bs-parent="#faqAccordionTwo"
                    >
                      <div class="accordion-body">
                        Refunds can be requested within 24 hours of your order
                        if you experience an issue. Please contact our support
                        team with your order number to initiate the process.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseFour"
                        aria-expanded="false"
                        aria-controls="collapseFour"
                      >
                        Can I pay with cash on delivery?
                      </button>
                    </h2>
                    <div
                      id="collapseFour"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingFour"
                      data-bs-parent="#faqAccordionTwo"
                    >
                      <div class="accordion-body">
                        Yes, we offer Cash on Delivery (COD) for orders placed
                        within our primary delivery zones. Please ensure you
                        have the exact amount ready to speed up the process.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseFive"
                        aria-expanded="false"
                        aria-controls="collapseFive"
                      >
                        Will I receive a payment confirmation?
                      </button>
                    </h2>
                    <div
                      id="collapseFive"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingFive"
                      data-bs-parent="#faqAccordionTwo"
                    >
                      <div class="accordion-body">
                        Absolutely. Once your payment is successfully processed,
                        you will receive an automatic email and SMS confirmation
                        containing your order receipt.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- faq section end -->
    
@endsection
