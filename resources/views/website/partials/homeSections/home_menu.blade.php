<!-- Our Pricing Section Start -->
@if($menuCategories->isNotEmpty())
    <div class="our-pricing">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">@lang('home.pricing_subtitle')</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">
                            @lang('home.pricing_title')
                        </h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="our-pricing-box tab-content" id="pricingtab">

                        <!-- Category Tabs Nav Start -->
                        <div class="our-support-nav wow fadeInUp" data-wow-delay="0.2s">
                            <ul class="nav nav-tabs" id="mvTab" role="tablist">
                                @foreach($menuCategories as $index => $category)
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="btn-default btn-highlighted {{ $index === 0 ? 'active' : '' }}"
                                            id="category-{{ $category->id }}-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#category-{{ $category->id }}"
                                            type="button"
                                            role="tab"
                                            aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                                        >
                                            {{ $category->name }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Category Tabs Nav End -->

                        <!-- Category Tab Panels Start -->
                        @foreach($menuCategories as $index => $category)
                            <div
                                class="pricing-boxes tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                id="category-{{ $category->id }}"
                                role="tabpanel"
                            >
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <!-- Pricing Image Start -->
                                        <div class="pricing-image">
                                            <figure class="image-anime">
                                                <img
                                                    src="{{ WebsiteHelper::getImage('categories', $category->image) }}"
                                                    alt="{{ $category->alt_image ?? $category->name }}"
                                                />
                                            </figure>
                                        </div>
                                        <!-- Pricing Image End -->
                                    </div>

                                    <div class="col-lg-6">
                                        <!-- Our Menu List Start -->
                                        <div class="our-menu-list">
                                            @foreach($category->items as $item)
                                                <!-- Menu Item Start -->
                                                <div class="menu-list-item">
                                                    <div class="menu-list-image">
                                                        <figure>
                                                            <img
                                                                src="{{ WebsiteHelper::getImage('items', $item->image) }}"
                                                                alt="{{ $item->alt_image ?? $item->name }}"
                                                            />
                                                        </figure>
                                                    </div>
                                                    <div class="menu-item-body">
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
                                                        <div class="menu-item-content">
                                                            <p>{{ $item->short_desc }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Menu Item End -->
                                            @endforeach
                                        </div>
                                        <!-- Our Menu List End -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Category Tab Panels End -->

                        <!-- Section Footer Start -->
                        <div class="section-footer-text wow fadeInUp" data-wow-delay="0.2s">
                            <p>
                                @lang('home.pricing_cta_text')
                                    <a href="">@lang('home.pricing_cta_link')</a>
                            </p>
                        </div>
                        <!-- Section Footer End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- Our Pricing Section End -->
