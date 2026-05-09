<!-- Header Start -->
<header class="main-header active-sticky-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{ LaravelLocalization::localizeUrl('/') }}">
                    <img src="{{ asset('uploads/settings/' . ($settings->white_logo ?? 'default-logo.webp')) }}" alt="@lang('home.logo_alt')" />
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            @foreach ($headMenu?->published_items()->whereNull('parent_id')->get() ?? [] as $headItem)
                                @if ($headItem->types == 'home')
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->segment(2) == '' ? 'active' : '' }}" href="{{ $headItem->custom_link }}">{{ $headItem->name }}</a>
                                    </li>
                                @elseif($headItem->types == 'about-us')
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->segment(2) == 'about-us' ? 'active' : '' }}" href="{{ $headItem->custom_link }}">{{ $headItem->name }}</a>
                                    </li>
                                @elseif($headItem->types == 'feed-back')
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->segment(2) == 'feed-back' ? 'active' : '' }}" href="{{ $headItem->custom_link }}">{{ $headItem->name }}</a>
                                    </li>
                                @elseif($headItem->types == 'contact-us')
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->segment(2) == 'contact-us' ? 'active' : '' }}" href="{{ $headItem->custom_link }}">{{ $headItem->name }}</a>
                                    </li>
                                @elseif($headItem->types == 'menu')
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->segment(2) == 'menu' ? 'active' : '' }}" href="{{ $headItem->custom_link }}">{{ $headItem->name }}</a>
                                    </li>
                                @elseif($headItem->types == 'gallery')
                                    <li class="nav-item submenu">
                                        <a class="nav-link" href="javascript:void(0)">@lang('home.gallery')</a>
                                        @if ($headItem->subMenus->count() > 0)
                                        <ul>
                                            @foreach ($headItem->subMenus as $subMenu)
                                                @if ($subMenu->types == 'gallery-images')
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ $subMenu->custom_link }}">{{ $subMenu->name }}</a>
                                                    </li>
                                                @endif

                                                @if ($subMenu->types == 'gallery-videos')
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ $subMenu->custom_link }}">{{ $subMenu->name }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                @else
                                    {{-- Fallback for any other custom link Items --}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $headItem->custom_link }}">{{ $headItem->name }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Hardcoded fallback Items in case $headMenu is empty (optional) --}}
                            @if(!$headMenu || $headMenu->published_items()->whereNull('parent_id')->get()->isEmpty())
                                <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/') }}">@lang('home.home')</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('about-us') }}">@lang('home.about_us')</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('reviews') }}">@lang('home.feedback')</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('menu') }}">@lang('home.menu')</a></li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" href="javascript:void(0)">@lang('home.gallery')</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('video-gallery') }}">@lang('home.video_gallery')</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('image-gallery') }}">@lang('home.image_gallery')</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('contact-us') }}">@lang('home.contact_us')</a></li>
                                <li class="nav-item highlighted-menu"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('book-table') }}">@lang('home.book_a_table')</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- Mobile Toggle & Language Selector Start -->
                    <div class="mobile-header-controls d-flex align-items-center">
                        <div class="lang-change mx-3">
                            @php
                                $currentLocale = app()->getLocale();
                                $otherLocale = $currentLocale === 'en' ? 'ar' : 'en';
                            @endphp
                            <a href="{{ LaravelLocalization::getLocalizedURL($otherLocale) }}" class="btn-lang">
                                @if($currentLocale === 'en')
                                    @lang('home.arabic')
                                @else
                                    @lang('home.english')
                                @endif
                            </a>
                        </div>
                        
                    </div>
                    <!-- Mobile Toggle & Language Selector End -->

                    <!-- Header Button Box Start (Desktop) -->
                    <div class="header-button-box">
                        <div class="header-btn">
                            <a href="{{ LaravelLocalization::localizeUrl('book-table') }}" class="btn-default btn-highlighted">@lang('home.book_a_table')</a>
                        </div>
                    </div>
                    <!-- Header Button Box End -->
                </div>
                <!-- Main Menu End -->
                <div class="navbar-toggle"></div>

                
            </div>
            
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
<!-- Header End -->

