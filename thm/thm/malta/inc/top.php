<?php
$top = Box::getTop(8);
if(empty($top)) return;
?>
<section class="most-read">
  <h2>Most read</h2>
  <ul>
  <?php foreach($top as $p) { ?>
	  <li><a href="<?= Page::getLink($p) ?>"><span>»</span> <?= $p['title'] ?></a></li>
	<?php } ?>
  </ul>
</section>