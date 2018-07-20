<?php if(empty($featured)) return; ?>

<section class="col-md-13 featured">
    @foreach($featured as $p)
    <article class="col-md-article">
        <div class="relative">
            <a href="{{ url($p->link) }}">
                <img src="{{ Imagecache::get($p->image, '540x360')->src }}" alt="{{ $p->title }}">
            </a>
            <a href="{{ url($p->link) }}"><h3>{{ $p->title }}</h3></a>
        </div>
        <p>{!! $p->short !!}</p>
    </article>
    @endforeach
</section>