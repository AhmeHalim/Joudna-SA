<!-- Page Contact Us Start -->
<div class="page-contact-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Contact Information Start -->
                <div class="contact-information">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">@lang('home.contact_subtitle')</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">
                            @lang('home.contact_title')
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            @lang('home.contact_desc')
                        </p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Info Body Start -->
                    <div class="contact-info-body">

                        <!-- Contact Info Box 1 Start -->
                        <div class="contact-info-box-1 wow fadeInUp" data-wow-delay="0.4s">
                            <!-- Phone -->
                            <div class="contact-info-item">
                                <div class="icon-box">
                                    <img src="{{ WebsiteHelper::getAsset('images/icon-phone-accent.svg') }}" alt="@lang('home.contact_phone')" />
                                </div>
                                <div class="contact-item-content">
                                    <h3>@lang('home.contact_phone')</h3>
                                    <p><a href="tel:{{ $settings->phone1 }}">{{ $settings->phone1 }}</a></p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="contact-info-item">
                                <div class="icon-box">
                                    <img src="{{ WebsiteHelper::getAsset('images/icon-mail-accent.svg') }}" alt="@lang('home.contact_email')" />
                                </div>
                                <div class="contact-item-content">
                                    <h3>@lang('home.contact_email')</h3>
                                    <p><a href="mailto:{{ $settings->contact_email }}">{{ $settings->contact_email }}</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Info Box 1 End -->

                        <!-- Contact Info Box 2 Start -->
                        <div class="contact-info-box-2 wow fadeInUp" data-wow-delay="0.6s">
                            <!-- Address -->
                            <div class="contact-info-item">
                                <div class="icon-box">
                                    <img src="{{ WebsiteHelper::getAsset('images/icon-location-accent.svg') }}" alt="@lang('home.contact_address')" />
                                </div>
                                <div class="contact-item-content">
                                    <h3>@lang('home.contact_address')</h3>
                                    <p>{{ app()->getLocale() == 'en' ? $settings->address_en_1 : $settings->address1 }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Info Box 2 End -->

                    </div>
                    <!-- Contact Info Body End -->
                </div>
                <!-- Contact Information End -->
            </div>

            <div class="col-lg-6">
                <!-- Contact Us Form Start -->
                <div class="contact-us-form">
                    <!-- Contact Form Content Start -->
                    <div class="contact-form-content">
                        <h3 class="wow fadeInUp">@lang('home.contact_form_title')</h3>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            @lang('home.contact_form_desc')
                        </p>
                    </div>
                    <!-- Contact Form Content End -->

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Contact Form Start -->
                    <div class="contact-form">
                        <form
                            id="contactForm"
                            action="{{ route('website.contact-us-save') }}"
                            method="POST"
                            class="wow fadeInUp"
                            data-wow-delay="0.4s"
                        >
                            @csrf
                            <div class="row">

                                <!-- Name -->
                                <div class="form-group col-md-12 mb-5">
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="formName"
                                        placeholder="@lang('home.name')"
                                        value="{{ old('name') }}"
                                        autocomplete="off"
                                        required
                                    />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <span class="invalid-feedback" id="nameError" style="display: none;"><strong></strong></span>
                                </div>

                                <!-- Email -->
                                <div class="form-group col-md-6 mb-5">
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="formEmail"
                                        placeholder="@lang('home.email')"
                                        value="{{ old('email') }}"
                                        autocomplete="off"
                                        required
                                    />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <span class="invalid-feedback" id="emailError" style="display: none;"><strong></strong></span>
                                </div>

                                <!-- Phone -->
                                <div class="form-group col-md-6 mb-5">
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        id="formPhone"
                                        placeholder="@lang('home.phone')"
                                        value="{{ old('phone') }}"
                                        autocomplete="off"
                                        required
                                    />
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <span class="invalid-feedback" id="phoneError" style="display: none;"><strong></strong></span>
                                </div>

                                <!-- Message -->
                                <div class="form-group col-md-12 mb-5">
                                    <textarea
                                        name="message"
                                        class="form-control @error('message') is-invalid @enderror"
                                        id="formMessage"
                                        rows="3"
                                        placeholder="@lang('home.message')"
                                    >{{ old('message') }}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <span class="invalid-feedback" id="messageError" style="display: none;"><strong></strong></span>
                                </div>

                                <!-- Submit -->
                                <div class="col-lg-12">
                                    <div class="contact-form-btn">
                                        <button type="submit" id="submitBtn" class="btn-default">
                                            @lang('home.Submit')
                                        </button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->

                </div>
                <!-- Contact Us Form End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Contact Us End -->

@if(Request()->segment(2) == 'contact-us'  && $settings->google_map)
    <!-- Google Map Section Start -->
    <div class="google-map">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Google Map IFrame Start -->
                    <div class="google-map-iframe">
                        <iframe
                            src="{{$settings->google_map}}"
                            width="600"
                            height="450"
                            style="border: 0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                    <!-- Google Map IFrame End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map Section End -->
@endif

@push('scripts')
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
            ['formName', 'formEmail', 'formPhone', 'formMessage'].forEach(function(id) {
                document.getElementById(id).classList.remove('is-invalid');
            });
            ['nameError', 'emailError', 'phoneError', 'messageError'].forEach(function(id) {
                document.getElementById(id).style.display = 'none';
            });

            const name      = document.getElementById('formName').value.trim();
            const email     = document.getElementById('formEmail').value.trim();
            const phone     = document.getElementById('formPhone').value.trim();
            const message   = document.getElementById('formMessage').value.trim();
            const submitBtn = document.getElementById('submitBtn');

            let hasError = false;

            function showError(fieldId, errorId, msg) {
                document.getElementById(fieldId).classList.add('is-invalid');
                const el = document.getElementById(errorId);
                el.querySelector('strong').textContent = msg;
                el.style.display = 'block';
                hasError = true;
            }

            if (!name) {
                showError('formName', 'nameError', '@lang("home.name_required")');
            }

            if (!email) {
                showError('formEmail', 'emailError', '@lang("home.email_required")');
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                showError('formEmail', 'emailError', '@lang("home.email_invalid")');
            }

            if (!phone) {
                showError('formPhone', 'phoneError', '@lang("home.phone_required")');
            }

            if (!message) {
                showError('formMessage', 'messageError', '@lang("home.message_required")');
            } else if (message.length < 10) {
                showError('formMessage', 'messageError', '@lang("home.message_min")');
            }

            if (hasError) {
                if (typeof toastr !== 'undefined') {
                    toastr.error('@lang("home.Please fill in all required fields")');
                }
                return false;
            }

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> @lang("home.Please wait...")';
            this.submit();
        });

        // Clear errors on input
        [
            { field: 'formName',    error: 'nameError'    },
            { field: 'formEmail',   error: 'emailError'   },
            { field: 'formPhone',   error: 'phoneError'   },
            { field: 'formMessage', error: 'messageError' },
        ].forEach(function({ field, error }) {
            document.getElementById(field).addEventListener('input', function() {
                this.classList.remove('is-invalid');
                document.getElementById(error).style.display = 'none';
            });
        });
    </script>
@endpush
