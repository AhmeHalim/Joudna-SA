<!-- Page Header Start -->
<div class="page-header parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-3" data-cursor="-opaque">{{ $title }}</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">@lang('home.home_page')</a>
                            </li>
                            @foreach($items as $item)
                                @if(isset($item['url']))
                                    <li class="breadcrumb-item">
                                        <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                                    </li>
                                @else
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $item['label'] }}
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Scrolling Ticker Section Start -->
<div class="our-scrolling-ticker subpages-scrolling-ticker">
    <!-- Scrolling Ticker Start -->
    <div class="scrolling-ticker-box">

        @if($tickerCategories->isNotEmpty())
            {{-- Repeated twice for seamless infinite scroll effect --}}
            @for($i = 0; $i < 2; $i++)
                <div class="scrolling-content">
                    @foreach($tickerCategories as $tickerCategory)
                        <span>
                            <img src="{{ WebsiteHelper::getAsset('images/asterisk-icon.svg') }}" alt="" />
                            {{ $tickerCategory->name }}
                        </span>
                    @endforeach
                </div>
            @endfor
        @else
            {{-- Fallback static --}}
            @for($i = 0; $i < 2; $i++)
                <div class="scrolling-content">
                    <span><img src="{{ WebsiteHelper::getAsset('images/asterisk-icon.svg') }}" alt="" />@lang('home.ticker_espresso')</span>
                    <span><img src="{{ WebsiteHelper::getAsset('images/asterisk-icon.svg') }}" alt="" />@lang('home.ticker_americano')</span>
                    <span><img src="{{ WebsiteHelper::getAsset('images/asterisk-icon.svg') }}" alt="" />@lang('home.ticker_latte')</span>
                    <span><img src="{{ WebsiteHelper::getAsset('images/asterisk-icon.svg') }}" alt="" />@lang('home.ticker_cappuccino')</span>
                    <span><img src="{{ WebsiteHelper::getAsset('images/asterisk-icon.svg') }}" alt="" />@lang('home.ticker_mocha')</span>
                    <span><img src="{{ WebsiteHelper::getAsset('images/asterisk-icon.svg') }}" alt="" />@lang('home.ticker_macchiato')</span>
                    <span><img src="{{ WebsiteHelper::getAsset('images/asterisk-icon.svg') }}" alt="" />@lang('home.ticker_cold_brew')</span>
                </div>
            @endfor
        @endif

    </div>
    <!-- Scrolling Ticker End -->
</div>
<!-- Scrolling Ticker Section End -->
