<?php if(empty($slider)) return; ?>

<script type="text/javascript" src="<?= TURI ?>js/jquery.bxslider.js"></script>
<link href="<?= TURI ?>css/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>

<div class="col-md-13 column">
  <img src="<?= TURI ?>img/MK_300x600_Exp.jpg" class="d2exp">
  <div class="image-box">
    <!--<a style="overflow:hidden; width:100%; height:100%; position:absolute; z-index:9999;" href="http://www.bellevuelosinj.com/en" target="_blank"></a>-->
    <ul class="bxslider">
    <?php
      foreach($slider as $p) {
        $link = Page::getLink($p);
    ?>
      
      <li>
        
        <a href="<?= $link ?>"><img src="<?= SURI ?>image.php/<?= basename($p['timg']) ?>?width=480&height=250&cropratio=48:25&cropposition=<?= $p['simg_croppos'] ?>&image=<?= SURI . $p['timg'] ?>" data-thumb="<?= SURI ?>image.php/<?= basename($p['timg']) ?>?width=480&height=250&cropratio=48:25&cropposition=<?= $p['simg_croppos'] ?>&image=<?= SURI . $p['timg'] ?>" alt="<?= $p['title'] ?>" title="#slider_caption_<?= $p['id'] ?>" /></a>
        <a href="<?= $link ?>"><h2><?= $p['title'] ?></h2></a>
        <p><?= $p['descr'] ?></p>
      </li>
    
    <?php } ?>
    </ul>
    
  </div>
</div>