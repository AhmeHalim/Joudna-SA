<!-- Google Fonts Css-->
<link rel="preconnect" href="https://fonts.googleapis.com/" />
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Forum&amp;family=Jost:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet"/>


<!-- Bootstrap Css -->
<link href="{{ WebsiteHelper::getAsset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen" />
<!-- SlickNav Css -->
<link href="{{ WebsiteHelper::getAsset('css/slicknav.min.css') }}" rel="stylesheet" />
<!-- Swiper Css -->
<link rel="stylesheet" href="{{ WebsiteHelper::getAsset('css/swiper-bundle.min.css') }}" />
<!-- Font Awesome Icon Css-->
<link href="{{ WebsiteHelper::getAsset('css/all.min.css') }}" rel="stylesheet" media="screen" />
<!-- Animated Css -->
<link href="{{ WebsiteHelper::getAsset('css/animate.css') }}" rel="stylesheet" />
<!-- Magnific Popup Core Css File -->
<link rel="stylesheet" href="{{ WebsiteHelper::getAsset('css/magnific-popup.css') }}" />
<!-- Mouse Cursor Css File -->
<link rel="stylesheet" href="{{ WebsiteHelper::getAsset('css/mousecursor.css') }}" />
<!-- Main Custom Css -->
<link href="{{ WebsiteHelper::getAsset('css/custom.css') }}" rel="stylesheet" media="screen" />

@stack('styles')
