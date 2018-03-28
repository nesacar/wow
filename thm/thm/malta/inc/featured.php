<?php if(empty($pageList)) return; ?>

<section class="col-md-13 featured">
<?php
foreach($pageList as $p) {
  $link = Page::getLink($p);
?>
  <article class="col-md-article">
    <div class="relative">
      <a href="<?= $link ?>"><img src="<?= SURI ?>image.php/<?= basename($p['timg']) ?>?width=559&height=373&cropratio=559:373&image=<?= SURI . $p['timg'] ?>" alt="<?= $p['title'] ?>"></a>
      <?php if(false) { ?><a href="<?= $link ?>"><img src="<?= SURI . $p['timg'] ?>" alt="<?= $p['title'] ?>"></a><?php } ?>
      <a href="<?= $link ?>"><h3><?= $p['title'] ?></h3></a>
    </div>
    <p><?= $p['descr'] ?></p>
  </article>
<?php } ?>
</section>