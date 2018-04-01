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
    <meta name="description" content="@yield('desc')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="Mini STUDIO Publishing Group">

    <!-- Facebok Open Graph -->
    <meta property="og:title" content="{{ @$seo['title'] }}"/>
    @if(!empty($cat) && $cat['image'] != null)
    <meta property="og:image" content="{{ $cat['image'] }}"/>
    @else
    <meta property="og:image" content="{{ @$seo['main_img'] }}"/>
    @endif
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ @$seo['url'] }}"/>
    <meta property="og:site_name" content="{{ @$seo['title'] }}"/>
    <meta property="og:description" content="{{ @$seo['descr'] }}" />
    <!-- Facebok Open Graph Kraj-->

    <!-- ITEM za GOOGLE + -->
    <meta itemprop="name" content="{{ @$seo['title'] }}" />
    <meta itemprop="description" content="{{ @$seo['descr'] }}" />
    <meta itemprop="image" content="{{ @$seo['main_img'] }}" />
    <!-- ITEM za GOOGLE + END -->

    <!-- ITEM Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@wowmalta">
    <meta name="twitter:creator" content="@wowmalta">
    <meta name="twitter:title" content="{{ @$seo['title'] }}">
    <meta name="twitter:description" content="{{ @$seo['descr'] }}">
    <meta name="twitter:image" content="{{ @$seo['main_img'] }}">
    <!-- ITEM Twitter END -->

    <meta name="google-site-verification" content="udApUfIVWbgCI9pjeC4JZYLdD1JQ-Bzgo6vKHwXVzBs" />

    {{--{!! HTML::style('themes/'.$theme.'/css/bootstrap.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/style.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/forms.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/navigation.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/font-awesome.min.css') !!}--}}
    {{--{!! HTML::style('themes/'.$theme.'/css/simple-sidebar.css') !!}--}}
    {!! HTML::style('themes/'.$theme.'/css/all.css') !!}

    @yield('header')

    <!-- Fav and touch icons -->
    <link rel="icon" type="image/x-icon" href="{{ url('themes/'.$theme.'/img/favicon.png') }}" />
    {{--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon.png" />--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon.png" />--}}
    {{--<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png" />--}}
    <link rel="shortcut icon" href="{{ url('themes/'.$theme.'/img/favicon.ico') }}" />
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



    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7SZWGZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="wrapper">
    @include('themes.'.$theme.'.partials.nav-sidebar')
    <div id="page-content-wrapper">
        @include('themes.'.$theme.'.partials.header')

        <div class="container" id="main-container">
            <div class="clearfix">
                <div class="col-md-12">
                    <div class="poljeMBH3">

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
