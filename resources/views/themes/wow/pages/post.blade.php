@extends('themes.'.$theme.'.index')

@section('content')
    <div style="position: relative;">
        <section  class="col-md-13 gallery">
            <div class="overflow">
                <span class="category-top">
                    <a href="{{ url($category->slug) }}">{{ $category->title }}</a>
                </span>
            </div>
            <h1>{{ $post->title }}</h1>

            @include('themes.'.$theme.'.partials.gallery')

            {!! $post->body !!}

            @include('themes.'.$theme.'.partials.addthis')
            @include('themes.'.$theme.'.partials.keywords')

            @php $bannerIndex = "C1"; @endphp
            @include('themes.'.$theme.'.partials.revive')

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