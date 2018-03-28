<?php
$top = \App\Post::getRandom(0, 8);
if(empty($top)) return;
?>
<section class="most-read">
    <h2>Most read</h2>
    <ul>
        <?php foreach($top as $p) { ?>
        <li><a href="{{ url() }}"><span>»</span> <?= $p['title'] ?></a></li>
        <?php } ?>
    </ul>
</section>