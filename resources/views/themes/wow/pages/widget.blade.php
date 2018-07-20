<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('desc')" />
    <link href="{{ url('themes/'.$theme.'/css/widget.css') }}" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('themes/'.$theme.'/js/widget.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var wtimer, wt = 3000;
            $('.infiniteCarousel').infiniteCarousel().mouseenter(function(){clearInterval(wtimer);$('.arrow').fadeIn()}).mouseleave(function(){$('.arrow').fadeOut();wtimer = setInterval(function(){$('.infiniteCarousel').trigger('next')}, wt)});
            wtimer = setInterval(function(){$('.infiniteCarousel').trigger('next')}, wt);
        })
    </script>
</head>
<body>
<div id='widget'>
    <div class='infiniteCarousel'>
        <div class='wrapper'>
            <ul>
                <li><a href="{{ url('/') }}" target='_blank'><img class='abstract' src="{{ url('themes/'.$theme.'/img/widget/home1.jpg') }}" /></a></li>
                @foreach($posts as $p)
                <li>
                    <a href="{{ url($p->category.'/'.$p->slug) }}" target='_blank'>
                        <img class="abstract" src="{{ url($p->widget_image) }}" alt="{{ $p->title }}">
                    </a>
                    @if(!empty($posts->widget_text))
                        <a class='title' href='{{ url($p->category.'/'.$p->slug) }}' target='_blank'>
                            {{ $p->title }}
                        </a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        <a id='head' href='{{ url('/') }}' target='_blank'></a>
    </div>
</div>
</body>
</html>