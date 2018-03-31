<?php
if(empty($related)) return;
?>
<h2>Related topics</h2>
@foreach($related as $r)
    <article>
        <a href="{{ url($r->link) }}"><img src="{{ Imagecache::get($r->image, '540x360')->src }}" alt="{{ $r->title }}"></a>
        <span class="gery">{{ \Carbon\Carbon::parse($r->publish_at)->format('M d, Y') }}</span>&nbsp;<a href="{{ url($category->slug) }}">{{ $category->title }}</a>
        <h3><a href="{{ url($r->link) }}">{{ $r->title }}</a></h3>
        <p>{{ $r->short }}</p>
        <p class="jos">» <a href="{{ url($r->link) }}">Read more...</a></p>
    </article>
@endforeach

@if(true)
<div class="show-more" id="related_scroll_end">
    <img src="{{ url('themes/'.$theme.'/img/arr.png') }}" alt="load more">
</div>


<!-- Skripta za ucitavanje na kraju scroll-a -->
<script type="text/javascript">
    var rel_los_sem = false; //semaphore
    var rel_los_page = 1;
    $('#related_scroll_end').click(rel_loadOnScroll);
    //$(window).scroll(function(){if(!rel_los_sem && $(window).scrollTop()+$(window).height() >= $('#related_scroll_end').position().top) rel_loadOnScroll();});
    function rel_loadOnScroll(){
        if(rel_los_sem) return;
        rel_los_sem = true; rel_los_page++;
        $.post("{{ url('scroll_related') }}",{_token: '{{ csrf_token() }}', category:'{{ $category->id }}', limit:'10', page: rel_los_page, exclude:'{{ $post->id }}'},
            function(data){if(data=='empty') {$('#related_scroll_end').slideUp(); return;} $('#related_scroll_end').before(data); rel_los_sem=false; console.log(data);});
    }
</script>

<!-- Related can be by: home, category or brand (pgt scroll is not related...) -->

@endif