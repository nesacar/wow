@extends('themes.'.$theme.'.index')

@section('title')
    WowMalta - {{ $settings->title }}
@endsection

@section('seo_social_stuff')
    <meta name="description" content="{!! $settings->desc !!}" />
    <meta name="keywords" content="{{ $settings->keywords }}" />
    <meta name="author" content="Mini STUDIO Publishing Group">

    <!-- Facebok Open Graph -->
    <meta property="og:title" content="{{ $settings->title }}"/>
    <meta property="og:image" content="{{ url('themes/'.$theme.'/img/WowMalta.jpg') }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ url('/') }}"/>
    <meta property="og:site_name" content="{{ $settings->title }}"/>
    <meta property="og:description" content="{!! $settings->desc !!}" />
    <!-- Facebok Open Graph Kraj-->

    <!-- ITEM za GOOGLE + -->
    <meta itemprop="name" content="{{ $settings->title }}" />
    <meta itemprop="description" content="{!! $settings->desc !!}" />
    <meta itemprop="image" content="{{ url('themes/'.$theme.'/img/WowMalta.jpg') }}" />
    <!-- ITEM za GOOGLE + END -->

    <!-- ITEM Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@wowmalta">
    <meta name="twitter:creator" content="@wowmalta">
    <meta name="twitter:title" content="{{ $settings->title }}">
    <meta name="twitter:description" content="{!! $settings->desc !!}">
    <meta name="twitter:image" content="{{ url('themes/'.$theme.'/img/WowMalta.jpg') }}">
    <!-- ITEM Twitter END -->
@endsection

@section('content')
    @include('themes.'.$theme.'.partials.slider')

    <aside class="col-md-14">
        @php $bannerIndex = "D1"; @endphp
        @include('themes.'.$theme.'.partials.revive')
    </aside>

    @php $featured = $posts->slice(0,8); @endphp
    @include('themes.'.$theme.'.partials.featured')

    <aside class="col-md-14">
        <section>
            @if(!$mobile) @php $bannerIndex = "D2"; @endphp @else @php $bannerIndex = "MD2"; @endphp @endif
            @include('themes.'.$theme.'.partials.revive')
        </section>

        @include('themes.'.$theme.'.partials.wow-map')
        @include('themes.'.$theme.'.partials.map')
        @include('themes.'.$theme.'.partials.top')
        @include('themes.'.$theme.'.partials.social-buttons')
    </aside>

    @include('themes.'.$theme.'.partials.highlights')

    @php $featured = $posts->slice(8,20); @endphp
    @include('themes.'.$theme.'.partials.featured')

    <aside class="col-md-14">
        <section>
            @if(!$mobile) @php $bannerIndex = "D3"; @endphp @else @php $bannerIndex = "MD3"; @endphp @endif
            @include('themes.'.$theme.'.partials.revive')
        </section>

        @php $bannerIndex = "D4"; @endphp
        @include('themes.'.$theme.'.partials.revive')
        @php $bannerIndex = "D5"; @endphp
        @include('themes.'.$theme.'.partials.revive')

        @include('themes.'.$theme.'.partials.aside-fb')
        @include('themes.'.$theme.'.partials.social-buttons')
    </aside>
@endsection