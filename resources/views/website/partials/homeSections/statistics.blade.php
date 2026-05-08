<!-- Intro Video Section Start -->
<div class="intro-video parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <!-- Intro Video Content Start -->
                <div class="intro-video-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">@lang('home.journey_subtitle')</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">
                            @lang('home.journey_title')
                        </h2>
                    </div>
                    <!-- Section Title End -->
                </div>
                <!-- Intro Video Content End -->
            </div>

            <div class="col-lg-6 col-md-4">
                <!-- Intro Video Box Start -->
                <div class="intro-video-box about-intro-video wow fadeInUp" data-wow-delay="0.2s">
                    <!-- Video Play Button Start -->
                    @if(isset($settings->about_video_link) && $settings->about_video_link)
                        <div class="video-play-button">
                            <a href="{{ $settings->about_video_link }}" class="popup-video" data-cursor-text="Play">
                                <i class="fa-solid fa-play"></i>
                            </a>
                            <p>@lang('home.watch_video')</p>
                        </div>
                    @endif
                    <!-- Video Play Button End -->
                </div>
                <!-- Intro Video Box End -->
            </div>
        </div>

        @if(count($websiteStatistics) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <!-- Intro Video Counters Start -->
                    <div class="intro-video-counters">

                        @foreach($websiteStatistics as $websiteStatistic)
                            <!-- Video Counter Item Start -->
                            <div class="video-counter-item">
                                <div class="icon-box">
                                    <img src="{{ WebsiteHelper::getImage('websiteStatistic', $websiteStatistic->image) }}" alt="{{ $websiteStatistic->alt_image }}" />
                                </div>
                                <div class="video-counter-content">
                                    <h2>
                                        <span class="counter" data-count="{{ $websiteStatistic->count }}">00</span>+
                                    </h2>
                                    <p>{{ $websiteStatistic->title }}</p>
                                </div>
                            </div>
                            <!-- Video Counter Item End -->
                        @endforeach

                    </div>
                    <!-- Intro Video Counters End -->
                </div>
            </div>

        @else
            <!-- Fallback static counters if no dynamic ones exist -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Intro Video Counters Start -->
                    <div class="intro-video-counters">

                        <!-- Video Counter Item Start -->
                        <div class="video-counter-item">
                            <div class="icon-box">
                                <img src="{{ WebsiteHelper::getAsset('images/icon-intro-video-counter-1.svg') }}" alt="@lang('home.daily_visitors')" />
                            </div>
                            <div class="video-counter-content">
                                <h2><span class="counter" data-count="300">00</span>+</h2>
                                <p>@lang('home.daily_visitors')</p>
                            </div>
                        </div>
                        <!-- Video Counter Item End -->

                        <!-- Video Counter Item Start -->
                        <div class="video-counter-item">
                            <div class="icon-box">
                                <img src="{{ WebsiteHelper::getAsset('images/icon-intro-video-counter-2.svg') }}" alt="@lang('home.recipe_created')" />
                            </div>
                            <div class="video-counter-content">
                                <h2><span class="counter" data-count="50">00</span></h2>
                                <p>@lang('home.recipe_created')</p>
                            </div>
                        </div>
                        <!-- Video Counter Item End -->

                        <!-- Video Counter Item Start -->
                        <div class="video-counter-item">
                            <div class="icon-box">
                                <img src="{{ WebsiteHelper::getAsset('images/icon-intro-video-counter-3.svg') }}" alt="@lang('home.events_hosted')" />
                            </div>
                            <div class="video-counter-content">
                                <h2><span class="counter" data-count="120">00</span>+</h2>
                                <p>@lang('home.events_hosted')</p>
                            </div>
                        </div>
                        <!-- Video Counter Item End -->

                        <!-- Video Counter Item Start -->
                        <div class="video-counter-item">
                            <div class="icon-box">
                                <img src="{{ WebsiteHelper::getAsset('images/icon-intro-video-counter-4.svg') }}" alt="@lang('home.happy_customers')" />
                            </div>
                            <div class="video-counter-content">
                                <h2><span class="counter" data-count="500">00</span>+</h2>
                                <p>@lang('home.happy_customers')</p>
                            </div>
                        </div>
                        <!-- Video Counter Item End -->

                    </div>
                    <!-- Intro Video Counters End -->
                </div>
            </div>
        @endif

    </div>
</div>
<!-- Intro Video Section End -->





