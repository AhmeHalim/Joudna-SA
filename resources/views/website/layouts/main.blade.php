<!DOCTYPE html>
<html class="no-js" lang="{{ $lang == 'en' ? 'en' : 'ar' }}" dir="{{ $lang == 'en' ? 'ltr' : 'rtl' }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('title')

        <!-- favicons Icons -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/settings/' . $settings->fav_icon) }}"/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/settings/' . $settings->fav_icon) }}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/settings/' . $settings->fav_icon) }}"/>
        <meta name="description" content="joudna main website , we are take the lead" />

        @include('website.layouts.css')
    </head>

    <body>
        <!-- Preloader Start -->
        <div class="preloader">
            <div class="loading-container">
                <div class="loading"></div>
                <div id="loading-icon"><img src="{{ asset('uploads/settings/' . $settings->logo) }}" alt="website logo" /></div>
            </div>
        </div>
        <!-- Preloader End -->

        <!-- Topbar Section Start -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <!-- Topbar Contact Information Start -->
                        <div class="topbar-contact-info">
                            <ul>
                                <li>
                                    <a href="mailto:{{$settings->contact_email}}" target="_blank"><img src="{{ WebsiteHelper::getAsset('images/icon-mail.svg')}}" alt="" />{{$settings->contact_email}}</a>

                                </li>
                                <li>
                                    <a target="_blank" href="https://www.google.com/maps/place/Joudna+Bakery+%26+Coffee/@24.7648185,46.7156804,17z/data=!3m1!4b1!4m6!3m5!1s0x3e2efddf087dd14f:0x4c7834795e9a73a3!8m2!3d24.7648185!4d46.7156804!16s%2Fg%2F11v_3sj5n9!5m1!1e1?entry=ttu&g_ep=EgoyMDI2MDQwMS4wIKXMDSoASAFQAw%3D%3D">
                                        <img src="{{ WebsiteHelper::getAsset('images/icon-location.svg')}}" alt="" />{{ app()->getLocale() == 'en' ? $settings->address_en_1 : $settings->address1 }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Topbar Contact Information End -->
                    </div>

                    <div class="col-md-3">
                        <!-- Topbar Social Links Start -->
                        <div class="topbar-social-links">
                            <ul>
                                <li>
                                    <a href="{{$settings->instagram_address}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{$settings->tiktok_address}}" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                </li>
                                <li>
                                    <a href="{{$settings->snapchat_address}}" target="_blank"><i class="fa-brands fa-snapchat"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Topbar Social Links End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Section End -->

        @include('website.layouts.header')

        @yield('content')

        @include('website.layouts.footer')

        @include('website.layouts.js')
    </body>
</html>
