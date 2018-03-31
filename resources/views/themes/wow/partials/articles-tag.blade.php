@if(count($pages)>0)
    @foreach($pages as $p)
        <article>
            <a href="{{ url($p->link) }}">
                <img src="{{ Imagecache::get($p->image, '540x360')->src }}" alt="{{ $p->title }}">
            </a>
            <span class="gery">{{ \Carbon\Carbon::parse($p->publish_at)->format('M d, Y') }}</span>
            <a href="{{ url($p->category) }}">{{ $p->categoryTitle }}</a>
            <h3><a href="{{ url($p->link) }}">{{ $p->title }}</a></h3>
            <p>{{ $p->short }}</p>
        </article>
    @endforeach
@else
    <article>
        <p>
            No results.
        </p>
    </article>
@endif