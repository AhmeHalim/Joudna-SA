<!-- About us Section Start -->
@php use Illuminate\Http\Request; @endphp

<div class="about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- About us Content Start -->
                <div class="about-us-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">@lang('home.about_us')</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">
                            {{ $aboutUs->title ?? __('home.about_default_title') }}
                        </h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- About Description -->
                    @if(isset($aboutUs->description))
                        <div class="about-description mb-4">
                            <p class="wow fadeInUp" data-wow-delay="0.1s">{!! $aboutUs->description !!}</p>
                        </div>
                    @endif

                    <!-- About Body List Start -->
                    <div class="about-body-list">
                        @php
                            $aboutFeatures = isset($about_values) ? $about_values->where('type', 'feature') : collect();
                        @endphp

                        @foreach($aboutFeatures as $key => $feature)
                            <!-- About Body Item Start -->
                            <div class="about-body-item wow fadeInUp" data-wow-delay="{{ 0.2 + ($key * 0.2) }}s">
                                <div class="icon-box">
                                    @if($feature->icon)
                                        <img src="{{ WebsiteHelper::getImage('about_values', $feature->icon) }}" alt="{{ $feature->title }}" />
                                    @else
                                        <img src="{{ WebsiteHelper::getAsset('images/icon-about-body-item-' . ($key + 1) . '.svg') }}" alt="{{ $feature->title }}" />
                                    @endif
                                </div>
                                <div class="about-body-list-content">
                                    <h3>{{ $feature->title }}</h3>
                                    <p>{{ $feature->description }}</p>
                                </div>
                            </div>
                            <!-- About Body Item End -->
                        @endforeach

                        <!-- Fallback static features if no dynamic ones exist -->
                        @if($aboutFeatures->isEmpty())
                            <div class="about-body-item wow fadeInUp" data-wow-delay="0.2s">
                                <div class="icon-box">
                                    <img src="{{ WebsiteHelper::getAsset('images/icon-about-body-item-1.svg') }}" alt="@lang('home.food_delivery')" />
                                </div>
                                <div class="about-body-list-content">
                                    <h3>@lang('home.food_delivery')</h3>
                                    <p>@lang('home.food_delivery_desc')</p>
                                </div>
                            </div>

                            <div class="about-body-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="icon-box">
                                    <img src="{{ WebsiteHelper::getAsset('images/icon-about-body-item-2.svg') }}" alt="@lang('home.event_elegance')" />
                                </div>
                                <div class="about-body-list-content">
                                    <h3>@lang('home.event_elegance')</h3>
                                    <p>@lang('home.event_elegance_desc')</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- About Body List End -->

                    <!-- About Us Footer Start -->
                    <div class="about-us-footer wow fadeInUp" data-wow-delay="0.6s">
                        @if(Request()->segment(2) == '')
                            <!-- About Button Start -->
                            <div class="about-btn">
                                <a href="{{ LaravelLocalization::localizeUrl('about-us') }}" class="btn-default">@lang('home.more_about_us')</a>
                            </div>
                            <!-- About Button End -->
                        @endif

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
                    <!-- About Us Footer End -->
                </div>
                <!-- About us Content End -->
            </div>

            <div class="col-lg-6">
                <!-- About Us Image Start -->
                <div class="about-us-image">
                    <!-- About Us Main Image -->
                    <div class="about-us-img">
                        <figure class="image-anime">
                            @php
                                $lang = app()->getLocale();
                                $mainImage = isset($aboutUs) ? WebsiteHelper::getImage('about', $aboutUs->{'image' . ($lang == 'en' ? '_en' : '')}) : null;
                                $bannerImage = isset($aboutUs) ? WebsiteHelper::getImage('about', $aboutUs->{'banner' . ($lang == 'en' ? '_en' : '')}) : null;
                            @endphp
                            @if($mainImage)
                                <img src="{{ $mainImage }}" alt="{{ $aboutUs->title ?? __('home.about_image_alt') }}" />
                            @else
                                <img src="{{ WebsiteHelper::getAsset('images/about/about.webp') }}" alt="@lang('home.about_image_alt')" />
                            @endif
                        </figure>
                    </div>

                    <!-- Opening Time Box Start -->
                    <div class="opening-time-box">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <!-- Icon Box End -->

                        <!-- Opening Time Content Start -->
                        <div class="opening-time-content">
                            <h3>@lang('home.open_hours')</h3>
                            <ul>
                                <li>@lang('home.saturday_thursday')<span>@lang('home.weekday_hours')</span></li>
                                <li>@lang('home.friday')<span>@lang('home.friday_hours')</span></li>
                            </ul>
                        </div>
                        <!-- Opening Time Content End -->
                    </div>
                    <!-- Opening Time Box End -->
                </div>
                <!-- About Us Image End -->
            </div>
        </div>
    </div>
</div>
<!-- About us Section End -->
