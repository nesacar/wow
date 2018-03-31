@extends('themes.'.$theme.'.index')

@section('content')
    <div style="position: relative;">
        <section  class="col-md-13 article">
            @php $pages = $posts; @endphp
            @include('themes.'.$theme.'.partials.articles-tag')
        </section>
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