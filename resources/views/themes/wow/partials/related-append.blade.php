@if(count($related))
    @foreach($related as $r)
        <article>
            <a href="{{ url($r->link) }}"><img src="{{ Imagecache::get($r->image, '540x360')->src }}" alt="{{ $r->title }}"></a>
            <span class="gery">{{ \Carbon\Carbon::parse($r->publish_at)->format('M d, Y') }}</span>&nbsp;<a href="{{ url($category->slug) }}">{{ $category->title }}</a>
            <h3><a href="{{ url($r->link) }}">{{ $r->title }}</a></h3>
            <p>{{ $r->short }}</p>
            <p class="jos">» <a href="{{ url($r->link) }}">Read more...</a></p>
        </article>
    @endforeach
@endif