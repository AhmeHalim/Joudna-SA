<x-dashboard.layout :title="__('dash.add_category')">

    <form method="post" action="{{ route('categories.store') }}" class="form d-flex flex-column flex-lg-row" data-kt-redirect="{{ route('categories.index') }}" enctype="multipart/form-data">
        @csrf

        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

            <x-dashboard.partials.html.image_input
                :title="'Upload Image'"
                :name="'image'"
                :description="'Only *.png, *.jpg, and *.jpeg image files are accepted.'"
                :changeImageText="'Change Image'"
                :cancelImageText="'Cancel Image'"
                :removeImageText="'Remove Image'"
                :acceptedText="'image files are accepted'"
            />

            <x-dashboard.partials.html.status_select
                :model="'categories'"
            />
        </div>

        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-body pt-0">

                                <div class="d-flex flex-wrap gap-5">
                                    @foreach(config('languages') as $lang => $languageName)
                                        <x-dashboard.partials.html.input
                                            name="name_{{ $lang }}"
                                            label="{{ __('dash.name') }} ({{ __($languageName) }})"
                                            :value="old('name_' . $lang, '')"
                                            placeholder="{{ __('dash.Enter the name in') }} {{ __($languageName) }}" />
                                    @endforeach
                                </div>

                                {{-- Home Publish --}}
                                <div class="d-flex flex-wrap gap-5">
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-6 text-md-end">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>@lang('dash.home_publish')</span>
                                                <span class="ms-1" data-bs-toggle="tooltip">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mt-3">
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" name="home" @checked(old('home') == 1)>
                                                    <label class="form-check-label">@lang('dash.yes')</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" name="home" @checked(old('home') == 0)>
                                                    <label class="form-check-label">@lang('dash.no')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('categories.index') }}" class="btn btn-light me-5">{{ __('dash.Cancel') }}</a>
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">{{ __('dash.Save Changes') }}</span>
                    <span class="indicator-progress">{{ __('dash.Please wait...') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </form>

</x-dashboard.layout>
