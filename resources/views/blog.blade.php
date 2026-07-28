@extends('layouts.app')

@section('title', 'Blog - Dinevo')

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
                    <span class="top-tag v2">Blog</span>
                    Blog stander
                    <span class="bottom-tag v3">food delivery</span>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- breadcrumb section end -->

      <!-- blog standard section start -->
      <section class="blog-one-main section section-padding">
        <div class="container">
          <div class="row gy-5 g-xl-5 justify-content-center">
            <div class="col-12">
              <div class="blog-one-main__wrapper">
                <div class="blog-one-main__item-nav">
                  <div class="blog-one-main__items">
                    <div class="blog-one-main__item v5">
                      <div class="blog-thumb">
                        <a class='tw-clip-anim' href="{{ route('blog.details') }}">
                          <img
                            src="{{ asset('assets/images/patisserie/blog/thumb-1.png') }}"
                            alt="thumb"
                            data-animate="true"
                            class="tw-anim-img"
                          />
                        </a>
                        <div class="blog-date">
                          <span class="day-text">11</span>
                          <span class="month-text">March</span>
                        </div>
                      </div>
                      <div class="blog-content">
                        <h4 class="content-title">
                          <a class='line-clamp-2' href="{{ route('blog.details') }}">Sushi is more than just a dish — it’s a refined
                            culinary art that blends</a
                          >
                        </h4>

                        <div class="content-footer">
                          <div class="author">
                            <img
                              src="{{ asset('assets/images/patisserie/blog/author-1.png') }}"
                              alt="author"
                            />
                            <span class="author-name">Dianne Russell</span>
                          </div>
                          <a class='common-button-five' href="{{ route('blog.details') }}">
                            <span class="btn-text">Read More</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="blog-one-main__item v5">
                      <div class="blog-thumb">
                        <a class='tw-clip-anim' href="{{ route('blog.details') }}">
                          <img
                            src="{{ asset('assets/images/patisserie/blog/thumb-2.png') }}"
                            alt="thumb"
                            data-animate="true"
                            class="tw-anim-img"
                          />
                        </a>
                        <div class="blog-date">
                          <span class="day-text">15</span>
                          <span class="month-text">April</span>
                        </div>
                      </div>
                      <div class="blog-content">
                        <h4 class="content-title">
                          <a class='line-clamp-2' href="{{ route('blog.details') }}">tradition, precision, and fresh ingredients into an
                          </a>
                        </h4>

                        <div class="content-footer">
                          <div class="author">
                            <img
                              src="{{ asset('assets/images/patisserie/blog/author-2.png') }}"
                              alt="author"
                            />
                            <span class="author-name">Dianne Russell</span>
                          </div>
                          <a class='common-button-five' href="{{ route('blog.details') }}">
                            <span class="btn-text">Read More</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="blog-one-main__item v5">
                      <div class="blog-thumb">
                        <a class='tw-clip-anim' href="{{ route('blog.details') }}">
                          <img
                            src="{{ asset('assets/images/patisserie/blog/thumb-3.png') }}"
                            alt="thumb"
                            data-animate="true"
                            class="tw-anim-img"
                          />
                        </a>
                        <div class="blog-date">
                          <span class="day-text">28</span>
                          <span class="month-text">April</span>
                        </div>
                      </div>
                      <div class="blog-content">
                        <h4 class="content-title">
                          <a class='line-clamp-2' href="{{ route('blog.details') }}">ingredients into an unforgettable dining
                            experience.</a
                          >
                        </h4>

                        <div class="content-footer">
                          <div class="author">
                            <img
                              src="{{ asset('assets/images/patisserie/blog/author-3.png') }}"
                              alt="author"
                            />
                            <span class="author-name">Dianne Russell</span>
                          </div>
                          <a class='common-button-five' href="{{ route('blog.details') }}">
                            <span class="btn-text">Read More</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="blog-one-main__item v5">
                      <div class="blog-thumb">
                        <a class='tw-clip-anim' href="{{ route('blog.details') }}">
                          <img
                            src="{{ asset('assets/images/patisserie/blog/thumb-4.png') }}"
                            alt="thumb"
                            data-animate="true"
                            class="tw-anim-img"
                          />
                        </a>
                        <div class="blog-date">
                          <span class="day-text">12</span>
                          <span class="month-text">May</span>
                        </div>
                      </div>
                      <div class="blog-content">
                        <h4 class="content-title">
                          <a class='line-clamp-2' href="{{ route('blog.details') }}">Originating from Japan, sushi has become a global
                            favorite</a
                          >
                        </h4>

                        <div class="content-footer">
                          <div class="author">
                            <img
                              src="{{ asset('assets/images/patisserie/blog/author-4.png') }}"
                              alt="author"
                            />
                            <span class="author-name">Dianne Russell</span>
                          </div>
                          <a class='common-button-five' href="{{ route('blog.details') }}">
                            <span class="btn-text">Read More</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="blog-one-main__item v5">
                      <div class="blog-thumb">
                        <a class='tw-clip-anim' href="{{ route('blog.details') }}">
                          <img
                            src="{{ asset('assets/images/patisserie/blog/thumb-5.png') }}"
                            alt="thumb"
                            data-animate="true"
                            class="tw-anim-img"
                          />
                        </a>
                        <div class="blog-date">
                          <span class="day-text">15</span>
                          <span class="month-text">Junn</span>
                        </div>
                      </div>
                      <div class="blog-content">
                        <h4 class="content-title">
                          <a class='line-clamp-2' href="{{ route('blog.details') }}">Every piece of sushi tells a story, from the
                            perfectly seasoned.</a
                          >
                        </h4>

                        <div class="content-footer">
                          <div class="author">
                            <img
                              src="{{ asset('assets/images/patisserie/blog/author-5.png') }}"
                              alt="author"
                            />
                            <span class="author-name">Dianne Russell</span>
                          </div>
                          <a class='common-button-five' href="{{ route('blog.details') }}">
                            <span class="btn-text">Read More</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <nav
                    aria-label="..."
                    class="log-grid__pagination pagination-common v4 row-padding-top"
                  >
                    <ul class="pagination justify-content-start">
                      <li class="page-item">
                        <a href="#" class="page-link">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                          >
                            <path
                              d="M3.825 9H16V7H3.825L9.425 1.4L8 0L-2.38419e-07 8L8 16L9.425 14.6L3.825 9Z"
                              fill="currentColor"
                            />
                          </svg>
                        </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#" aria-current="page">01</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">02</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                          >
                            <path
                              d="M12.175 9H0V7H12.175L6.575 1.4L8 0L16 8L8 16L6.575 14.6L12.175 9Z"
                              fill="currentColor"
                            />
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <div class="widget-one_sidebar">
                  <div class="widget v5 widget__search">
                    <h4 class="widget-title">Search Here</h4>
                    <div class="widget__search-form border-line">
                      <form action="#">
                        <input type="text" placeholder="keyword..." />
                        <button type="submit">
                          <svg
                            width="15"
                            height="15"
                            viewBox="0 0 15 15"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <circle
                              cx="6.5"
                              cy="6.5"
                              r="5.5"
                              stroke="currentColor"
                              stroke-width="1.5"
                            />
                            <path
                              d="M14 14L10.5 10.5"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                            />
                          </svg>
                        </button>
                      </form>
                    </div>
                  </div>
                  <div class="widget v5 widget__recent-posts">
                    <h6 class="widget-title">recent post</h6>
                    <div class="posts-list">
                      <div class="post-item">
                        <a class='item-thumb' href="{{ route('blog.details') }}">
                          <img
                            src="{{ asset('assets/images/patisserie/widget/latest-post-1.png') }}"
                            alt="post"
                            class="w-100"
                          />
                        </a>
                        <div class="item-content">
                          <span class="post-date">May 28, 2026</span>
                          <h6 class="post-title">
                            <a class='line-clamp-2' href="{{ route('blog.details') }}">Combined with expert knife skills and artistic</a
                            >
                          </h6>
                        </div>
                      </div>
                      <div class="post-item">
                        <a class='item-thumb' href="{{ route('blog.details') }}">
                          <img
                            src="{{ asset('assets/images/patisserie/widget/latest-post-2.png') }}"
                            alt="post"
                            class="w-100"
                          />
                        </a>
                        <div class="item-content">
                          <span class="post-date">May 30, 2026</span>
                          <h6 class="post-title">
                            <a class='line-clamp-2' href="{{ route('blog.details') }}">Freshness is the heart of great sushi.
                            </a>
                          </h6>
                        </div>
                      </div>
                      <div class="post-item">
                        <a class='item-thumb' href="{{ route('blog.details') }}">
                          <img
                            src="{{ asset('assets/images/patisserie/widget/latest-post-3.png') }}"
                            alt="post"
                            class="w-100"
                          />
                        </a>
                        <div class="item-content">
                          <span class="post-date">Jun 18, 2026</span>
                          <h6 class="post-title">
                            <a class='line-clamp-2' href="{{ route('blog.details') }}">Premium ingredients like salmon, tuna, shrimp.</a
                            >
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget v5 widget__tags">
                    <h6 class="widget-title">popular Tags</h6>
                    <div class="tag-list">
                      <a class='tag-btn' href="{{ route('blog') }}">French Pastry</a>
                      <a class='tag-btn' href="{{ route('blog') }}">Desserts</a>
                      <a class='tag-btn' href="{{ route('blog') }}">temaki</a>
                      <a class='tag-btn' href="{{ route('blog') }}">cafe</a>
                      <a class='tag-btn' href="{{ route('blog') }}">Best Seller</a>
                      <a class='tag-btn' href="{{ route('blog') }}">Sweet Moments</a>
                      <a class='tag-btn' href="{{ route('blog') }}">Pastry Art</a>
                      <a class='tag-btn' href="{{ route('blog') }}">fusion sushi</a>
                      <a class='tag-btn' href="{{ route('blog') }}">sushi chef</a>
                      <a class='tag-btn' href="{{ route('blog') }}">cakes</a>
                    </div>
                  </div>
                  <div
                    class="widget v5 widget__cta"
                    data-background="{{ asset('assets/images/patisserie/widget/cta-thumb.png') }}"
                  >
                    <div class="cta-content">
                      <div class="cta-icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="82"
                          height="82"
                          viewBox="0 0 82 82"
                          fill="none"
                        >
                          <path
                            d="M26.1565 72.9375C25.8801 72.9375 25.6562 73.1616 25.6562 73.4379C25.6562 73.7142 25.8803 73.9381 26.1565 73.9381C26.4328 73.9381 26.6567 73.7142 26.6567 73.4379C26.6567 73.4352 26.6559 73.4326 26.6559 73.4297C26.5778 73.2916 26.5008 73.154 26.4253 73.017C26.3475 72.9673 26.2556 72.9375 26.1565 72.9375Z"
                            fill="currentColor"
                          />
                          <path
                            d="M26.1565 76.1562C25.8801 76.1562 25.6562 76.3803 25.6562 76.6566C25.6562 76.933 25.8803 77.1568 26.1565 77.1568C26.4328 77.1568 26.6567 76.933 26.6567 76.6566C26.6567 76.3803 26.4328 76.1562 26.1565 76.1562Z"
                            fill="currentColor"
                          />
                          <path
                            d="M27.8303 77.7109C27.554 77.7109 27.3301 77.935 27.3301 78.2111C27.3301 78.4042 27.4406 78.5698 27.6008 78.6531C27.8548 78.4001 28.0088 78.1035 28.0871 77.7838C28.0118 77.7387 27.9246 77.7109 27.8303 77.7109Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.4316 63.7565C22.4316 64.0329 22.6557 64.2568 22.9319 64.2568C22.9631 64.2568 22.9934 64.2531 23.0233 64.2476C22.9533 63.9139 22.893 63.587 22.8401 63.2656C22.6077 63.3088 22.4316 63.5116 22.4316 63.7565Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.9319 66.4844C22.6555 66.4844 22.4316 66.7084 22.4316 66.9848C22.4316 67.2611 22.6557 67.485 22.9319 67.485C23.2082 67.485 23.4321 67.2611 23.4321 66.9848C23.4321 66.7084 23.2082 66.4844 22.9319 66.4844Z"
                            fill="currentColor"
                          />
                          <path
                            d="M24.1035 68.536C24.1035 68.7791 24.277 68.9812 24.5067 69.0264C24.3989 68.7618 24.2981 68.501 24.2005 68.2422C24.1402 68.3249 24.1035 68.4258 24.1035 68.536Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.9319 69.7109C22.6555 69.7109 22.4316 69.935 22.4316 70.2113C22.4316 70.4876 22.6557 70.7115 22.9319 70.7115C23.2082 70.7115 23.4321 70.4876 23.4321 70.2113C23.4321 69.935 23.2082 69.7109 22.9319 69.7109Z"
                            fill="currentColor"
                          />
                          <path
                            d="M24.6057 71.2578C24.3295 71.2578 24.1055 71.4819 24.1055 71.7582C24.1055 72.0345 24.3295 72.2584 24.6057 72.2584C24.882 72.2584 25.1059 72.0345 25.1059 71.7582C25.1059 71.4817 24.8819 71.2578 24.6057 71.2578Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.9319 72.9375C22.6555 72.9375 22.4316 73.1616 22.4316 73.4379C22.4316 73.7142 22.6557 73.9381 22.9319 73.9381C23.2082 73.9381 23.4321 73.7142 23.4321 73.4379C23.4321 73.1616 23.2082 72.9375 22.9319 72.9375Z"
                            fill="currentColor"
                          />
                          <path
                            d="M24.6057 74.4844C24.3295 74.4844 24.1055 74.7084 24.1055 74.9848C24.1055 75.2611 24.3295 75.485 24.6057 75.485C24.882 75.485 25.1059 75.2611 25.1059 74.9848C25.1059 74.7083 24.8819 74.4844 24.6057 74.4844Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.9319 76.1562C22.6555 76.1562 22.4316 76.3803 22.4316 76.6566C22.4316 76.933 22.6557 77.1568 22.9319 77.1568C23.2082 77.1568 23.4321 76.933 23.4321 76.6566C23.4321 76.3803 23.2082 76.1562 22.9319 76.1562Z"
                            fill="currentColor"
                          />
                          <path
                            d="M19.7014 76.1562C19.4251 76.1562 19.2012 76.3803 19.2012 76.6566C19.2012 76.933 19.4251 77.1568 19.7014 77.1568C19.9777 77.1568 20.2016 76.933 20.2016 76.6566C20.2016 76.3803 19.9777 76.1562 19.7014 76.1562Z"
                            fill="currentColor"
                          />
                          <path
                            d="M25.1059 78.2111C25.1059 77.9348 24.8819 77.7109 24.6057 77.7109C24.3295 77.7109 24.1055 77.935 24.1055 78.2111C24.1055 78.4875 24.3295 78.7114 24.6057 78.7114C24.8819 78.7114 25.1059 78.4875 25.1059 78.2111Z"
                            fill="currentColor"
                          />
                          <path
                            d="M19.7072 63.2578C19.4309 63.2578 19.207 63.4819 19.207 63.7582C19.207 64.0345 19.4311 64.2584 19.7072 64.2584C19.9836 64.2584 20.2075 64.0345 20.2075 63.7582C20.2076 63.4817 19.9836 63.2578 19.7072 63.2578Z"
                            fill="currentColor"
                          />
                          <path
                            d="M21.3791 65.8131C21.6554 65.8131 21.8793 65.5892 21.8793 65.3129C21.8793 65.0365 21.6554 64.8125 21.3791 64.8125C21.1028 64.8125 20.8789 65.0365 20.8789 65.3129C20.8787 65.589 21.1028 65.8131 21.3791 65.8131Z"
                            fill="currentColor"
                          />
                          <path
                            d="M21.3791 69.0396C21.6554 69.0396 21.8793 68.8158 21.8793 68.5394C21.8793 68.2631 21.6554 68.0391 21.3791 68.0391C21.1028 68.0391 20.8789 68.2631 20.8789 68.5394C20.8789 68.8158 21.1028 69.0396 21.3791 69.0396Z"
                            fill="currentColor"
                          />
                          <path
                            d="M19.7072 67.4771C19.9836 67.4771 20.2075 67.2533 20.2075 66.9769C20.2075 66.7006 19.9836 66.4766 19.7072 66.4766C19.4309 66.4766 19.207 66.7006 19.207 66.9769C19.207 67.2533 19.4311 67.4771 19.7072 67.4771Z"
                            fill="currentColor"
                          />
                          <path
                            d="M20.8789 78.2111C20.8789 78.4875 21.103 78.7114 21.3791 78.7114C21.6554 78.7114 21.8793 78.4875 21.8793 78.2111C21.8793 77.9348 21.6554 77.7109 21.3791 77.7109C21.103 77.7108 20.8789 77.9348 20.8789 78.2111Z"
                            fill="currentColor"
                          />
                          <path
                            d="M18.1545 62.5865C18.4308 62.5865 18.6547 62.3626 18.6547 62.0863C18.6547 61.81 18.4308 61.5859 18.1545 61.5859C17.8782 61.5859 17.6543 61.81 17.6543 62.0863C17.6543 62.3626 17.8782 62.5865 18.1545 62.5865Z"
                            fill="currentColor"
                          />
                          <path
                            d="M80.7175 25.4799C80.6545 25.283 80.5875 25.0839 80.5155 24.8828C80.4951 24.9373 80.4824 24.9957 80.4824 25.0571C80.4823 25.2358 80.5766 25.3914 80.7175 25.4799Z"
                            fill="currentColor"
                          />
                          <path
                            d="M80.9826 27.7812C80.7063 27.7812 80.4824 28.0053 80.4824 28.2816C80.4824 28.558 80.7065 28.7818 80.9826 28.7818C81.1231 28.7818 81.2497 28.7236 81.3406 28.6303C81.3276 28.3851 81.304 28.1326 81.27 27.873C81.1886 27.8156 81.0898 27.7812 80.9826 27.7812Z"
                            fill="currentColor"
                          />
                          <path
                            d="M80.9826 31.0078C80.7063 31.0078 80.4824 31.2319 80.4824 31.5082C80.4824 31.7845 80.7065 32.0084 80.9826 32.0084C80.9921 32.0084 81.0009 32.0062 81.0102 32.0057C81.089 31.7261 81.156 31.4136 81.2094 31.0646C81.1409 31.0295 81.0648 31.0078 80.9826 31.0078Z"
                            fill="currentColor"
                          />
                          <path
                            d="M77.758 21.3359C77.4817 21.3359 77.2578 21.56 77.2578 21.8363C77.2578 22.1126 77.4819 22.3365 77.758 22.3365C78.0344 22.3365 78.2582 22.1126 78.2582 21.8363C78.2582 21.56 78.0344 21.3359 77.758 21.3359Z"
                            fill="currentColor"
                          />
                          <path
                            d="M79.4319 22.8828C79.1555 22.8828 78.9316 23.1069 78.9316 23.3832C78.9316 23.6595 79.1557 23.8834 79.4319 23.8834C79.6947 23.8834 79.9079 23.6799 79.9282 23.4222C79.8623 23.2748 79.7938 23.1267 79.7234 22.9779C79.6413 22.9186 79.5411 22.8828 79.4319 22.8828Z"
                            fill="currentColor"
                          />
                          <path
                            d="M77.758 25.5553C78.0344 25.5553 78.2582 25.3314 78.2582 25.0551C78.2582 24.7787 78.0342 24.5547 77.758 24.5547C77.4817 24.5547 77.2578 24.7787 77.2578 25.0551C77.2578 25.3312 77.4817 25.5553 77.758 25.5553Z"
                            fill="currentColor"
                          />
                          <path
                            d="M79.4319 26.1094C79.1555 26.1094 78.9316 26.3334 78.9316 26.6097C78.9316 26.8861 79.1557 27.11 79.4319 27.11C79.7082 27.11 79.9321 26.8861 79.9321 26.6097C79.9321 26.3334 79.7082 26.1094 79.4319 26.1094Z"
                            fill="currentColor"
                          />
                          <path
                            d="M77.758 28.7818C78.0344 28.7818 78.2582 28.558 78.2582 28.2816C78.2582 28.0053 78.0342 27.7812 77.758 27.7812C77.4817 27.7812 77.2578 28.0053 77.2578 28.2816C77.2578 28.5578 77.4817 28.7818 77.758 28.7818Z"
                            fill="currentColor"
                          />
                          <path
                            d="M79.4319 30.3365C79.7082 30.3365 79.9321 30.1126 79.9321 29.8363C79.9321 29.56 79.708 29.3359 79.4319 29.3359C79.1555 29.3359 78.9316 29.56 78.9316 29.8363C78.9316 30.1126 79.1557 30.3365 79.4319 30.3365Z"
                            fill="currentColor"
                          />
                          <path
                            d="M77.758 32.0084C78.0344 32.0084 78.2582 31.7845 78.2582 31.5082C78.2582 31.2319 78.0342 31.0078 77.758 31.0078C77.4817 31.0078 77.2578 31.2319 77.2578 31.5082C77.2578 31.7845 77.4817 32.0084 77.758 32.0084Z"
                            fill="currentColor"
                          />
                          <path
                            d="M79.4319 33.5631C79.7082 33.5631 79.9321 33.3392 79.9321 33.0629C79.9321 32.7865 79.708 32.5625 79.4319 32.5625C79.1555 32.5625 78.9316 32.7865 78.9316 33.0629C78.9316 33.3392 79.1557 33.5631 79.4319 33.5631Z"
                            fill="currentColor"
                          />
                          <path
                            d="M76.2072 26.1094C75.9309 26.1094 75.707 26.3334 75.707 26.6097C75.707 26.8861 75.9311 27.11 76.2072 27.11C76.4836 27.11 76.7075 26.8861 76.7075 26.6097C76.7075 26.3334 76.4834 26.1094 76.2072 26.1094Z"
                            fill="currentColor"
                          />
                          <path
                            d="M74.5334 28.7818C74.8097 28.7818 75.0336 28.558 75.0336 28.2816C75.0336 28.0053 74.8096 27.7812 74.5334 27.7812C74.2571 27.7812 74.0332 28.0053 74.0332 28.2816C74.0332 28.5578 74.2571 28.7818 74.5334 28.7818Z"
                            fill="currentColor"
                          />
                          <path
                            d="M76.2072 29.3359C75.9309 29.3359 75.707 29.56 75.707 29.8363C75.707 30.1126 75.9311 30.3365 76.2072 30.3365C76.4836 30.3365 76.7075 30.1126 76.7075 29.8363C76.7075 29.56 76.4834 29.3359 76.2072 29.3359Z"
                            fill="currentColor"
                          />
                          <path
                            d="M75.0341 31.5082C75.0341 31.2319 74.81 31.0078 74.5338 31.0078C74.3145 31.0078 74.13 31.1501 74.0625 31.3467C74.3111 31.5327 74.5617 31.725 74.814 31.9224C74.9468 31.8328 75.0341 31.6808 75.0341 31.5082Z"
                            fill="currentColor"
                          />
                          <path
                            d="M76.706 33.0629C76.706 32.7865 76.482 32.5625 76.2058 32.5625C76.0487 32.5625 75.9101 32.6366 75.8184 32.75C76.0278 32.9181 76.3064 33.1262 76.6278 33.3294C76.6767 33.2521 76.706 33.1612 76.706 33.0629Z"
                            fill="currentColor"
                          />
                          <path
                            d="M71.3088 24.5547C71.0325 24.5547 70.8086 24.7787 70.8086 25.0551C70.8086 25.3314 71.0326 25.5553 71.3088 25.5553C71.5851 25.5553 71.809 25.3314 71.809 25.0551C71.8092 24.7787 71.5851 24.5547 71.3088 24.5547Z"
                            fill="currentColor"
                          />
                          <path
                            d="M72.9807 26.1094C72.7044 26.1094 72.4805 26.3334 72.4805 26.6097C72.4805 26.8861 72.7045 27.11 72.9807 27.11C73.257 27.11 73.4809 26.8861 73.4809 26.6097C73.4809 26.3334 73.2569 26.1094 72.9807 26.1094Z"
                            fill="currentColor"
                          />
                          <path
                            d="M74.5373 24.5703C74.261 24.5703 74.0371 24.7944 74.0371 25.0707C74.0371 25.347 74.2612 25.5709 74.5373 25.5709C74.8137 25.5709 75.0375 25.347 75.0375 25.0707C75.0375 24.7944 74.8135 24.5703 74.5373 24.5703Z"
                            fill="currentColor"
                          />
                          <path
                            d="M76.1994 22.8906C75.9231 22.8906 75.6992 23.1147 75.6992 23.391C75.6992 23.6673 75.9233 23.8912 76.1994 23.8912C76.4758 23.8912 76.6996 23.6673 76.6996 23.391C76.6996 23.1147 76.4758 22.8906 76.1994 22.8906Z"
                            fill="currentColor"
                          />
                          <path
                            d="M76.1994 19.6719C75.9231 19.6719 75.6992 19.8959 75.6992 20.1723C75.6992 20.4486 75.9233 20.6725 76.1994 20.6725C76.4758 20.6725 76.6996 20.4486 76.6996 20.1723C76.6996 19.8959 76.4758 19.6719 76.1994 19.6719Z"
                            fill="currentColor"
                          />
                          <path
                            d="M71.3088 27.7812C71.0325 27.7812 70.8086 28.0053 70.8086 28.2816C70.8086 28.558 71.0326 28.7818 71.3088 28.7818C71.5851 28.7818 71.809 28.558 71.809 28.2816C71.8092 28.0053 71.5851 27.7812 71.3088 27.7812Z"
                            fill="currentColor"
                          />
                          <path
                            d="M72.9807 29.3359C72.7044 29.3359 72.4805 29.56 72.4805 29.8363C72.4805 30.1126 72.7045 30.3365 72.9807 30.3365C73.257 30.3365 73.4809 30.1126 73.4809 29.8363C73.4809 29.56 73.2569 29.3359 72.9807 29.3359Z"
                            fill="currentColor"
                          />
                          <path
                            d="M67.582 25.0551C67.582 25.3314 67.8061 25.5553 68.0822 25.5553C68.3586 25.5553 68.5825 25.3314 68.5825 25.0551C68.5825 24.7787 68.3584 24.5547 68.0822 24.5547C67.8061 24.5547 67.582 24.7787 67.582 25.0551Z"
                            fill="currentColor"
                          />
                          <path
                            d="M69.7561 26.1094C69.4797 26.1094 69.2559 26.3334 69.2559 26.6097C69.2559 26.8861 69.4799 27.11 69.7561 27.11C70.0324 27.11 70.2563 26.8861 70.2563 26.6097C70.2563 26.3334 70.0324 26.1094 69.7561 26.1094Z"
                            fill="currentColor"
                          />
                          <path
                            d="M66.0312 23.3832C66.0312 23.6595 66.2553 23.8834 66.5315 23.8834C66.8078 23.8834 67.0317 23.6595 67.0317 23.3832C67.0317 23.1069 66.8078 22.8828 66.5315 22.8828C66.2551 22.883 66.0312 23.1069 66.0312 23.3832Z"
                            fill="currentColor"
                          />
                          <path
                            d="M64.3535 21.8285C64.3535 22.1048 64.5776 22.3287 64.8537 22.3287C65.1301 22.3287 65.3539 22.1048 65.3539 21.8285C65.3539 21.5522 65.1301 21.3281 64.8537 21.3281C64.5774 21.3283 64.3535 21.5522 64.3535 21.8285Z"
                            fill="currentColor"
                          />
                          <path
                            d="M69.25 23.3832C69.25 23.6595 69.474 23.8834 69.7502 23.8834C70.0265 23.8834 70.2504 23.6595 70.2504 23.3832C70.2504 23.1069 70.0265 22.8828 69.7502 22.8828C69.474 22.883 69.25 23.1069 69.25 23.3832Z"
                            fill="currentColor"
                          />
                          <path
                            d="M64.8576 24.5547C64.5813 24.5547 64.3574 24.7787 64.3574 25.0551C64.3574 25.3314 64.5813 25.5553 64.8576 25.5553C65.134 25.5553 65.3579 25.3314 65.3579 25.0551C65.358 24.7787 65.134 24.5547 64.8576 24.5547Z"
                            fill="currentColor"
                          />
                          <path
                            d="M67.0317 26.6097C67.0317 26.3334 66.8078 26.1094 66.5315 26.1094C66.2551 26.1094 66.0312 26.3334 66.0312 26.6097C66.0312 26.7336 66.0779 26.8453 66.1525 26.9327C66.3026 26.9871 66.4538 27.0437 66.6062 27.1024C66.8468 27.0662 67.0317 26.8604 67.0317 26.6097Z"
                            fill="currentColor"
                          />
                          <path
                            d="M29.3811 53.5938C29.1047 53.5938 28.8809 53.8178 28.8809 54.0941C28.8809 54.3705 29.1047 54.5943 29.3811 54.5943C29.6574 54.5943 29.8813 54.3705 29.8813 54.0941C29.8813 53.8178 29.6574 53.5938 29.3811 53.5938Z"
                            fill="currentColor"
                          />
                          <path
                            d="M28.8809 57.3127C28.8809 57.4702 28.9551 57.6089 29.0688 57.7007L29.4467 56.8191C29.425 56.8162 29.4037 56.8125 29.3811 56.8125C29.1047 56.8125 28.8809 57.0365 28.8809 57.3127Z"
                            fill="currentColor"
                          />
                          <path
                            d="M26.0926 50.375C25.8468 50.4066 25.6562 50.6144 25.6562 50.8688C25.6562 51.1451 25.8803 51.369 26.1565 51.369C26.4328 51.369 26.6567 51.1451 26.6567 50.8688C26.6567 50.8322 26.6522 50.7966 26.6448 50.7623C26.4572 50.6387 26.2729 50.5097 26.0926 50.375Z"
                            fill="currentColor"
                          />
                          <path
                            d="M27.8303 51.9141C27.554 51.9141 27.3301 52.1381 27.3301 52.4144C27.3301 52.6908 27.5541 52.9147 27.8303 52.9147C28.1066 52.9147 28.3305 52.6908 28.3305 52.4144C28.3307 52.1381 28.1066 51.9141 27.8303 51.9141Z"
                            fill="currentColor"
                          />
                          <path
                            d="M26.1565 53.5938C25.8801 53.5938 25.6562 53.8178 25.6562 54.0941C25.6562 54.3705 25.8803 54.5943 26.1565 54.5943C26.4328 54.5943 26.6567 54.3705 26.6567 54.0941C26.6567 53.8178 26.4328 53.5938 26.1565 53.5938Z"
                            fill="currentColor"
                          />
                          <path
                            d="M27.8303 55.1406C27.554 55.1406 27.3301 55.3647 27.3301 55.6408C27.3301 55.9172 27.5541 56.1411 27.8303 56.1411C28.1066 56.1411 28.3305 55.9172 28.3305 55.6408C28.3307 55.3647 28.1066 55.1406 27.8303 55.1406Z"
                            fill="currentColor"
                          />
                          <path
                            d="M26.1565 56.8125C25.8801 56.8125 25.6562 57.0365 25.6562 57.3129C25.6562 57.5892 25.8803 57.8131 26.1565 57.8131C26.4328 57.8131 26.6567 57.5892 26.6567 57.3129C26.6567 57.0365 26.4328 56.8125 26.1565 56.8125Z"
                            fill="currentColor"
                          />
                          <path
                            d="M27.8303 59.3678C28.1066 59.3678 28.3305 59.1439 28.3305 58.8676C28.3305 58.5912 28.1065 58.3672 27.8303 58.3672C27.554 58.3672 27.3301 58.5912 27.3301 58.8676C27.3301 59.1439 27.5541 59.3678 27.8303 59.3678Z"
                            fill="currentColor"
                          />
                          <path
                            d="M26.1565 60.0391C25.8801 60.0391 25.6562 60.2631 25.6562 60.5394C25.6562 60.8158 25.8803 61.0397 26.1565 61.0397C26.4328 61.0397 26.6567 60.8158 26.6567 60.5394C26.6567 60.2629 26.4328 60.0391 26.1565 60.0391Z"
                            fill="currentColor"
                          />
                          <path
                            d="M24.3457 48.7656C24.201 48.8534 24.1035 49.0108 24.1035 49.1922C24.1035 49.4686 24.3276 49.6924 24.6037 49.6924C24.7779 49.6924 24.9309 49.6033 25.0205 49.4684C24.7861 49.2445 24.5619 49.0091 24.3457 48.7656Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.9319 50.3672C22.6555 50.3672 22.4316 50.5912 22.4316 50.8676C22.4316 51.1439 22.6557 51.3678 22.9319 51.3678C23.2082 51.3678 23.4321 51.1439 23.4321 50.8676C23.4321 50.5912 23.2082 50.3672 22.9319 50.3672Z"
                            fill="currentColor"
                          />
                          <path
                            d="M21.3772 51.9219C21.1008 51.9219 20.877 52.1459 20.877 52.4221C20.877 52.6984 21.1008 52.9223 21.3772 52.9223C21.6535 52.9223 21.8774 52.6984 21.8774 52.4221C21.8775 52.1459 21.6535 51.9219 21.3772 51.9219Z"
                            fill="currentColor"
                          />
                          <path
                            d="M24.6057 51.9141C24.3295 51.9141 24.1055 52.1381 24.1055 52.4144C24.1055 52.6908 24.3295 52.9147 24.6057 52.9147C24.882 52.9147 25.1059 52.6908 25.1059 52.4144C25.1059 52.1381 24.8819 51.9141 24.6057 51.9141Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.9319 53.5938C22.6555 53.5938 22.4316 53.8178 22.4316 54.0941C22.4316 54.3705 22.6557 54.5943 22.9319 54.5943C23.2082 54.5943 23.4321 54.3705 23.4321 54.0941C23.4321 53.8178 23.2082 53.5938 22.9319 53.5938Z"
                            fill="currentColor"
                          />
                          <path
                            d="M24.6057 55.1406C24.3295 55.1406 24.1055 55.3647 24.1055 55.6408C24.1055 55.9172 24.3295 56.1411 24.6057 56.1411C24.882 56.1411 25.1059 55.9172 25.1059 55.6408C25.1059 55.3647 24.8819 55.1406 24.6057 55.1406Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.9319 56.8125C22.6555 56.8125 22.4316 57.0365 22.4316 57.3129C22.4316 57.5892 22.6557 57.8131 22.9319 57.8131C23.2082 57.8131 23.4321 57.5892 23.4321 57.3129C23.4321 57.0365 23.2082 56.8125 22.9319 56.8125Z"
                            fill="currentColor"
                          />
                          <path
                            d="M24.6057 58.3672C24.3295 58.3672 24.1055 58.5912 24.1055 58.8676C24.1055 59.1439 24.3295 59.3678 24.6057 59.3678C24.882 59.3678 25.1059 59.1439 25.1059 58.8676C25.1059 58.5912 24.8819 58.3672 24.6057 58.3672Z"
                            fill="currentColor"
                          />
                          <path
                            d="M22.9319 60.0391C22.6555 60.0391 22.4316 60.2631 22.4316 60.5394C22.4316 60.8158 22.6557 61.0397 22.9319 61.0397C23.2082 61.0397 23.4321 60.8158 23.4321 60.5394C23.4321 60.2629 23.2082 60.0391 22.9319 60.0391Z"
                            fill="currentColor"
                          />
                          <path
                            d="M25.1059 62.0941C25.1059 61.8178 24.8819 61.5938 24.6057 61.5938C24.3295 61.5938 24.1055 61.8178 24.1055 62.0941C24.1055 62.1923 24.1348 62.2832 24.1837 62.3605C24.4979 62.3143 24.8042 62.2446 25.1003 62.1515C25.1024 62.1325 25.1059 62.1137 25.1059 62.0941Z"
                            fill="currentColor"
                          />
                          <path
                            d="M21.3791 55.1406C21.1028 55.1406 20.8789 55.3647 20.8789 55.6408C20.8789 55.9172 21.103 56.1411 21.3791 56.1411C21.6554 56.1411 21.8793 55.9172 21.8793 55.6408C21.8793 55.3647 21.6554 55.1406 21.3791 55.1406Z"
                            fill="currentColor"
                          />
                          <path
                            d="M19.7072 56.8125C19.4309 56.8125 19.207 57.0365 19.207 57.3129C19.207 57.5892 19.4311 57.8131 19.7072 57.8131C19.9836 57.8131 20.2075 57.5892 20.2075 57.3129C20.2076 57.0365 19.9836 56.8125 19.7072 56.8125Z"
                            fill="currentColor"
                          />
                          <path
                            d="M21.3791 58.3672C21.1028 58.3672 20.8789 58.5912 20.8789 58.8676C20.8789 59.1439 21.103 59.3678 21.3791 59.3678C21.6554 59.3678 21.8793 59.1439 21.8793 58.8676C21.8793 58.5912 21.6554 58.3672 21.3791 58.3672Z"
                            fill="currentColor"
                          />
                          <path
                            d="M19.7072 60.0391C19.4309 60.0391 19.207 60.2631 19.207 60.5394C19.207 60.8158 19.4311 61.0397 19.7072 61.0397C19.9836 61.0397 20.2075 60.8158 20.2075 60.5394C20.2076 60.2629 19.9836 60.0391 19.7072 60.0391Z"
                            fill="currentColor"
                          />
                          <path
                            d="M21.879 62.0941C21.879 61.8178 21.6551 61.5938 21.3788 61.5938C21.1303 61.5938 20.9257 61.7753 20.8867 62.0127C21.206 62.124 21.5253 62.213 21.8427 62.279C21.8657 62.2216 21.879 62.1596 21.879 62.0941Z"
                            fill="currentColor"
                          />
                          <path
                            d="M17.6543 58.8676C17.6543 59.1439 17.8783 59.3678 18.1545 59.3678C18.4308 59.3678 18.6547 59.1439 18.6547 58.8676C18.6547 58.5912 18.4308 58.3672 18.1545 58.3672C17.8782 58.3672 17.6543 58.5912 17.6543 58.8676Z"
                            fill="currentColor"
                          />
                          <path
                            d="M61.633 21.3359C61.3567 21.3359 61.1328 21.56 61.1328 21.8363C61.1328 22.1126 61.3569 22.3365 61.633 22.3365C61.9094 22.3365 62.1332 22.1126 62.1332 21.8363C62.1332 21.56 61.9092 21.3359 61.633 21.3359Z"
                            fill="currentColor"
                          />
                          <path
                            d="M60.0783 22.8906C59.802 22.8906 59.5781 23.1147 59.5781 23.391C59.5781 23.6673 59.8022 23.8912 60.0783 23.8912C60.3547 23.8912 60.5786 23.6673 60.5786 23.391C60.5786 23.1147 60.3545 22.8906 60.0783 22.8906Z"
                            fill="currentColor"
                          />
                          <path
                            d="M62.8066 23.3912C62.8066 23.6676 63.0307 23.8914 63.3069 23.8914C63.3792 23.8914 63.4475 23.8754 63.5096 23.8478L63.1898 22.9062C62.9702 22.9592 62.8066 23.1555 62.8066 23.3912Z"
                            fill="currentColor"
                          />
                          <path
                            d="M61.633 24.5625C61.3567 24.5625 61.1328 24.7865 61.1328 25.0629C61.1328 25.3392 61.3569 25.5631 61.633 25.5631C61.9094 25.5631 62.1332 25.3392 62.1332 25.0629C62.1332 24.7865 61.9092 24.5625 61.633 24.5625Z"
                            fill="currentColor"
                          />
                          <path
                            d="M62.8066 26.6097C62.8066 26.8861 63.0307 27.11 63.3069 27.11C63.5832 27.11 63.8071 26.8861 63.8071 26.6097C63.8071 26.3334 63.583 26.1094 63.3069 26.1094C63.0307 26.1094 62.8066 26.3334 62.8066 26.6097Z"
                            fill="currentColor"
                          />
                          <path
                            d="M61.633 27.7891C61.3567 27.7891 61.1328 28.0131 61.1328 28.2894C61.1328 28.5658 61.3569 28.7897 61.633 28.7897C61.9094 28.7897 62.1332 28.5658 62.1332 28.2894C62.1332 28.0131 61.9092 27.7891 61.633 27.7891Z"
                            fill="currentColor"
                          />
                          <path
                            d="M58.4084 24.5625C58.1321 24.5625 57.9082 24.7865 57.9082 25.0629C57.9082 25.3392 58.1322 25.5631 58.4084 25.5631C58.6846 25.5631 58.9086 25.3392 58.9086 25.0629C58.9086 24.7865 58.6847 24.5625 58.4084 24.5625Z"
                            fill="currentColor"
                          />
                          <path
                            d="M60.0822 26.1094C59.8059 26.1094 59.582 26.3334 59.582 26.6097C59.582 26.8861 59.8061 27.11 60.0822 27.11C60.3586 27.11 60.5825 26.8861 60.5825 26.6097C60.5825 26.3334 60.3586 26.1094 60.0822 26.1094Z"
                            fill="currentColor"
                          />
                          <path
                            d="M58.4084 27.7891C58.1321 27.7891 57.9082 28.0131 57.9082 28.2894C57.9082 28.5658 58.1322 28.7897 58.4084 28.7897C58.6846 28.7897 58.9086 28.5658 58.9086 28.2894C58.9086 28.0131 58.6847 27.7891 58.4084 27.7891Z"
                            fill="currentColor"
                          />
                          <path
                            d="M60.0822 29.3359C59.8059 29.3359 59.582 29.56 59.582 29.8363C59.582 30.1126 59.8061 30.3365 60.0822 30.3365C60.3586 30.3365 60.5825 30.1126 60.5825 29.8363C60.5826 29.56 60.3586 29.3359 60.0822 29.3359Z"
                            fill="currentColor"
                          />
                          <path
                            d="M58.4084 31.0078C58.1321 31.0078 57.9082 31.2319 57.9082 31.5082C57.9082 31.7845 58.1322 32.0084 58.4084 32.0084C58.6846 32.0084 58.9086 31.7845 58.9086 31.5082C58.9086 31.2319 58.6847 31.0078 58.4084 31.0078Z"
                            fill="currentColor"
                          />
                          <path
                            d="M56.8557 26.1094C56.5794 26.1094 56.3555 26.3334 56.3555 26.6097C56.3555 26.8861 56.5795 27.11 56.8557 27.11C57.132 27.11 57.3559 26.8861 57.3559 26.6097C57.3559 26.3334 57.132 26.1094 56.8557 26.1094Z"
                            fill="currentColor"
                          />
                          <path
                            d="M55.1838 27.7891C54.9075 27.7891 54.6836 28.0131 54.6836 28.2894C54.6836 28.5658 54.9075 28.7897 55.1838 28.7897C55.4601 28.7897 55.684 28.5658 55.684 28.2894C55.684 28.0131 55.4601 27.7891 55.1838 27.7891Z"
                            fill="currentColor"
                          />
                          <path
                            d="M56.8557 29.3359C56.5794 29.3359 56.3555 29.56 56.3555 29.8363C56.3555 30.1126 56.5795 30.3365 56.8557 30.3365C57.132 30.3365 57.3559 30.1126 57.3559 29.8363C57.3561 29.56 57.132 29.3359 56.8557 29.3359Z"
                            fill="currentColor"
                          />
                          <path
                            d="M55.1838 31.0078C54.9075 31.0078 54.6836 31.2319 54.6836 31.5082C54.6836 31.7845 54.9075 32.0084 55.1838 32.0084C55.4601 32.0084 55.684 31.7845 55.684 31.5082C55.684 31.2319 55.4601 31.0078 55.1838 31.0078Z"
                            fill="currentColor"
                          />
                          <path
                            d="M56.8557 32.5625C56.5794 32.5625 56.3555 32.7865 56.3555 33.0629C56.3555 33.0767 56.3584 33.0897 56.3595 33.103L57.3113 32.8582C57.233 32.6842 57.059 32.5625 56.8557 32.5625Z"
                            fill="currentColor"
                          />
                          <path
                            d="M53.6311 26.1094C53.3549 26.1094 53.1309 26.3334 53.1309 26.6097C53.1309 26.8861 53.3549 27.11 53.6311 27.11C53.9074 27.11 54.1313 26.8861 54.1313 26.6097C54.1313 26.3334 53.9074 26.1094 53.6311 26.1094Z"
                            fill="currentColor"
                          />
                          <path
                            d="M53.6311 29.3359C53.3549 29.3359 53.1309 29.56 53.1309 29.8363C53.1309 30.1126 53.3549 30.3365 53.6311 30.3365C53.9074 30.3365 54.1313 30.1126 54.1313 29.8363C54.1314 29.56 53.9074 29.3359 53.6311 29.3359Z"
                            fill="currentColor"
                          />
                          <path
                            d="M53.6311 32.5625C53.3549 32.5625 53.1309 32.7865 53.1309 33.0629C53.1309 33.3392 53.3549 33.5631 53.6311 33.5631C53.9074 33.5631 54.1313 33.3392 54.1313 33.0629C54.1314 32.7865 53.9074 32.5625 53.6311 32.5625Z"
                            fill="currentColor"
                          />
                          <path
                            d="M51.457 28.2902C51.457 28.5665 51.6811 28.7904 51.9572 28.7904C52.0304 28.7904 52.0993 28.7739 52.162 28.7456C52.0134 28.4538 51.8487 28.1659 51.6684 27.8828C51.5409 27.9734 51.457 28.1216 51.457 28.2902Z"
                            fill="currentColor"
                          />
                          <path
                            d="M51.457 31.516C51.457 31.7923 51.6811 32.0162 51.9572 32.0162C52.2336 32.0162 52.4575 31.7923 52.4575 31.516C52.4575 31.2397 52.2334 31.0156 51.9572 31.0156C51.6809 31.0158 51.457 31.2398 51.457 31.516Z"
                            fill="currentColor"
                          />
                          <path
                            d="M53.1309 33.0671C53.1309 33.1566 53.1564 33.2393 53.1974 33.3121C53.2053 33.1439 53.2096 32.975 53.2069 32.8047C53.1596 32.881 53.1309 32.9704 53.1309 33.0671Z"
                            fill="currentColor"
                          />
                          <path
                            d="M51.9572 35.2428C52.2336 35.2428 52.4575 35.0189 52.4575 34.7426C52.4575 34.4662 52.2334 34.2422 51.9572 34.2422C51.6809 34.2422 51.457 34.4662 51.457 34.7426C51.457 35.0189 51.6809 35.2428 51.9572 35.2428Z"
                            fill="currentColor"
                          />
                          <path
                            d="M48.7326 24.5625C48.4563 24.5625 48.2324 24.7865 48.2324 25.0629C48.2324 25.3392 48.4565 25.5631 48.7326 25.5631C49.009 25.5631 49.2329 25.3392 49.2329 25.0629C49.2329 24.7865 49.009 24.5625 48.7326 24.5625Z"
                            fill="currentColor"
                          />
                          <path
                            d="M50.3059 26.125C50.0779 26.1717 49.9062 26.3733 49.9062 26.6151C49.9062 26.8914 50.1303 27.1153 50.4065 27.1153C50.6204 27.1153 50.8015 26.9804 50.8732 26.7917C50.8393 26.7509 50.8071 26.7096 50.7724 26.6692L50.3059 26.125Z"
                            fill="currentColor"
                          />
                          <path
                            d="M48.7326 27.7891C48.4563 27.7891 48.2324 28.0131 48.2324 28.2894C48.2324 28.5658 48.4565 28.7897 48.7326 28.7897C49.009 28.7897 49.2329 28.5658 49.2329 28.2894C49.2329 28.0131 49.009 27.7891 48.7326 27.7891Z"
                            fill="currentColor"
                          />
                          <path
                            d="M47.176 26.1172C46.8997 26.1172 46.6758 26.3412 46.6758 26.6176C46.6758 26.8939 46.8998 27.1178 47.176 27.1178C47.4523 27.1178 47.6762 26.8939 47.6762 26.6176C47.6764 26.3412 47.4523 26.1172 47.176 26.1172Z"
                            fill="currentColor"
                          />
                          <path
                            d="M50.4065 29.3438C50.1301 29.3438 49.9062 29.5678 49.9062 29.8441C49.9062 30.1205 50.1303 30.3443 50.4065 30.3443C50.6828 30.3443 50.9067 30.1205 50.9067 29.8441C50.9067 29.5678 50.6826 29.3438 50.4065 29.3438Z"
                            fill="currentColor"
                          />
                          <path
                            d="M48.7326 31.0156C48.4563 31.0156 48.2324 31.2397 48.2324 31.516C48.2324 31.7923 48.4565 32.0162 48.7326 32.0162C49.009 32.0162 49.2329 31.7923 49.2329 31.516C49.2329 31.2397 49.009 31.0156 48.7326 31.0156Z"
                            fill="currentColor"
                          />
                          <path
                            d="M50.4065 32.5625C50.1301 32.5625 49.9062 32.7865 49.9062 33.0629C49.9062 33.3392 50.1303 33.5631 50.4065 33.5631C50.6828 33.5631 50.9067 33.3392 50.9067 33.0629C50.9067 32.7865 50.6826 32.5625 50.4065 32.5625Z"
                            fill="currentColor"
                          />
                          <path
                            d="M48.7326 34.2422C48.4563 34.2422 48.2324 34.4662 48.2324 34.7426C48.2324 35.0189 48.4565 35.2428 48.7326 35.2428C49.009 35.2428 49.2329 35.0189 49.2329 34.7426C49.2329 34.4662 49.009 34.2422 48.7326 34.2422Z"
                            fill="currentColor"
                          />
                          <path
                            d="M50.4065 35.7891C50.1301 35.7891 49.9062 36.0131 49.9062 36.2894C49.9062 36.5658 50.1303 36.7897 50.4065 36.7897C50.6828 36.7897 50.9067 36.5658 50.9067 36.2894C50.9067 36.0131 50.6826 35.7891 50.4065 35.7891Z"
                            fill="currentColor"
                          />
                          <path
                            d="M48.7326 37.4609C48.4563 37.4609 48.2324 37.685 48.2324 37.9613C48.2324 38.2376 48.4565 38.4615 48.7326 38.4615C49.009 38.4615 49.2329 38.2376 49.2329 37.9613C49.2329 37.6848 49.009 37.4609 48.7326 37.4609Z"
                            fill="currentColor"
                          />
                          <path
                            d="M47.1799 22.8906C46.9036 22.8906 46.6797 23.1147 46.6797 23.391C46.6797 23.6673 46.9037 23.8912 47.1799 23.8912C47.4562 23.8912 47.6801 23.6673 47.6801 23.391C47.6801 23.1145 47.4561 22.8906 47.1799 22.8906Z"
                            fill="currentColor"
                          />
                          <path
                            d="M47.1799 29.3438C46.9036 29.3438 46.6797 29.5678 46.6797 29.8441C46.6797 30.1205 46.9037 30.3443 47.1799 30.3443C47.4562 30.3443 47.6801 30.1205 47.6801 29.8441C47.6801 29.5678 47.4561 29.3438 47.1799 29.3438Z"
                            fill="currentColor"
                          />
                          <path
                            d="M45.508 31.0156C45.2317 31.0156 45.0078 31.2397 45.0078 31.516C45.0078 31.7923 45.2319 32.0162 45.508 32.0162C45.7844 32.0162 46.0082 31.7923 46.0082 31.516C46.0084 31.2397 45.7844 31.0156 45.508 31.0156Z"
                            fill="currentColor"
                          />
                          <path
                            d="M47.1799 32.5625C46.9036 32.5625 46.6797 32.7865 46.6797 33.0629C46.6797 33.3392 46.9037 33.5631 47.1799 33.5631C47.4562 33.5631 47.6801 33.3392 47.6801 33.0629C47.6801 32.7865 47.4561 32.5625 47.1799 32.5625Z"
                            fill="currentColor"
                          />
                          <path
                            d="M45.508 34.2422C45.2317 34.2422 45.0078 34.4662 45.0078 34.7426C45.0078 35.0189 45.2319 35.2428 45.508 35.2428C45.7844 35.2428 46.0082 35.0189 46.0082 34.7426C46.0082 34.4662 45.7844 34.2422 45.508 34.2422Z"
                            fill="currentColor"
                          />
                          <path
                            d="M47.1799 35.7891C46.9036 35.7891 46.6797 36.0131 46.6797 36.2894C46.6797 36.5658 46.9037 36.7897 47.1799 36.7897C47.4562 36.7897 47.6801 36.5658 47.6801 36.2894C47.6801 36.0131 47.4561 35.7891 47.1799 35.7891Z"
                            fill="currentColor"
                          />
                          <path
                            d="M45.508 37.4609C45.2317 37.4609 45.0078 37.685 45.0078 37.9613C45.0078 38.2376 45.2319 38.4615 45.508 38.4615C45.7844 38.4615 46.0082 38.2376 46.0082 37.9613C46.0084 37.6848 45.7844 37.4609 45.508 37.4609Z"
                            fill="currentColor"
                          />
                          <path
                            d="M47.1799 39.0156C46.9036 39.0156 46.6797 39.2397 46.6797 39.516C46.6797 39.7923 46.9037 40.0162 47.1799 40.0162C47.4562 40.0162 47.6801 39.7923 47.6801 39.516C47.6801 39.2397 47.4561 39.0156 47.1799 39.0156Z"
                            fill="currentColor"
                          />
                          <path
                            d="M45.508 40.6875C45.2317 40.6875 45.0078 40.9115 45.0078 41.1879C45.0078 41.4642 45.2319 41.6881 45.508 41.6881C45.7844 41.6881 46.0082 41.4642 46.0082 41.1879C46.0084 40.9115 45.7844 40.6875 45.508 40.6875Z"
                            fill="currentColor"
                          />
                          <path
                            d="M43.9553 32.5625C43.679 32.5625 43.4551 32.7865 43.4551 33.0629C43.4551 33.3392 43.6791 33.5631 43.9553 33.5631C44.2316 33.5631 44.4555 33.3392 44.4555 33.0629C44.4555 32.7865 44.2316 32.5625 43.9553 32.5625Z"
                            fill="currentColor"
                          />
                          <path
                            d="M42.2815 34.2422C42.0051 34.2422 41.7812 34.4662 41.7812 34.7426C41.7812 35.0189 42.0053 35.2428 42.2815 35.2428C42.5578 35.2428 42.7817 35.0189 42.7817 34.7426C42.7817 34.4662 42.5578 34.2422 42.2815 34.2422Z"
                            fill="currentColor"
                          />
                          <path
                            d="M43.9553 35.7891C43.679 35.7891 43.4551 36.0131 43.4551 36.2894C43.4551 36.5658 43.6791 36.7897 43.9553 36.7897C44.2316 36.7897 44.4555 36.5658 44.4555 36.2894C44.4555 36.0131 44.2316 35.7891 43.9553 35.7891Z"
                            fill="currentColor"
                          />
                          <path
                            d="M42.2815 37.4609C42.0051 37.4609 41.7812 37.685 41.7812 37.9613C41.7812 38.2376 42.0053 38.4615 42.2815 38.4615C42.5578 38.4615 42.7817 38.2376 42.7817 37.9613C42.7818 37.6848 42.5578 37.4609 42.2815 37.4609Z"
                            fill="currentColor"
                          />
                          <path
                            d="M43.9553 39.0156C43.679 39.0156 43.4551 39.2397 43.4551 39.516C43.4551 39.7923 43.6791 40.0162 43.9553 40.0162C44.2316 40.0162 44.4555 39.7923 44.4555 39.516C44.4555 39.2397 44.2316 39.0156 43.9553 39.0156Z"
                            fill="currentColor"
                          />
                          <path
                            d="M42.2815 40.6875C42.0051 40.6875 41.7812 40.9115 41.7812 41.1879C41.7812 41.4642 42.0053 41.6881 42.2815 41.6881C42.5578 41.6881 42.7817 41.4642 42.7817 41.1879C42.7818 40.9115 42.5578 40.6875 42.2815 40.6875Z"
                            fill="currentColor"
                          />
                          <path
                            d="M43.9553 42.2422C43.679 42.2422 43.4551 42.4662 43.4551 42.7426C43.4551 43.0189 43.6791 43.2428 43.9553 43.2428C44.2316 43.2428 44.4555 43.0189 44.4555 42.7426C44.4555 42.4662 44.2316 42.2422 43.9553 42.2422Z"
                            fill="currentColor"
                          />
                          <path
                            d="M42.2815 43.9141C42.0051 43.9141 41.7812 44.1381 41.7812 44.4144C41.7812 44.6908 42.0053 44.9146 42.2815 44.9146C42.5578 44.9146 42.7817 44.6908 42.7817 44.4144C42.7817 44.1381 42.5578 43.9141 42.2815 43.9141Z"
                            fill="currentColor"
                          />
                          <path
                            d="M40.7307 35.7891C40.4544 35.7891 40.2305 36.0131 40.2305 36.2894C40.2305 36.5658 40.4545 36.7897 40.7307 36.7897C41.007 36.7897 41.2309 36.5658 41.2309 36.2894C41.2309 36.0131 41.007 35.7891 40.7307 35.7891Z"
                            fill="currentColor"
                          />
                          <path
                            d="M39.0569 37.4609C38.7805 37.4609 38.5566 37.685 38.5566 37.9613C38.5566 38.2376 38.7805 38.4615 39.0569 38.4615C39.3332 38.4615 39.5571 38.2376 39.5571 37.9613C39.5572 37.6848 39.3332 37.4609 39.0569 37.4609Z"
                            fill="currentColor"
                          />
                          <path
                            d="M40.7307 39.0156C40.4544 39.0156 40.2305 39.2397 40.2305 39.516C40.2305 39.7923 40.4545 40.0162 40.7307 40.0162C41.007 40.0162 41.2309 39.7923 41.2309 39.516C41.2309 39.2397 41.007 39.0156 40.7307 39.0156Z"
                            fill="currentColor"
                          />
                          <path
                            d="M39.0569 40.6875C38.7805 40.6875 38.5566 40.9115 38.5566 41.1879C38.5566 41.4642 38.7805 41.6881 39.0569 41.6881C39.3332 41.6881 39.5571 41.4642 39.5571 41.1879C39.5572 40.9115 39.3332 40.6875 39.0569 40.6875Z"
                            fill="currentColor"
                          />
                          <path
                            d="M40.7307 42.2422C40.4544 42.2422 40.2305 42.4662 40.2305 42.7426C40.2305 43.0189 40.4545 43.2428 40.7307 43.2428C41.007 43.2428 41.2309 43.0189 41.2309 42.7426C41.2309 42.4662 41.007 42.2422 40.7307 42.2422Z"
                            fill="currentColor"
                          />
                          <path
                            d="M39.0569 43.9141C38.7805 43.9141 38.5566 44.1381 38.5566 44.4144C38.5566 44.6908 38.7805 44.9146 39.0569 44.9146C39.3332 44.9146 39.5571 44.6908 39.5571 44.4144C39.5571 44.1381 39.3332 43.9141 39.0569 43.9141Z"
                            fill="currentColor"
                          />
                          <path
                            d="M40.7307 45.4688C40.4544 45.4688 40.2305 45.6928 40.2305 45.9691C40.2305 46.2455 40.4545 46.4693 40.7307 46.4693C41.007 46.4693 41.2309 46.2455 41.2309 45.9691C41.2309 45.6928 41.007 45.4688 40.7307 45.4688Z"
                            fill="currentColor"
                          />
                          <path
                            d="M39.0569 47.1406C38.7805 47.1406 38.5566 47.3647 38.5566 47.641C38.5566 47.9173 38.7805 48.1412 39.0569 48.1412C39.3332 48.1412 39.5571 47.9173 39.5571 47.641C39.5571 47.3647 39.3332 47.1406 39.0569 47.1406Z"
                            fill="currentColor"
                          />
                          <path
                            d="M37.5061 39.0156C37.2299 39.0156 37.0059 39.2397 37.0059 39.516C37.0059 39.7923 37.2299 40.0162 37.5061 40.0162C37.7824 40.0162 38.0063 39.7923 38.0063 39.516C38.0063 39.2397 37.7824 39.0156 37.5061 39.0156Z"
                            fill="currentColor"
                          />
                          <path
                            d="M35.8322 40.6875C35.5559 40.6875 35.332 40.9115 35.332 41.1879C35.332 41.4642 35.5561 41.6881 35.8322 41.6881C36.1086 41.6881 36.3325 41.4642 36.3325 41.1879C36.3325 40.9115 36.1084 40.6875 35.8322 40.6875Z"
                            fill="currentColor"
                          />
                          <path
                            d="M37.5061 42.2422C37.2299 42.2422 37.0059 42.4662 37.0059 42.7426C37.0059 43.0189 37.2299 43.2428 37.5061 43.2428C37.7824 43.2428 38.0063 43.0189 38.0063 42.7426C38.0063 42.4662 37.7824 42.2422 37.5061 42.2422Z"
                            fill="currentColor"
                          />
                          <path
                            d="M35.8322 43.9141C35.5559 43.9141 35.332 44.1381 35.332 44.4144C35.332 44.6908 35.5561 44.9146 35.8322 44.9146C36.1086 44.9146 36.3325 44.6908 36.3325 44.4144C36.3325 44.1381 36.1084 43.9141 35.8322 43.9141Z"
                            fill="currentColor"
                          />
                          <path
                            d="M37.5061 45.4688C37.2299 45.4688 37.0059 45.6928 37.0059 45.9691C37.0059 46.2455 37.2299 46.4693 37.5061 46.4693C37.7824 46.4693 38.0063 46.2455 38.0063 45.9691C38.0063 45.6928 37.7824 45.4688 37.5061 45.4688Z"
                            fill="currentColor"
                          />
                          <path
                            d="M35.8322 47.1406C35.5559 47.1406 35.332 47.3647 35.332 47.641C35.332 47.9173 35.5561 48.1412 35.8322 48.1412C36.1086 48.1412 36.3325 47.9173 36.3325 47.641C36.3325 47.3647 36.1084 47.1406 35.8322 47.1406Z"
                            fill="currentColor"
                          />
                          <path
                            d="M37.5061 48.6953C37.2299 48.6953 37.0059 48.9194 37.0059 49.1957C37.0059 49.4557 37.205 49.6669 37.4588 49.6911L38.0036 49.2241C38.004 49.2145 38.0065 49.2055 38.0065 49.1957C38.0063 48.9192 37.7824 48.6953 37.5061 48.6953Z"
                            fill="currentColor"
                          />
                          <path
                            d="M35.8322 50.3672C35.5559 50.3672 35.332 50.5912 35.332 50.8676C35.332 51.0459 35.426 51.2013 35.5665 51.29C35.681 51.205 35.7938 51.1169 35.9033 51.023L36.2972 50.6852C36.224 50.4992 36.0439 50.3672 35.8322 50.3672Z"
                            fill="currentColor"
                          />
                          <path
                            d="M34.2795 42.2422C34.0032 42.2422 33.7793 42.4662 33.7793 42.7426C33.7793 43.0189 34.0033 43.2428 34.2795 43.2428C34.5558 43.2428 34.7797 43.0189 34.7797 42.7426C34.7799 42.4662 34.5558 42.2422 34.2795 42.2422Z"
                            fill="currentColor"
                          />
                          <path
                            d="M32.6076 43.9141C32.3313 43.9141 32.1074 44.1381 32.1074 44.4144C32.1074 44.6908 32.3313 44.9146 32.6076 44.9146C32.884 44.9146 33.1079 44.6908 33.1079 44.4144C33.1079 44.1381 32.884 43.9141 32.6076 43.9141Z"
                            fill="currentColor"
                          />
                          <path
                            d="M34.2795 45.4688C34.0032 45.4688 33.7793 45.6928 33.7793 45.9691C33.7793 46.2455 34.0033 46.4693 34.2795 46.4693C34.5558 46.4693 34.7797 46.2455 34.7797 45.9691C34.7797 45.6928 34.5558 45.4688 34.2795 45.4688Z"
                            fill="currentColor"
                          />
                          <path
                            d="M32.6076 47.1406C32.3313 47.1406 32.1074 47.3647 32.1074 47.641C32.1074 47.9173 32.3313 48.1412 32.6076 48.1412C32.884 48.1412 33.1079 47.9173 33.1079 47.641C33.1079 47.3647 32.884 47.1406 32.6076 47.1406Z"
                            fill="currentColor"
                          />
                          <path
                            d="M34.2795 48.6953C34.0032 48.6953 33.7793 48.9194 33.7793 49.1957C33.7793 49.472 34.0033 49.6959 34.2795 49.6959C34.5558 49.6959 34.7797 49.472 34.7797 49.1957C34.7799 48.9192 34.5558 48.6953 34.2795 48.6953Z"
                            fill="currentColor"
                          />
                          <path
                            d="M32.6076 51.3678C32.884 51.3678 33.1079 51.1439 33.1079 50.8676C33.1079 50.5912 32.884 50.3672 32.6076 50.3672C32.3313 50.3672 32.1074 50.5912 32.1074 50.8676C32.1073 51.1437 32.3313 51.3678 32.6076 51.3678Z"
                            fill="currentColor"
                          />
                          <path
                            d="M31.0549 45.4688C30.7786 45.4688 30.5547 45.6928 30.5547 45.9691C30.5547 46.2455 30.7787 46.4693 31.0549 46.4693C31.3312 46.4693 31.5551 46.2455 31.5551 45.9691C31.5551 45.6928 31.3312 45.4688 31.0549 45.4688Z"
                            fill="currentColor"
                          />
                          <path
                            d="M29.3811 47.1406C29.1047 47.1406 28.8809 47.3647 28.8809 47.641C28.8809 47.9173 29.1047 48.1412 29.3811 48.1412C29.6574 48.1412 29.8813 47.9173 29.8813 47.641C29.8813 47.3647 29.6574 47.1406 29.3811 47.1406Z"
                            fill="currentColor"
                          />
                          <path
                            d="M31.0549 49.6959C31.3312 49.6959 31.5551 49.472 31.5551 49.1957C31.5551 48.9194 31.3312 48.6953 31.0549 48.6953C30.7786 48.6953 30.5547 48.9194 30.5547 49.1957C30.5547 49.472 30.7787 49.6959 31.0549 49.6959Z"
                            fill="currentColor"
                          />
                          <path
                            d="M29.3811 50.3672C29.1047 50.3672 28.8809 50.5912 28.8809 50.8676C28.8809 51.1439 29.1047 51.3678 29.3811 51.3678C29.6574 51.3678 29.8813 51.1439 29.8813 50.8676C29.8813 50.5912 29.6574 50.3672 29.3811 50.3672Z"
                            fill="currentColor"
                          />
                          <path
                            d="M31.5551 52.4144C31.5551 52.1381 31.3312 51.9141 31.0549 51.9141C30.7786 51.9141 30.5547 52.1381 30.5547 52.4144C30.5547 52.4253 30.5573 52.4356 30.5579 52.4465C30.8876 52.4933 31.2161 52.52 31.542 52.5251C31.55 52.4893 31.5551 52.4526 31.5551 52.4144Z"
                            fill="currentColor"
                          />
                          <path
                            d="M26.1565 48.1412C26.4328 48.1412 26.6567 47.9173 26.6567 47.641C26.6567 47.3647 26.4326 47.1406 26.1565 47.1406C25.8801 47.1406 25.6562 47.3647 25.6562 47.641C25.6562 47.9173 25.8801 48.1412 26.1565 48.1412Z"
                            fill="currentColor"
                          />
                          <path
                            d="M27.8342 46.4772C28.1105 46.4772 28.3344 46.2533 28.3344 45.9769C28.3344 45.7006 28.1104 45.4766 27.8342 45.4766C27.5579 45.4766 27.334 45.7006 27.334 45.9769C27.3338 46.2531 27.5579 46.4772 27.8342 46.4772Z"
                            fill="currentColor"
                          />
                          <path
                            d="M27.8303 48.6953C27.554 48.6953 27.3301 48.9194 27.3301 49.1957C27.3301 49.472 27.5541 49.6959 27.8303 49.6959C28.1066 49.6959 28.3305 49.472 28.3305 49.1957C28.3307 48.9192 28.1066 48.6953 27.8303 48.6953Z"
                            fill="currentColor"
                          />
                          <path
                            d="M71.4663 11.7759C67.7499 8.79021 63.5868 6.69714 59.0924 5.55478C58.2288 5.33522 57.356 5.15608 56.4767 5.01046C53.8353 2.41589 50.0985 1.19879 46.8363 2.27347L34.1693 6.44727C32.4045 5.03628 29.7248 4.90413 26.3452 6.07808C23.103 7.20441 19.3996 9.46908 15.9172 12.4548C12.4348 15.4405 9.63121 18.7549 8.02312 21.787C6.38712 24.8716 6.08305 27.4872 7.11523 29.4327L0.865999 41.6868C-0.857406 45.0666 0.0918621 49.4461 2.82371 52.5448C2.84617 52.938 2.87311 53.3309 2.9108 53.723C3.35344 58.3392 4.7864 62.7731 7.1696 66.9017C11.6654 74.6895 18.4328 79.3725 22.7943 79.9733C23.5235 80.0737 24.1843 80.1242 24.778 80.1242C26.6167 80.1242 27.8141 79.6408 28.4145 78.6635C29.5732 76.7773 27.7738 74.0095 27.4955 73.6022C25.3494 69.9172 23.9984 66.3614 23.4683 63.0624C24.1791 63.043 24.8721 62.9197 25.5221 62.6879C27.1292 62.1149 28.3882 60.9262 29.0677 59.3412L31.7144 53.1657C33.4093 53.1553 35.0288 52.6169 36.322 51.5081L51.3968 38.5835C52.6227 37.5326 53.4191 36.0998 53.7185 34.449L59.9776 32.8399C61.6477 32.4106 63.0148 31.3476 63.8264 29.847C64.271 29.0252 64.5306 28.096 64.6065 27.1209C67.9619 28.101 71.4692 30.0399 74.9845 32.8865C75.2865 33.1695 77.0673 34.7643 78.8382 34.7643C79.178 34.7641 79.5177 34.7054 79.8461 34.5675C81.2454 33.9799 81.9496 32.2284 81.9988 29.2132C82.0712 24.8112 78.4763 17.4082 71.4663 11.7759ZM26.4194 74.3146C26.8523 74.9421 27.9456 76.9645 27.3143 77.9893C26.8366 78.7645 25.2939 79.0157 22.9702 78.6954C18.9197 78.1375 12.5754 73.6856 8.28678 66.2566C6.04407 62.3717 4.699 58.1987 4.25155 53.9086C4.82393 54.3697 5.44523 54.7817 6.11336 55.1302L19.482 62.1026C20.346 62.5531 21.2513 62.8443 22.1515 62.9785C22.6098 66.1012 23.8293 69.8758 26.3931 74.2726C26.4013 74.2867 26.4104 74.3011 26.4194 74.3146ZM27.8819 58.8328C27.3377 60.1022 26.372 61.015 25.0889 61.4728C23.5694 62.0147 21.7436 61.8272 20.0786 60.9589L6.70996 53.9865C2.22102 51.6454 0.0272305 46.1717 2.01542 42.273L7.96362 30.6086L24.1519 49.4901C25.8717 51.4961 28.1221 52.7143 30.3559 53.0608L27.8819 58.8328ZM50.2812 27.0874C51.7153 28.76 52.525 30.7871 52.5611 32.7957C52.5965 34.758 51.8848 36.4656 50.557 37.6039L35.4823 50.5285C32.7047 52.9101 28.0609 52.0676 25.1311 48.6503L8.71322 29.5011C5.73824 26.031 10.5078 18.7918 16.7566 13.4341C20.1195 10.5508 23.6751 8.37115 26.7684 7.29662C27.8971 6.9045 29.2174 6.57557 30.4702 6.57557C31.7712 6.57557 32.9993 6.93049 33.8633 7.93829L50.2812 27.0874ZM62.6918 29.2331C62.0435 30.4312 60.994 31.2464 59.6563 31.5903L53.8491 33.0832C53.8507 32.98 53.8529 32.8768 53.851 32.7724C53.8095 30.4646 52.8894 28.1475 51.2606 26.2477L35.1672 7.47657L47.24 3.49875C51.396 2.1293 56.4711 5.13283 58.0997 9.9268L62.949 24.2034C63.5528 25.9813 63.4592 27.8145 62.6918 29.2331ZM79.3477 33.3777C78.2388 33.8445 76.407 32.4557 75.8532 31.9325C75.841 31.921 75.8285 31.9099 75.8154 31.8993C71.5495 28.441 67.7609 26.6411 64.5977 25.7795C64.5367 25.1183 64.3946 24.4487 64.1703 23.7881L59.3211 9.51158C58.9637 8.45919 58.4554 7.48491 57.8357 6.60765C62.4698 7.62379 66.8178 9.69602 70.6581 12.7815C77.345 18.1541 80.776 25.1037 80.7091 29.192C80.6704 31.5375 80.1871 33.0241 79.3477 33.3777Z"
                            fill="currentColor"
                          />
                        </svg>
                      </div>
                      <h2 class="cta-title">
                        Get <span class="highlight">20%</span> Off
                        <span class="cta-subtitle">On Your First Order</span>
                      </h2>
                      <a class='common-button-five v2' href="{{ route('menu') }}">
                        <span class="btn-text">Order Now</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- blog standard section end -->
    
@endsection
