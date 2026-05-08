@php
    $lang = app()->getLocale();
    $bannerImage = isset($aboutUs) ? WebsiteHelper::getImage('about', $aboutUs->{'banner' . ($lang == 'en' ? '_en' : '')}) : null;
@endphp
<!-- Mission & Vision Section (Shows on About Us page) -->
@if(isset($about_values) && $about_values->where('type', 'mission_and_vision')->count() > 0)
    <div class="our-approach">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Our Approach Content Start -->
                    <div class="our-approach-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">@lang('home.our_approach')</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">
                                @lang('home.our_approach_title')
                            </h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Mission Vision List Start -->
                        <div class="mission-vision-list">
                            @foreach($about_values->where('type', 'mission_and_vision') as $key => $mv)
                                <!-- Mission Vision Item Start -->
                                <div class="mission-vision-item wow fadeInUp" data-wow-delay="{{ 0.2 + ($key * 0.2) }}s">
                                    <div class="icon-box">
                                        @if($mv->icon)
                                            <img src="{{ WebsiteHelper::getImage('about_values', $mv->icon) }}" alt="{{ $mv->title }}" />
                                        @else
                                            <img src="{{ WebsiteHelper::getAsset('images/icon-our-mission.svg') }}" alt="{{ $mv->title }}" />
                                        @endif
                                    </div>
                                    <div class="mission-vision-content">
                                        <h3>{{ $mv->title }}</h3>
                                        <p>{{ $mv->description }}</p>
                                    </div>
                                </div>
                                <!-- Mission Vision Item End -->
                            @endforeach
                        </div>
                        <!-- Mission Vision List End -->

                    </div>
                    <!-- Our Approach Content End -->
                </div>

                <div class="col-lg-6">
                    <!-- Our Approach Image Start -->
                    <div class="our-approach-image">
                        <figure class="image-anime">
                            @if($bannerImage)
                                <img src="{{ $bannerImage }}" alt="{{ $aboutUs->title ?? __('home.about_image_alt') }}" />
                            @else
                                <img src="{{ WebsiteHelper::getAsset('images/about/about00.webp') }}" alt="@lang('home.our_approach_title')" />
                            @endif
                        </figure>
                    </div>
                    <!-- Our Approach Image End -->
                </div>
            </div>
        </div>
    </div>
@endif
<!-- Mission & Vision Section-->
