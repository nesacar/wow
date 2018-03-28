<section class="category-list col-md-12">
<?php
if(!empty($highlights)) $highlights = array_slice($highlights,0,3);
$i=0;
foreach($highlights as $hl) {
?>
  <article class="col-md-list <?= ++$i==3 ? "margin-right":"" ?>">
    <h2><?= $hl['cat']['title'] ?></h2>

    <?php
      $p = reset($hl['pages']);
    ?>
    <div class="relative">
      <a href="<?= Page::getLink($p) ?>"><img src="<?= SURI ?>image.php/<?= basename($p['timg']) ?>?width=559&height=373&cropratio=559:373&image=<?= SURI . $p['timg'] ?>" alt="<?= $p['title'] ?>"></a>
      <?php if(false) { ?><a href="<?= Page::getLink($p) ?>"><img src="<?= SURI . $p['timg'] ?>" alt="<?= $p['title'] ?>"></a><?php } ?>
      <!--<h3><?= $p['title'] ?></h3>-->
       <a href="<?= $link ?>"><h3 style="color: #fff !important"><?= $p['title'] ?></h3></a>
    </div>
    <ul>
    <?php while($p = next($hl['pages'])) { ?>
      <li><a href="<?= Page::getLink($p) ?>"><span>»</span> <?= $p['title'] ?></a></li>
    <?php } ?>
    </ul>
  </article>
<?php
}
?>
</section>