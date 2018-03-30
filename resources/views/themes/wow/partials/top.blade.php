<?php
if(empty($top)) return;
?>
<section class="most-read">
    <h2>Most read</h2>
    <ul>
        <?php foreach($top as $p) { ?>
        <li><a href="{{ \App\Post::link($p) }}"><span>»</span> {{ $p->title }}</a></li>
        <?php } ?>
    </ul>
</section>