<!-- Main Footer Section Start -->
<footer class="main-footer parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Footer Contact List Start -->
                <div class="footer-contact-list">
                    <!-- Footer Contact Item Start - Contact Us -->
                    <div class="footer-contact-item">
                        <div class="icon-box">
                            <img src="{{ WebsiteHelper::getAsset('images/icon-phone-accent.svg') }}" alt="@lang('home.contact_icon_alt')" />
                        </div>
                        <div class="footer-contact-detail">
                            <h3>@lang('home.contact_us')</h3>
                            <p>T. <a href="tel:{{ $settings->phone1 ?? '+123 456 789' }}">{{ $settings->phone1 ?? '+123 456 789' }}</a></p>
                            <p>M.<a href="mailto:{{ $settings->contact_email ?? 'info@joudna.com' }}">{{ $settings->contact_email ?? 'info@joudna.com' }}</a></p>
                        </div>
                        <div class="footer-contact-button">
                            <a href="{{ LaravelLocalization::localizeUrl('contact-us') }}" class="btn-default btn-highlighted">@lang('home.contact_us_btn')</a>
                        </div>
                    </div>
                    <!-- Footer Contact Item End -->

                    <!-- Footer Contact Item Start - Address -->
                    <div class="footer-contact-item">
                        <div class="icon-box">
                            <img src="{{ WebsiteHelper::getAsset('images/icon-location-accent.svg') }}" alt="@lang('home.address_icon_alt')" />
                        </div>
                        <div class="footer-contact-detail">
                            <h3>@lang('home.address')</h3>
                            <p>
                                {{ app()->getLocale() == 'en' ? ($settings->address_en_1 ?? 'Cenomi al nakheel mall, Riyadh, Saudi Arabia') : ($settings->address1 ?? 'مول سنومي النخيل، الرياض، المملكة العربية السعودية') }}
                            </p>
                        </div>
                        <div class="footer-contact-button">
                            <a href="{{ $settings->google_map ?? 'http://google.com/maps' }}" class="btn-default btn-highlighted" target="_blank">@lang('home.get_direction')</a>
                        </div>
                    </div>
                    <!-- Footer Contact Item End -->

                    <!-- Footer Contact Item Start - Opening Hours -->
                    <div class="footer-contact-item">
                        <div class="icon-box">
                            <img src="{{ WebsiteHelper::getAsset('images/icon-clock-accent.svg') }}" alt="@lang('home.hours_icon_alt')" />
                        </div>
                        <div class="footer-contact-detail">
                            <h3>@lang('home.opening_hours')</h3>
                            <p>@lang('home.opening_hours_weekdays')</p>
                            <p>@lang('home.opening_hours_friday')</p>
                        </div>
                        <div class="footer-contact-button">
                            <a href="{{ LaravelLocalization::localizeUrl('book-table') }}" class="btn-default btn-highlighted">@lang('home.reserve_a_table')</a>
                        </div>
                    </div>
                    <!-- Footer Contact Item End -->
                </div>
                <!-- Footer Contact List End -->
            </div>

            <div class="col-lg-12">
                <!-- Footer Copyright Start -->
                <div class="footer-copyright">
                    <!-- Footer Copyright Text Start -->
                    <div class="footer-copyright-text order-md-1 order-3">
                        <p>@lang('home.copyright_text', ['year' => date('Y')])</p>
                    </div>
                    <!-- Footer Copyright Text End -->

                    <!-- Footer Logo Start -->
                    <div class="footer-logo order-md-2 order-1">
                        <img src="{{ asset('uploads/settings/' . ($settings->logo ??'logo.png')) }}" alt="@lang('home.footer_logo_alt')" />
                    </div>
                    <!-- Footer Logo End -->

                    <!-- Footer Social Links Start -->
                    <div class="footer-social-links order-md-3 order-2">
                        <ul>
                            <li>
                                <a href="{{ $settings->instagram_address ?? 'https://www.instagram.com/' }}" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings->tiktok_address ?? 'https://www.tiktok.com/' }}" target="_blank">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings->snapchat_address ?? 'https://www.snapchat.com/' }}" target="_blank">
                                    <i class="fa-brands fa-snapchat"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Footer Social Links End -->
                </div>
                <!-- Footer Copyright End -->
            </div>
        </div>
    </div>
</footer>
<!-- Main Footer Section End --
