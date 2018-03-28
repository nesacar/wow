@if(count($highlights)>0)
<section class="category-list col-md-12">
    @php $br=0; @endphp
    @foreach($highlights as $cat)
        <article class="col-md-list @if(++$br==3) margin-right @endif">
            <h2>{{ $cat->title }}</h2>
            @if(count($cat->posts))
            <div class="relative">
                <a href="{{ url($cat->slug.'/'.$cat->posts->first()->slug.'/'.$cat->posts->first()->id) }}">
                    <img src="{{ $cat->posts->first()->image }}" alt="{{ $cat->posts->first()->title }}">
                </a>
                <a href="{{ url($cat->slug.'/'.$cat->posts->first()->slug.'/'.$cat->posts->first()->id) }}"><h3 style="color: #fff !important">{{ $cat->posts->first()->title }}</h3></a>
            </div>
            <ul>
                @foreach($cat->posts->slice(1,5) as $post)
                <li><a href="{{ url($post->category.'/'.$post->slug.'/'.$post->id) }}"><span>»</span> {{ $post->title }}</a></li>
                @endforeach
            </ul>
            @endif
        </article>
    @endforeach
</section>
@endif