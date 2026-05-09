@extends('website.layouts.main')
@section('title')
    <title>{{$settings->site_name}} | @lang('home.gallery_images')</title>
@endsection

@section('content')
    @include('website.partials.pagesSections.breadcrumb', [
        'title' => __('home.gallery_images'),
        'items' => [
            ['label' => __('home.gallery_images')]
        ]
    ])

    <!-- Photo Gallery Section Start -->
    <div class="page-gallery">
        <div class="container">
            <!-- gallery section start -->
            <div class="row gallery-items page-gallery-box">

                @foreach($generalAlbum->images??[] as $key=>$image)
                    <div class="col-lg-4 col-6">
                        <!-- image gallery start -->
                        <div class="photo-gallery wow fadeInUp">
                            <a href="{{WebsiteHelper::getImage('album_images', $image->image )}}" data-cursor-text="@lang('home.view')">
                                <figure class="image-anime">
                                    <img src="{{WebsiteHelper::getImage('album_images', $image->image )}}" alt="album-image-{{$key+1}}" />
                                </figure>
                            </a>
                        </div>
                        <!-- image gallery end -->
                    </div>
                @endforeach

            </div>
            <!-- gallery section end -->
        </div>
    </div>
    <!-- Photo Gallery Section End -->

@endsection
