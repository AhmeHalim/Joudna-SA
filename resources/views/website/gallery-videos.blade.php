@extends('website.layouts.main')
@section('title')
    <title>{{$settings->site_name}} | @lang('home.gallery_videos')</title>
@endsection

@section('content')
    @include('website.partials.pagesSections.breadcrumb', [
        'title' => __('home.gallery_videos'),
        'items' => [
            ['label' => __('home.gallery_videos')]
        ]
    ])

    <!-- Page Video Gallery Start -->
    <div class="page-video-gallery">
        <div class="container">
            <div class="row">
                @foreach($generalAlbum->videos as $key=>$video)
                    <div class="col-lg-4 col-md-6">
                        <!-- image gallery start -->
                        <div class="video-gallery-image wow fadeInUp">
                            <a href="{{WebsiteHelper::getImage('album_videos_cover', video->$video_url )}}" class="popup-video" data-cursor-text="Play">
                                <figure>
                                    <img src="{{WebsiteHelper::getImage('album_videos_cover', $video->image )}}" alt="" />
                                </figure>
                            </a>
                        </div>
                        <!-- image gallery end -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Page Video Gallery End -->

@endsection
