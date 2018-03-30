<!-- Sidebar -->
<div id="sidebar-wrapper">
    <a href="#close-toggle" id="close-toggle"><img src="https://www.wowmalta.com.mt/thm/malta/img/close.png"></a>
    <ul class="sidebar-nav">
        <li><a href="https://www.wowmalta.com.mt/" class='current'>HOME</a></li>
        @if(count($cats)>0)
            @foreach($cats as $cat)
                <li><a href="{{ url($cat->slug) }}">{{ $cat->title }}</a></li>
            @endforeach
        @endif
    </ul>
</div> <!-- /#sidebar-wrapper -->