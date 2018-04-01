@extends('themes.'.$theme.'.index')

@section('title')
    WowMalta - {{ $category->seotitle }}
@endsection

@section('seo_social_stuff')
    <meta name="description" content="{!! $category->short !!}" />
    <meta name="keywords" content="{{ $category->seokeywords }}" />
    <meta name="author" content="Mini STUDIO Publishing Group">

    <!-- Facebok Open Graph -->
    <meta property="og:title" content="{{ $category->seotitle }}"/>
    <meta property="og:image" content="{{ url('themes/'.$theme.'/img/WowMalta.jpg') }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ url($category->title) }}"/>
    <meta property="og:site_name" content="{{ $category->seotitle }}"/>
    <meta property="og:description" content="{!! $category->short !!}" />
    <!-- Facebok Open Graph Kraj-->

    <!-- ITEM za GOOGLE + -->
    <meta itemprop="name" content="{{ $category->seotitle }}" />
    <meta itemprop="description" content="{!! $category->short !!}" />
    <meta itemprop="image" content="{{ url('themes/'.$theme.'/img/WowMalta.jpg') }}" />
    <!-- ITEM za GOOGLE + END -->

    <!-- ITEM Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@wowmalta">
    <meta name="twitter:creator" content="@wowmalta">
    <meta name="twitter:title" content="{{ $category->seotitle }}">
    <meta name="twitter:description" content="{!! $category->short !!}">
    <meta name="twitter:image" content="{{ url('themes/'.$theme.'/img/WowMalta.jpg') }}">
    <!-- ITEM Twitter END -->
@endsection

@section('content')
    @include('themes.'.$theme.'.partials.slider')

    <aside class="col-md-14">
        @php $bannerIndex = "D1"; @endphp
        @include('themes.'.$theme.'.partials.revive')
    </aside>

    <section class="col-md-13 article">
        @php $pages = $posts->slice(0,8); @endphp
        @include('themes.'.$theme.'.partials.articles')
    </section>

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

    <section class="col-md-13 article">
        @php $pages = $posts->slice(8,20); @endphp
        @include('themes.'.$theme.'.partials.articles')

        <div class="text-center">
            {{ $posts->links() }}
        </div>
    </section>

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