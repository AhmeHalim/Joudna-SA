@extends('website.layouts.main')
@section('title')
    <title>{{$settings->site_name}} | @lang('home.feed_back')</title>
@endsection

@section('content')
    @include('website.partials.pagesSections.breadcrumb', [
        'title' => __('home.feed_back'),
        'items' => [
            ['label' => __('home.feed_back')]
        ]
    ])


    <!-- Reviews Section Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Contact Us Form Start -->
                    <div class="contact-us-form">
                        <!-- Contact Form Content Start -->
                        <div class="contact-form-content">
                            <h3 class="wow fadeInUp">@lang('home.feedback_form_title')</h3>
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
                                id="feedbackForm"
                                action="{{ route('website.feedback-save') }}"
                                method="POST"
                                class="wow fadeInUp"
                                data-wow-delay="0.4s"
                            >
                                @csrf
                                <div class="row">

                                    <!-- First Name -->
                                    <div class="form-group col-md-6 mb-5">
                                        <input
                                            type="text"
                                            name="fname"
                                            class="form-control @error('fname') is-invalid @enderror"
                                            id="feedbackFname"
                                            placeholder="@lang('home.contact_first_name')"
                                            value="{{ old('fname') }}"
                                            autocomplete="off"
                                        />
                                        @error('fname')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span class="invalid-feedback" id="fnameError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="form-group col-md-6 mb-5">
                                        <input
                                            type="text"
                                            name="lname"
                                            class="form-control @error('lname') is-invalid @enderror"
                                            id="feedbackLname"
                                            placeholder="@lang('home.contact_last_name')"
                                            value="{{ old('lname') }}"
                                            autocomplete="off"
                                        />
                                        @error('lname')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span class="invalid-feedback" id="lnameError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group col-md-6 mb-5">
                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="feedbackEmail"
                                            placeholder="@lang('home.email')"
                                            value="{{ old('email') }}"
                                            autocomplete="off"
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
                                            id="feedbackPhone"
                                            placeholder="@lang('home.phone')"
                                            value="{{ old('phone') }}"
                                            autocomplete="off"
                                        />
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span class="invalid-feedback" id="phoneError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- First Visit Radio -->
                                    <div class="form-group col-md-12 mb-5 d-flex align-items-center gap-4">
                                        <label>@lang('home.feedback_first_visit')</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="first_visit"
                                                id="firstVisitYes"
                                                value="yes"
                                                {{ old('first_visit') == 'yes' ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="firstVisitYes">
                                                @lang('home.feedback_yes')
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="first_visit"
                                                id="firstVisitNo"
                                                value="no"
                                                {{ old('first_visit', 'no') == 'no' ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="firstVisitNo">
                                                @lang('home.feedback_no')
                                            </label>
                                        </div>
                                        <span class="invalid-feedback d-block" id="firstVisitError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- Rating -->
                                    <div class="form-group col-md-6 mb-5">
                                        <select
                                            name="rating"
                                            class="form-control form-select @error('rating') is-invalid @enderror"
                                            id="feedbackRating"
                                        >
                                            <option value="" disabled selected>@lang('home.feedback_rating')</option>
                                            <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>⭐</option>
                                            <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>⭐⭐</option>
                                            <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐</option>
                                            <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                                            <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                                        </select>
                                        @error('rating')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span class="invalid-feedback" id="ratingError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- Nationality -->
                                    <div class="form-group col-md-6 mb-5">
                                        <select
                                            name="nationality"
                                            class="form-control form-select @error('nationality') is-invalid @enderror"
                                            id="feedbackNationality"
                                        >
                                            <option value="" disabled selected>@lang('home.feedback_nationality')</option>
                                            <option value="Saudi Arabia" {{ old('nationality') == 'Saudi Arabia' ? 'selected' : '' }}>@lang('home.nationality_saudi')</option>
                                            <option value="Qatar"        {{ old('nationality') == 'Qatar'        ? 'selected' : '' }}>@lang('home.nationality_qatar')</option>
                                            <option value="UAE"          {{ old('nationality') == 'UAE'          ? 'selected' : '' }}>@lang('home.nationality_uae')</option>
                                            <option value="Egypt"        {{ old('nationality') == 'Egypt'        ? 'selected' : '' }}>@lang('home.nationality_egypt')</option>
                                            <option value="Algeria"      {{ old('nationality') == 'Algeria'      ? 'selected' : '' }}>@lang('home.nationality_algeria')</option>
                                        </select>
                                        @error('nationality')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span class="invalid-feedback" id="nationalityError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- Message -->
                                    <div class="form-group col-md-12 mb-5">
                                    <textarea
                                        name="message"
                                        class="form-control @error('message') is-invalid @enderror"
                                        id="feedbackMessage"
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
                                            <button type="submit" id="feedbackSubmitBtn" class="btn-default">
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
    <!-- Reviews Section End -->

    @push('scripts')
        <script>
            document.getElementById('feedbackForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Clear previous errors
                ['feedbackFname', 'feedbackLname', 'feedbackEmail', 'feedbackPhone', 'feedbackRating', 'feedbackNationality', 'feedbackMessage'].forEach(function(id) {
                    document.getElementById(id).classList.remove('is-invalid');
                });
                ['fnameError', 'lnameError', 'emailError', 'phoneError', 'ratingError', 'nationalityError', 'messageError', 'firstVisitError'].forEach(function(id) {
                    document.getElementById(id).style.display = 'none';
                });

                const fname       = document.getElementById('feedbackFname').value.trim();
                const lname       = document.getElementById('feedbackLname').value.trim();
                const email       = document.getElementById('feedbackEmail').value.trim();
                const phone       = document.getElementById('feedbackPhone').value.trim();
                const rating      = document.getElementById('feedbackRating').value;
                const nationality = document.getElementById('feedbackNationality').value;
                const message     = document.getElementById('feedbackMessage').value.trim();
                const firstVisit  = document.querySelector('input[name="first_visit"]:checked');
                const submitBtn   = document.getElementById('feedbackSubmitBtn');

                let hasError = false;

                function showError(fieldId, errorId, msg) {
                    document.getElementById(fieldId).classList.add('is-invalid');
                    const el = document.getElementById(errorId);
                    el.querySelector('strong').textContent = msg;
                    el.style.display = 'block';
                    hasError = true;
                }

                if (!fname)       showError('feedbackFname',       'fnameError',       '@lang("home.name_required")');
                if (!lname)       showError('feedbackLname',       'lnameError',       '@lang("home.name_required")');
                if (!email) {
                    showError('feedbackEmail', 'emailError', '@lang("home.email_required")');
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    showError('feedbackEmail', 'emailError', '@lang("home.email_invalid")');
                }
                if (!phone)       showError('feedbackPhone',       'phoneError',       '@lang("home.phone_required")');
                if (!rating)      showError('feedbackRating',      'ratingError',      '@lang("home.feedback_rating_required")');
                if (!nationality) showError('feedbackNationality', 'nationalityError', '@lang("home.feedback_nationality_required")');
                if (!firstVisit) {
                    const el = document.getElementById('firstVisitError');
                    el.querySelector('strong').textContent = '@lang("home.feedback_first_visit_required")';
                    el.style.display = 'block';
                    hasError = true;
                }
                if (!message) {
                    showError('feedbackMessage', 'messageError', '@lang("home.message_required")');
                } else if (message.length < 10) {
                    showError('feedbackMessage', 'messageError', '@lang("home.message_min")');
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
                { field: 'feedbackFname',       error: 'fnameError'       },
                { field: 'feedbackLname',       error: 'lnameError'       },
                { field: 'feedbackEmail',       error: 'emailError'       },
                { field: 'feedbackPhone',       error: 'phoneError'       },
                { field: 'feedbackRating',      error: 'ratingError'      },
                { field: 'feedbackNationality', error: 'nationalityError' },
                { field: 'feedbackMessage',     error: 'messageError'     },
            ].forEach(function({ field, error }) {
                document.getElementById(field).addEventListener('input', function() {
                    this.classList.remove('is-invalid');
                    document.getElementById(error).style.display = 'none';
                });
                document.getElementById(field).addEventListener('change', function() {
                    this.classList.remove('is-invalid');
                    document.getElementById(error).style.display = 'none';
                });
            });

            document.querySelectorAll('input[name="first_visit"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    document.getElementById('firstVisitError').style.display = 'none';
                });
            });
        </script>
    @endpush

@endsection
