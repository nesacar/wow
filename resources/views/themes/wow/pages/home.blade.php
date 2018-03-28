@extends('themes.'.$theme.'.index')

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

        <?php

//        include "inc/aside-brands.php";
//        include "inc/aside-fb.php";
//        include "inc/social-buttons.php";

        ?>
    </aside>
@endsection