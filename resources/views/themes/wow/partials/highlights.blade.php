@if(count($highlights)>0)
<section class="category-list col-md-12">
    @php $br=0; @endphp
    @foreach($highlights as $cat)
        <article class="col-md-list @if(++$br==3) margin-right @endif">
            <h2>{{ $cat->title }}</h2>
            @if(count($cat->posts))
                <div class="relative">
                    <a href="{{ url($cat->post()->first()->link) }}">
                        <img src="{{ Imagecache::get($cat->post()->first()->image, '540x360')->src }}" alt="{{ $cat->posts->first()->title }}">
                    </a>
                    <a href="{{ url($cat->post()->first()->link) }}"><h3 style="color: #fff !important">{{ $cat->posts->first()->title }}</h3></a>
                </div>
                <ul>
                    @foreach($cat->posts->slice(1,5) as $post)
                        <li><a href="{{ url($post->link) }}"><span>»</span> {{ $post->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </article>
    @endforeach
</section>
@endif