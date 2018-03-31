@if(count($tags)>0)
<div class="kljucnereci">
    <ul>
        <li><span class="green">Keywords:</span>&nbsp;</li>
        @foreach($tags as $tag)
            <li><a href="{{ url('tagcloud/'.$tag->slug) }}">{{ $tag->title }}</a></li><li>&nbsp;|&nbsp;</li>
        @endforeach
    </ul>
</div>
@endif