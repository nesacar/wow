<?php
if(empty($brand) || empty($brandRelated)) return;
?>
<section class="mycollection">
  <a href="<?= ADRURI . $brand['furl'] ?>">
    <img src="<?= SURI ?>image.php/<?= basename($brand['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $brand['logo'] ?>" alt="<?= $brand['title'] ?>" />
  </a>
  <ul>
  <?php foreach($brandRelated as $p) { ?>
  	<li><a href="<?= Page::getLink($p) ?>"><span class='green'>»</span>&nbsp;<?= $p['title'] ?></a></li>
  <?php } ?>
  </ul>
</section>