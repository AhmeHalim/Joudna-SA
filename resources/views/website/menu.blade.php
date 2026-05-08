@extends('website.layouts.main')
@section('title')
    <title>{{$settings->site_name}} | @lang('home.menu')</title>
@endsection

@section('content')
    @include('website.partials.pagesSections.breadcrumb', [
        'title' => __('home.menu'),
        'items' => [
            ['label' => __('home.menu')]
        ]
    ])



    <!-- page Menu Section Start -->
    @if($menuCategories->isNotEmpty())
        <div class="page-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- page Menu Box Start -->
                        <div class="page-menu-box">

                            @foreach($menuCategories as $category)
                                @if($category->items->isNotEmpty())
                                    <!-- Page Menu Item Start -->
                                    <div class="page-menu-item">
                                        <!-- Section Title Start -->
                                        <div class="section-title">
                                            <h3 class="wow fadeInUp">{{ $category->name }}</h3>
                                            <h2 class="text-anime-style-3" data-cursor="-opaque">
                                                {{ $category->short_desc ?? '' }}
                                            </h2>
                                        </div>
                                        <!-- Section Title End -->

                                        <!-- Page Menu Image Start -->
                                        @if($category->image)
                                            <div class="page-menu-image">
                                                <figure class="image-anime reveal">
                                                    <img
                                                        src="{{ WebsiteHelper::getImage('categories', $category->image) }}"
                                                        alt="{{ $category->alt_image ?? $category->name }}"
                                                    />
                                                </figure>
                                            </div>
                                        @endif
                                        <!-- Page Menu Image End -->

                                        <!-- Our Menu List Start -->
                                        <div class="page-menu-list">
                                            @php
                                                $chunks = $category->items->chunk(4);
                                            @endphp

                                            @foreach($chunks as $chunk)
                                                <div class="our-menu-list">
                                                    @foreach($chunk as $index => $item)
                                                        <!-- Menu Item Start -->
                                                        <div class="menu-list-item wow fadeInUp" {{ $index > 0 ? 'data-wow-delay="' . ($index * 0.2) . 's"' : '' }}>
                                                            <!-- Menu Item Image Start -->
                                                            <div class="menu-list-image">
                                                                <figure>
                                                                    <img
                                                                        src="{{ WebsiteHelper::getImage('items', $item->image) }}"
                                                                        alt="{{ $item->alt_image ?? $item->name }}"
                                                                    />
                                                                </figure>
                                                            </div>
                                                            <!-- Menu Item Image End -->

                                                            <!-- Menu Item Body Start -->
                                                            <div class="menu-item-body">
                                                                <!-- Menu Item Title Start -->
                                                                <div class="menu-item-title">
                                                                    <h3>{{ $item->name }}</h3>
                                                                    <hr />
                                                                    <span>
                                                                <svg viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg" class="styles__icon--f9b3f" style="width: 20px; height: 20px; color: var(--accent-color);">
                                                                    <path d="M10.21 7.76a3.815 3.815 0 0 1-.321 1.194l-3.554.75v-2.25l-1.107.234v1.249c0 .114-.035.22-.095.307l-.576.849a.998.998 0 0 1-.618.41L.8 11.166c.043-.421.154-.823.321-1.193l3-.634V7.922l-2.799.592c.043-.422.154-.823.322-1.193l2.477-.524V2.422A3.899 3.899 0 0 1 5.228 1.5v5.064l1.107-.234V2.973a3.9 3.9 0 0 1 1.107-.924v4.046l2.768-.584a3.81 3.81 0 0 1-.321 1.193l-2.447.517v1.125l2.768-.585ZM6.335 11.954c.043-.42.154-.822.322-1.193l3.553-.75a3.814 3.814 0 0 1-.321 1.192l-3.554.751Z" fill="var(--accent-color)"></path>
                                                                </svg>
                                                                {{ number_format($item->price, 2) }}
                                                            </span>
                                                                </div>
                                                                <!-- Menu Item Title End -->

                                                                <!-- Menu Item Content Start -->
                                                                <div class="menu-item-content">
                                                                    <p>{{ $item->short_desc }}</p>
                                                                </div>
                                                                <!-- Menu Item Content End -->
                                                            </div>
                                                            <!-- Menu Item Body End -->
                                                        </div>
                                                        <!-- Menu Item End -->
                                                    @endforeach
                                                </div>
                                            @endforeach

                                        </div>
                                        <!-- Our Menu List End -->
                                    </div>
                                    <!-- Page Menu Item End -->
                                @endif
                            @endforeach

                        </div>
                        <!-- page Menu Box End -->
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- page Menu Section End -->

@endsection
