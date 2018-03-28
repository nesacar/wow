<?php if(empty($pageList)) return; ?>

<?php
foreach($pageList as $p) {
  $link = Page::getLink($p);
?>
<article>
  <a href="<?= $link ?>"><img src="<?= SURI ?>image.php/<?= basename($p['timg']) ?>?width=559&height=373&cropratio=559:373&image=<?= SURI . $p['timg'] ?>" alt="<?= $p['title'] ?>"></a>
  <?php if(false) { ?><a href="<?= $link ?>"><img src="<?= SURI . $p['timg'] ?>" alt="<?= $p['title'] ?>"></a><?php } ?>
  <span class="gery"><?= Common::datum_en($p['published']) ?></span>
  <a href="<?= $catLinks[$p['cat']] ?>"><?= $catNames[$p['cat']] ?></a>
  <h3><a href="<?= $link ?>"><?= $p['title'] ?></a></h3>
  <p><?= $p['descr'] ?></p>
  <!--<p class="jos">» <a href="<?= $link ?>">Read more...</a></p> -->
</article>
<?php } ?>
