<!-- Hero Section Start -->
@if($sliders && $sliders->count() > 0)
    <section class="hero hero-slider-layout">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                @foreach ($sliders as $key => $slider)
                    <!-- Slide {{ $key + 1 }} -->
                    <div class="swiper-slide">
                        <div class="hero-slide">
                            <!-- Image -->
                            <div class="hero-image">
                                <img src="{{ WebsiteHelper::getImage('sliders', $slider->image) }}" alt="{{ $slider->title ?? __('home.slider_alt') }}" loading="lazy" />
                            </div>

                            <!-- Overlay -->
                            <div class="hero-overlay"></div>

                            <div class="container">
                                <div class="row align-items-center min-vh-100">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="hero-content">
                                            @if($slider->title)
                                                <h1 class="hero-title text-anime-style-3">
                                                    {{ $slider->title }}
                                                </h1>
                                            @endif

                                            @if($slider->text)
                                                <p class="hero-desc wow fadeInUp" data-wow-delay="0.2s">
                                                    {{ $slider->text }}
                                                </p>
                                            @endif

                                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                                                <a href="{{ LaravelLocalization::localizeUrl($slider->btn1_link ?? 'about') }}" class="btn-default">
                                                    {{ $slider->btn1_text ?? __('home.discover_coffee') }}
                                                </a>
                                                <a href="{{ LaravelLocalization::localizeUrl($slider->btn2_link ?? 'book-table') }}" class="btn-default btn-highlighted">
                                                    {{ $slider->btn2_text ?? __('home.book_a_table') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@else
    <!-- Fallback Static Hero Section (when no sliders exist) -->
    <section class="hero hero-slider-layout">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="hero-slide">
                        <div class="hero-image">
                            <img src="{{ WebsiteHelper::getAsset('images/hero/h1.webp') }}" alt="@lang('home.fresh_coffee_alt')" loading="lazy" />
                        </div>
                        <div class="hero-overlay"></div>
                        <div class="container">
                            <div class="row align-items-center min-vh-100">
                                <div class="col-lg-7 col-md-10">
                                    <div class="hero-content">
                                        <h1 class="hero-title text-anime-style-3">
                                            @lang('home.hero_title_1')
                                        </h1>
                                        <p class="hero-desc wow fadeInUp" data-wow-delay="0.2s">
                                            @lang('home.hero_desc_1')
                                        </p>
                                        <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                                            <a href="{{ LaravelLocalization::localizeUrl('about') }}" class="btn-default">@lang('home.discover_coffee')</a>
                                            <a href="{{ LaravelLocalization::localizeUrl('book-table') }}" class="btn-default btn-highlighted">@lang('home.book_a_table')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="hero-slide">
                        <div class="hero-image">
                            <img src="{{ WebsiteHelper::getAsset('images/hero/h2.webp') }}" alt="@lang('home.premium_coffee_alt')" loading="lazy" />
                        </div>
                        <div class="hero-overlay"></div>
                        <div class="container">
                            <div class="row align-items-center min-vh-100">
                                <div class="col-lg-7 col-md-10">
                                    <div class="hero-content">
                                        <h1 class="hero-title">
                                            @lang('home.hero_title_2')
                                        </h1>
                                        <p class="hero-desc wow fadeInUp" data-wow-delay="0.2s">
                                            @lang('home.hero_desc_2')
                                        </p>
                                        <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                                            <a href="{{ LaravelLocalization::localizeUrl('menu') }}" class="btn-default">@lang('home.view_menu')</a>
                                            <a href="{{ LaravelLocalization::localizeUrl('book-table') }}" class="btn-default btn-highlighted">@lang('home.reserve_now')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Hero Section End -->
