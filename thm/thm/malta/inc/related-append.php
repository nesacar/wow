<?php
if(empty($related)) return;
if(empty($catNames)) $catNames = Category::getNames();
if(empty($catLinks)) $catLinks = Category::getLinks();

foreach($related as $r) {
  $link = Page::getLink($r);
?>
  <article>
    <a href="<?= $link ?>"><img src="<?= SURI . $r['timg'] ?>" alt="<?= $r['title'] ?>"/></a>
    <span class="gery"><?= Common::datum_sr($r['published']) ?></span>&nbsp;<a href="<?= @$catLinks[$r['cat']] ?>"><?= @$catNames[$r['cat']] ?></a>
    <h3><a href="<?= $link ?>"><?= $r['title'] ?></a></h3>
    <p><?= $r['descr'] ?></p>
    <p class="jos">» <a href="<?= $link ?>">Read more...</a></p>
  </article>
<?php
}
?>

