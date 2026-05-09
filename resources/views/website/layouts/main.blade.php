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
        <a href="https://wa.me/+{{ $settings->phone1 ?? '+123 456 789' }}" class="float-whts" target="_blank">
            <svg fill="#ffffff" width="24px" height="24px" viewBox="0 0 1024 1024" t="1569683925316" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="14972" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style type="text/css"></style></defs><path d="M713.5 599.9c-10.9-5.6-65.2-32.2-75.3-35.8-10.1-3.8-17.5-5.6-24.8 5.6-7.4 11.1-28.4 35.8-35 43.3-6.4 7.4-12.9 8.3-23.8 2.8-64.8-32.4-107.3-57.8-150-131.1-11.3-19.5 11.3-18.1 32.4-60.2 3.6-7.4 1.8-13.7-1-19.3-2.8-5.6-24.8-59.8-34-81.9-8.9-21.5-18.1-18.5-24.8-18.9-6.4-0.4-13.7-0.4-21.1-0.4-7.4 0-19.3 2.8-29.4 13.7-10.1 11.1-38.6 37.8-38.6 92s39.5 106.7 44.9 114.1c5.6 7.4 77.7 118.6 188.4 166.5 70 30.2 97.4 32.8 132.4 27.6 21.3-3.2 65.2-26.6 74.3-52.5 9.1-25.8 9.1-47.9 6.4-52.5-2.7-4.9-10.1-7.7-21-13z" p-id="14973"></path><path d="M925.2 338.4c-22.6-53.7-55-101.9-96.3-143.3-41.3-41.3-89.5-73.8-143.3-96.3C630.6 75.7 572.2 64 512 64h-2c-60.6 0.3-119.3 12.3-174.5 35.9-53.3 22.8-101.1 55.2-142 96.5-40.9 41.3-73 89.3-95.2 142.8-23 55.4-34.6 114.3-34.3 174.9 0.3 69.4 16.9 138.3 48 199.9v152c0 25.4 20.6 46 46 46h152.1c61.6 31.1 130.5 47.7 199.9 48h2.1c59.9 0 118-11.6 172.7-34.3 53.5-22.3 101.6-54.3 142.8-95.2 41.3-40.9 73.8-88.7 96.5-142 23.6-55.2 35.6-113.9 35.9-174.5 0.3-60.9-11.5-120-34.8-175.6z m-151.1 438C704 845.8 611 884 512 884h-1.7c-60.3-0.3-120.2-15.3-173.1-43.5l-8.4-4.5H188V695.2l-4.5-8.4C155.3 633.9 140.3 574 140 513.7c-0.4-99.7 37.7-193.3 107.6-263.8 69.8-70.5 163.1-109.5 262.8-109.9h1.7c50 0 98.5 9.7 144.2 28.9 44.6 18.7 84.6 45.6 119 80 34.3 34.3 61.3 74.4 80 119 19.4 46.2 29.1 95.2 28.9 145.8-0.6 99.6-39.7 192.9-110.1 262.7z" p-id="14974"></path></g></svg>
        </a>
        <a href="tel:+{{ $settings->phone1 ?? '+123 456 789' }}" class="float-call">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.42C21.55 19.78 21.33 20.12 21.04 20.44C20.55 20.98 20.01 21.37 19.4 21.62C18.8 21.87 18.15 22 17.45 22C16.43 22 15.34 21.76 14.19 21.27C13.04 20.78 11.89 20.12 10.75 19.29C9.6 18.45 8.51 17.52 7.47 16.49C6.44 15.45 5.51 14.36 4.68 13.22C3.86 12.08 3.2 10.94 2.72 9.81C2.24 8.67 2 7.58 2 6.54C2 5.86 2.12 5.21 2.36 4.61C2.6 4 2.98 3.44 3.51 2.94C4.15 2.31 4.85 2 5.59 2C5.87 2 6.15 2.06 6.4 2.18C6.66 2.3 6.89 2.48 7.07 2.74L9.39 6.01C9.57 6.26 9.7 6.49 9.79 6.71C9.88 6.92 9.93 7.13 9.93 7.32C9.93 7.56 9.86 7.8 9.72 8.03C9.59 8.26 9.4 8.5 9.16 8.74L8.4 9.53C8.29 9.64 8.24 9.77 8.24 9.93C8.24 10.01 8.25 10.08 8.27 10.16C8.3 10.24 8.33 10.3 8.35 10.36C8.53 10.69 8.84 11.12 9.28 11.64C9.73 12.16 10.21 12.69 10.73 13.22C11.27 13.75 11.79 14.24 12.32 14.69C12.84 15.13 13.27 15.43 13.61 15.61C13.66 15.63 13.72 15.66 13.79 15.69C13.87 15.72 13.95 15.73 14.04 15.73C14.21 15.73 14.34 15.67 14.45 15.56L15.21 14.81C15.46 14.56 15.7 14.37 15.93 14.25C16.16 14.11 16.39 14.04 16.64 14.04C16.83 14.04 17.03 14.08 17.25 14.17C17.47 14.26 17.7 14.39 17.95 14.56L21.26 16.91C21.52 17.09 21.7 17.3 21.81 17.55C21.91 17.8 21.97 18.05 21.97 18.33Z" stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10"></path> </g></svg>
        </a>

        @include('website.layouts.header')

        @yield('content')

        @include('website.layouts.footer')
        
        @include('website.layouts.js')
    </body>
</html>
