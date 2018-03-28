<?php
if(empty($dist)) return;
if(empty($gallery)) return;
$first = reset($gallery);
?>
<div class="gallery-images">
    <div class="relative">


        <a href="#"><span class="left-arrow" onClick='return lgShift(-1)'></span></a>
        <a href="#"><span class="right-arrow" onClick='return lgShift(1)'></span></a>

        <div id="bigFrame">
            <img id="bigFrameImg" src="<?= SURI ?>image.php/<?= basename($first) ?>?width=600&cropratio=3:2&image=<?= $first ?>" alt="<?= $dist['title'] ?>" />
        </div>
    </div><!-- relative -->
    <ul class="thumbs">

    <?php foreach($gallery as $img) { ?>
      <li><a class='gallery_thumbs' href="<?= SURI ?>image.php/<?= basename($img) ?>?width=600&cropratio=3:2&image=<?= $img ?>" onClick="return false">
        <img src="<?= SURI ?>image.php/<?= basename($img) ?>?width=84&height=56&cropratio=3:2&image=<?= $img ?>" alt="<?= $dist['title'] ?>" /></a></li>
    <?php } ?>
    </ul>

</div>

<script type="text/javascript">
    var lgthumbind = 17;
    var lgthumblen = 18;
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

    });

</script>