<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P7SZWGZ');
    </script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    @yield('seo_social_stuff')

    <meta name="google-site-verification" content="udApUfIVWbgCI9pjeC4JZYLdD1JQ-Bzgo6vKHwXVzBs" />

    {{--{!! HTML::style('themes/'.$theme.'/css/bootstrap.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/style.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/forms.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/navigation.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/font-awesome.min.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/simple-sidebar.css') !!}--}}
    {!! HTML::style('themes/'.$theme.'/css/all.css') !!}

    @yield('header')
    @yield('style')

    <!-- Fav and touch icons -->
    <link rel="icon" type="image/x-icon" href="{{ url('themes/'.$theme.'/img/favicon.png') }}" />
    {{--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon.png" />--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon.png" />--}}
    {{--<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png" />--}}
    <link rel="shortcut icon" href="{{ url('themes/'.$theme.'/img/favicon.ico') }}" />
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        .gallery {
            padding: 10px 10px 0 0;
        }
        .gallery p {
            line-height: 1.4;
        }
        .thumbs li {

            margin: 10px 20px 13px 0;
            width: 93px;
        }
        #bigFrame {
            width: 100%;
        }
        @media(max-width: 991px) {
            .gallery {
                padding-left: 10px !important;
            }
        }
    </style>
    @include('themes.'.$theme.'.partials.js')

    {!! $settings->analytics !!}

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7SZWGZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

@php $bannerIndex = "BL"; @endphp
@include('themes.'.$theme.'.partials.revive')
@php $bannerIndex = "BR"; @endphp
@include('themes.'.$theme.'.partials.revive')

<div id="wrapper">
    @include('themes.'.$theme.'.partials.nav-sidebar')
    <div id="page-content-wrapper">
        @include('themes.'.$theme.'.partials.header')

        <div class="container" id="main-container">
            <div class="clearfix">
                <div class="col-md-12">
                    <div class="poljeMBH3">
                        @php $bannerIndex = "BH3"; @endphp
                        @include('themes.'.$theme.'.partials.revive')
                    </div>
                </div>

                @yield('content')

                @include('themes.'.$theme.'.partials.footer-nav')
            </div>
        </div>

        @include('themes.'.$theme.'.partials.footer')
        @include('themes.'.$theme.'.partials.newsletter-popup')

        @yield('footer')

        <!-- Twitter universal website tag code -->
        <script>
            !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
            },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
                a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
            // Insert Twitter Pixel ID and Standard Event data below
            twq('init','nxeh3');
            twq('track','PageView');
        </script>
        <!-- End Twitter universal website tag code -->
    </div>
</div>

</body>
</html>
