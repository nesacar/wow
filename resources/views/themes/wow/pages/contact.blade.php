@extends('themes.'.$theme.'.index')

@section('title')
    {{ $post->title }} WowMalta - {{ $settings->title }}
@endsection

@section('style')
    <style>
        .article-form input[type="text"]{
            border: 1px solid #18a5a6;
        }

        .article-form textarea{
            width: 99%;
            border: 1px solid #18a5a6;
        }

        .article-form input::-webkit-input-placeholder, .article-form input::-moz-placeholder, .article-form input:-ms-input-placeholder {
            color: #18a5a6;
        }
    </style>
@endsection

@section('seo_social_stuff')
    <meta name="description" content="{!! $settings->desc !!}"/>
    <meta name="keywords" content="{{ $settings->keywords }}"/>
    <meta name="author" content="Mini STUDIO Publishing Group">

    <!-- Facebok Open Graph -->
    <meta property="og:title" content="{{ $settings->title }}"/>
    <meta property="og:image" content="{{ url('themes/'.$theme.'/img/WowMalta.jpg') }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ url('contact') }}"/>
    <meta property="og:site_name" content="{{ $settings->title }}"/>
    <meta property="og:description" content="{!! $settings->desc !!}"/>
    <!-- Facebok Open Graph Kraj-->

    <!-- ITEM za GOOGLE + -->
    <meta itemprop="name" content="{{ $settings->title }}"/>
    <meta itemprop="description" content="{!! $settings->desc !!}"/>
    <meta itemprop="image" content="{{ url('themes/'.$theme.'/img/WowMalta.jpg') }}"/>
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
    <div style="position: relative;">
        <section class="col-md-13 gallery">
            <div class="overflow">
                <span class="category-top">
                    <a href="{{ url($category->slug) }}">{{ $category->title }}</a>
                </span>
            </div>
            <h1>{{ $post->title }}</h1>

            @include('themes.'.$theme.'.partials.gallery')

            {!! $post->body !!}

            <p>
            @if($errors->any())
                <ul class="alert alert-danger" id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            </p>

            <p>
            <form class="article-form" action="{{ route('contact') }}" method="POST">
                @csrf
                <h3 style="color: #18a5a6; font-size: 22px;">Contact us</h3>
                <input type="text" name="name" value="" placeholder="Name" required>
                <input type="text" name="email" value="" placeholder="E-mail" required>
                <input type="text" name="country" value="" placeholder="Country" required>
                <input type="text" name="phone" value="" placeholder="Phone" required>
                <textarea id="message" name="message" placeholder="Message" required style="margin-bottom: 20px"></textarea>

                    {!! NoCaptcha::display() !!}

                <button type="submit" name="button">Submit</button>
            </form>
            </p>

            @include('themes.'.$theme.'.partials.addthis')
            @include('themes.'.$theme.'.partials.keywords')

            {{--@php $bannerIndex = "C1"; @endphp--}}
            {{--@include('themes.'.$theme.'.partials.revive')--}}

        </section><!-- gallery index -->
    </div>

    <aside class="col-md-14">
        <section>
            @php $bannerIndex = "D1"; @endphp
            @include('themes.'.$theme.'.partials.revive')
        </section>


        <section>
            @if(!$mobile)
                @php $bannerIndex = "D2"; @endphp
                @include('themes.'.$theme.'.partials.revive')
            @else
                @php $bannerIndex = "MD2"; @endphp
                @include('themes.'.$theme.'.partials.revive')
            @endif
        </section>

        @include('themes.'.$theme.'.partials.wow-map')
        @include('themes.'.$theme.'.partials.map')
        @include('themes.'.$theme.'.partials.top')
        @include('themes.'.$theme.'.partials.social-buttons')

        <section>
            @if(!$mobile)
                @php $bannerIndex = "D3"; @endphp
                @include('themes.'.$theme.'.partials.revive')
            @else
                @php $bannerIndex = "MD3"; @endphp
                @include('themes.'.$theme.'.partials.revive')
            @endif
        </section>
    </aside>

    <section class="col-md-13 related-topic">
        @include('themes.'.$theme.'.partials.related')
    </section>

    <aside class="col-md-14">
        @php $bannerIndex = "D4"; @endphp
        @include('themes.'.$theme.'.partials.revive')
        @php $bannerIndex = "D5"; @endphp
        @include('themes.'.$theme.'.partials.revive')
        @include('themes.'.$theme.'.partials.aside-fb')
    </aside>

    @include('themes.'.$theme.'.partials.highlights')
@endsection