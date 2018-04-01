@extends('themes.'.$theme.'.index')

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