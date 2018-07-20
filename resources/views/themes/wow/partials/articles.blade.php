@if(count($pages)>0)
    @foreach($pages as $p)
        <article>
            <a href="{{ url($p->link) }}">
                <img src="{{ Imagecache::get($p->image, '540x360')->src }}" alt="{{ $p->title }}">
            </a>
            <span class="gery">{{ \Carbon\Carbon::parse($p->publish_at)->format('M d, Y') }}</span>
            @if(!empty($category))
                <a href="{{ url($category->slug) }}">{{ $category->title }}</a>
            @else
                <a href="{{ url($town->slug) }}">{{ $town->title }}</a>
            @endif
            <h3><a href="{{ url($p->link) }}">{{ $p->title }}</a></h3>
            <p>{!! $p->short !!}</p>
        </article>
    @endforeach
@endif