@extends('website.layouts.main')
@section('title')
    <title>{{$settings->site_name}} | @lang('home.book_table')</title>
@endsection

@section('content')
    @include('website.partials.pagesSections.breadcrumb', [
        'title' => __('home.book_table'),
        'items' => [
            ['label' => __('home.book_table')]
        ]
    ])

    <!-- Page Book Table Start -->
    <div class="page-book-table">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <!-- Book Table Image Start -->
                    <div class="book-table-image">
                        <figure class="image-anime">
                            <img src="{{ WebsiteHelper::getAsset('images/bg/menu2.webp') }}" alt="@lang('home.book_table')" />
                        </figure>
                    </div>
                    <!-- Book Table Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- Book Table Content Start -->
                    <div class="book-table-content">

                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">@lang('home.book_table')</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">
                                @lang('home.book_table_form_title')
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">
                                @lang('home.book_table_form_desc')
                            </p>
                            <p class="wow fadeInUp" data-wow-delay="0.4s">
                                <b>
                                    @lang('home.book_table_call_us')
                                        <a href="tel:{{ $settings->phone1 }}">{{ $settings->phone1 }}</a>
                                        @lang('home.book_table_or_form')
                                </b>
                            </p>
                        </div>
                        <!-- Section Title End -->

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

                        <!-- Contact Us Form Start -->
                        <div class="contact-us-form wow fadeInUp" data-wow-delay="0.6s">
                            <form
                                id="bookingForm"
                                action="{{ route('website.book-table-save') }}"
                                method="POST"
                            >
                                @csrf
                                <div class="row">

                                    <!-- First Name -->
                                    <div class="form-group col-md-6 mb-5">
                                        <input
                                            type="text"
                                            name="fname"
                                            class="form-control @error('fname') is-invalid @enderror"
                                            id="bookingFname"
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
                                            id="bookingLname"
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
                                            id="bookingEmail"
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
                                            id="bookingPhone"
                                            placeholder="@lang('home.phone')"
                                            value="{{ old('phone') }}"
                                            autocomplete="off"
                                        />
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span class="invalid-feedback" id="phoneError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- Date -->
                                    <div class="form-group col-md-6 mb-5">
                                        <input
                                            type="date"
                                            name="date"
                                            class="form-control @error('date') is-invalid @enderror"
                                            id="bookingDate"
                                            value="{{ old('date') }}"
                                        />
                                        @error('date')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span class="invalid-feedback" id="dateError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- Time -->
                                    <div class="form-group col-md-6 mb-5">
                                        <select
                                            name="time"
                                            class="form-control form-select @error('time') is-invalid @enderror"
                                            id="bookingTime"
                                        >
                                            <option value="" disabled selected>@lang('home.book_time')</option>
                                            <option value="06:30 PM" {{ old('time') == '06:30 PM' ? 'selected' : '' }}>06:30 PM</option>
                                            <option value="07:00 PM" {{ old('time') == '07:00 PM' ? 'selected' : '' }}>07:00 PM</option>
                                            <option value="07:30 PM" {{ old('time') == '07:30 PM' ? 'selected' : '' }}>07:30 PM</option>
                                            <option value="08:00 PM" {{ old('time') == '08:00 PM' ? 'selected' : '' }}>08:00 PM</option>
                                            <option value="08:30 PM" {{ old('time') == '08:30 PM' ? 'selected' : '' }}>08:30 PM</option>
                                            <option value="09:00 PM" {{ old('time') == '09:00 PM' ? 'selected' : '' }}>09:00 PM</option>
                                        </select>
                                        @error('time')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span class="invalid-feedback" id="timeError" style="display: none;"><strong></strong></span>
                                    </div>

                                    <!-- Submit -->
                                    <div class="col-lg-12">
                                        <div class="book-table-btn">
                                            <button type="submit" id="bookingSubmitBtn" class="btn-default">
                                                @lang('home.book_table')
                                            </button>
                                            <div id="msgSubmit" class="h3 hidden"></div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- Contact Us Form End -->

                    </div>
                    <!-- Book Table Content End -->
                </div>

            </div>
        </div>
    </div>
    <!-- Page Book Table End -->

    @push('scripts')
        <script>
            document.getElementById('bookingForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Clear previous errors
                ['bookingFname', 'bookingLname', 'bookingEmail', 'bookingPhone', 'bookingDate', 'bookingTime'].forEach(function(id) {
                    document.getElementById(id).classList.remove('is-invalid');
                });
                ['fnameError', 'lnameError', 'emailError', 'phoneError', 'dateError', 'timeError'].forEach(function(id) {
                    document.getElementById(id).style.display = 'none';
                });

                const fname     = document.getElementById('bookingFname').value.trim();
                const lname     = document.getElementById('bookingLname').value.trim();
                const email     = document.getElementById('bookingEmail').value.trim();
                const phone     = document.getElementById('bookingPhone').value.trim();
                const date      = document.getElementById('bookingDate').value;
                const time      = document.getElementById('bookingTime').value;
                const submitBtn = document.getElementById('bookingSubmitBtn');

                let hasError = false;

                function showError(fieldId, errorId, msg) {
                    document.getElementById(fieldId).classList.add('is-invalid');
                    const el = document.getElementById(errorId);
                    el.querySelector('strong').textContent = msg;
                    el.style.display = 'block';
                    hasError = true;
                }

                if (!fname)  showError('bookingFname', 'fnameError', '@lang("home.name_required")');
                if (!lname)  showError('bookingLname', 'lnameError', '@lang("home.name_required")');
                if (!email) {
                    showError('bookingEmail', 'emailError', '@lang("home.email_required")');
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    showError('bookingEmail', 'emailError', '@lang("home.email_invalid")');
                }
                if (!phone)  showError('bookingPhone', 'phoneError', '@lang("home.phone_required")');
                if (!date)   showError('bookingDate',  'dateError',  '@lang("home.book_date_required")');
                if (!time)   showError('bookingTime',  'timeError',  '@lang("home.book_time_required")');

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
                { field: 'bookingFname', error: 'fnameError' },
                { field: 'bookingLname', error: 'lnameError' },
                { field: 'bookingEmail', error: 'emailError' },
                { field: 'bookingPhone', error: 'phoneError' },
                { field: 'bookingDate',  error: 'dateError'  },
                { field: 'bookingTime',  error: 'timeError'  },
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
        </script>
    @endpush
@endsection
