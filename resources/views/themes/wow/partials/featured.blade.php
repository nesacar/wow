<?php if(empty($featured)) return; ?>

<section class="col-md-13 featured">
    @foreach($featured as $p)
    <article class="col-md-article">
        <div class="relative">
            <a href="{{ url($p->slug.'/'.$p->id) }}">
                {!! HTML::Image($p->image, $p->title) !!}
            </a>
            <a href="{{ url($p->category.'/'.$p->slug.'/'.$p->id) }}"><h3>{{ $p->title }}</h3></a>
        </div>
        <p>{{ $p->short }}</p>
    </article>
    @endforeach
</section>