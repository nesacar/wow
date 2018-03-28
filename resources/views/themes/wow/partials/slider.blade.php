@if(empty($sliders)) return; @endif

@section('header')
    <link href="{{ url('themes/'.$theme.'/css/jquery.bxslider.css') }}" rel="stylesheet" />
@endsection

<div class="col-md-13 column">
    <div class="image-box">
        <ul class="bxslider">
            @foreach($sliders as $p)
                <li>
                    <a href="{{ $p->category.'/'.$p->slug.'/'.$p->id }}">
                        <img src="{{ url($p->sliderImage) }}" alt="{{ $p->title }}" title="#slider_caption_{{ $p->id }}" />
                    </a>
                    <a href="{{ $p->category.'/'.$p->slug.'/'.$p->id }}"><h2>{{ $p->title }}</h2></a>
                    <p>{{ $p->short }}</p>
                </li>
            @endforeach
        </ul>

    </div>
</div>

@section('footer')
    <script type="text/javascript" src="{{ url('themes/'.$theme.'/js/jquery.bxslider.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.bxslider').bxSlider();
        });
    </script>
@endsection