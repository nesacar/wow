<?php
if(empty($gdkNav)) $gdkNav = GdkCategory::getList();
if(empty($gdkNav)) return;
?>

<section class="links">
  <a href="<?= GDKURI ?>"><h2>Gde da kupim</h2></a>
  <ul>
  <?php foreach($gdkNav as $c) { ?>
  	<li><a href="<?= GDKURI . $c['furl'] ?>"><?= $c['title'] ?></a></li>
  <?php } ?>
  </ul>
</section>
