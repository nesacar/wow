<?php
if(empty($gallery)) return;
//$firstImg = end($gallery);
$firstImg = $gallery[count($gallery)-1];
?>

<div class="gallery-images">
<div class="relative">

  <?php
  $bannerIndex = "PR1";
  include "revive-banner.php";

  $bannerIndex = "PR2";
  include "revive-banner.php";

  $bannerIndex = "MPR1";
  include "revive-banner.php";
  ?>
  <a href="#"><span class="left-arrow" onClick='return lgShift(-1)'></span></a>
  <a href="#"><span class="right-arrow" onClick='return lgShift(1)'></span></a>

  <div id="bigFrame">
    <img id="bigFrameImg" src="<?= SURI ?>image.php/<?= basename($firstImg) ?>?width=658&image=<?= SURI . $firstImg ?>" alt="<?= $page['title'] ?>" />
    <?php if(false){ ?>
      <img class="close-ban" src="<?= TURI ?>img/close2.png"/>
    <?php } ?>
  </div>
</div><!-- relative -->
  <ul class="thumbs">
  <?php
    foreach($gallery as $img){
  ?>
    <li><a class='gallery_thumbs' href="<?= SURI ?>image.php/<?= basename($img) ?>?width=658&image=<?= SURI . $img ?>" onClick="return false"><img src="<?= SURI ?>image.php/<?= basename($img) ?>?width=84&image=<?= SURI . $img ?>" alt="<?= $page['title'] ?>" /></a></li>
  <?php
    }
  ?>
  </ul>

</div>

<script type="text/javascript" src="<?= TURI ?>js/gclk.js"></script>
<script type="text/javascript">
var myElement = document.getElementById('bigFrameImg');
				var mc = new Hammer(bigFrameImg);
				// var e = $('.thumbs').find('li').length;
				var items = $('.thumbs').find('li');
				var leng = $('.thumbs li').length;
				var first = items.eq(1);
				var next = items.next();
				var br = 0;
				mc.on('swipeleft', function(ev) {
					console.log(leng);
					if(br === 0) {
						br = leng;
					} else {
						br--;
					}

				console.log('levo');

				$('#bigFrameImg').attr('src',items.eq(br).find('.gallery_thumbs').attr('href'));

				});

				mc.on('swiperight', function(ev) {
					if(br == leng) {
						br = 0;
					} else {
						br++;
					}
				console.log('desno');

				$('#bigFrameImg').attr('src',items.eq(br).find('.gallery_thumbs').attr('href'));
				});


var lgthumbind = <?= count($gallery)-1 ?>;
var lgthumblen = <?= count($gallery) ?>;
function lgShift(direction){
  var newind = (lgthumblen + lgthumbind + direction) % lgthumblen;
  $('.gallery_thumbs:eq('+newind+')').click();
  return false;
}

$(".gallery_thumbs").click(function () {
  var imgbig = $(this).attr('src');
  $('#bigFrameImg').attr('src',$(this).attr('href'));

  var gap = ($(window).height() + $('.stick').height() - $('#bigFrameImg').height()) / 3;
  $('body').animate({scrollTop : $('#bigFrameImg').offset().top - gap},800);
  lgthumbind = $('.gallery_thumbs').index(this);
  <?php if(rand(1,100) < @$setup->pgnc) { ?>gclk($('#bigFrame'));<?php } ?>
  return false;
});
</script>
