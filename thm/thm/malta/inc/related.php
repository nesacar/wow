<?php
if(empty($related)) return;
if(empty($catNames)) $catNames = Category::getNames();
if(empty($catLinks)) $catLinks = Category::getLinks();
?>
<h2>Related topics</h2>
<?php
foreach($related as $r) {
  $link = Page::getLink($r);
?>
  <article>
    <a href="<?= $link ?>"><img src="<?= SURI . $r['timg'] ?>" alt="<?= $r['title'] ?>"/></a>
    <span class="gery"><?= Common::datum_sr($r['published']) ?></span>&nbsp;<a href="<?= @$catLinks[$r['cat']] ?>"><?= @$catNames[$r['cat']] ?></a>
    <h3><a href="<?= $link ?>"><?= $r['title'] ?></a></h3>
    <p><?= $r['descr'] ?></p>
    <p class="jos">» <a href="<?= $link ?>">Pročitajte više...</a></p>
  </article>
<?php
}

if(!empty($relatedParams)) {
?>
<div class="show-more" id="related_scroll_end"><img src="<?= TURI ?>img/arr.png" alt="učitaj jos sadrzaja"></div>


<!-- Skripta za ucitavanje na kraju scroll-a -->
<script type="text/javascript">
var rel_los_sem = false; //semaphore
var rel_los_page = 1;
$('#related_scroll_end').click(rel_loadOnScroll);
//$(window).scroll(function(){if(!rel_los_sem && $(window).scrollTop()+$(window).height() >= $('#related_scroll_end').position().top) rel_loadOnScroll();});
function rel_loadOnScroll(){
  if(rel_los_sem) return;
  rel_los_sem = true; rel_los_page++;
  $.post("<?= SURI ?>scroll_related",{by:'<?= @$relatedParams['by'] ?>',id:'<?= @$relatedParams['id'] ?>',limit:'<?= @$relatedParams['limit'] ?>',page:rel_los_page,exclude:'<?= @$relatedParams['exclude'] ?>'},function(data){if(data=='empty') {$('#related_scroll_end').slideUp(); return;} $('#related_scroll_end').before(data); rel_los_sem=false;});
}
</script>

<!-- Related can be by: home, category or brand (pgt scroll is not related...) -->


<?php
}
?>
