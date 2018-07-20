@if(empty($sliders)) return; @endif

<div class="col-md-13 column">
    <div class="image-box">
        <ul class="bxslider">
            @foreach($sliders as $p)
                <li>
                    <a href="{{ url($p->link) }}">
                        <img src="{{ Imagecache::get($p->image, '480x250')->src }}" alt="{{ $p->title }}" title="#slider_caption_{{ $p->id }}" />
                    </a>
                    <a href="{{ url($p->link) }}"><h2>{{ $p->title }}</h2></a>
                    <p>{!! $p->short !!}</p>
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