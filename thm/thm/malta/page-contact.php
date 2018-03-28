<div style="position: relative;">
  <img src="<?= TURI ?>img/MK_300x600_Exp.jpg" class="d2exp_page">
<section class="col-md-13 gallery <?php if($huawei_pr){ ?>svetla-pozadina<?php } ?>">
  <div class="overflow">
    <span class="category-top">
      <?php if($cat['pos'] && (empty($pcat) || $pcat['pos'])) { ?>
        <?php if(!empty($pcat)) { ?><a href="<?= Category::getLink($pcat) ?>"><?= $pcat['title']?></a> &nbsp;-&nbsp; <?php } ?>
        <a href="<?= $cURI ?>"><?= $cat['title']?></a>
      <?php } ?>
    </span>
  </div>
  <h1><?= $page['title'] ?></h1>

  <?php include "inc/gallery.php"; ?>

  <?php if($page['himg'] == 1){ ?>
    <div style="position: relative; margin-bottom: 20px;">
      <?php
      $bannerIndex = "PR1";
      include "inc/revive-banner.php";

      $bannerIndex = "PR2";
      include "inc/revive-banner.php";
      ?>
      <?php if(false){ ?>
      <img class="close-ban" src="<?= TURI ?>img/close2.png"/>
      <?php } ?>
      <img src="<?= SURI . $page['timg'] ?>" alt="<?= $page['title'] ?>">
      <script>
        $('.bnrPR1').hover(function(){ $('.bnrPR2').fadeIn(); $('.bnrPR1').fadeOut();}, function(){  });
        $('.bnrPR2').hover(function(){ }, function(){ $('.bnrPR2').fadeOut(); $('.bnrPR1').fadeIn();});
      </script>
    </div>
  <?php } ?>
  <?= $page['contents']['html'] ?>

  <p>
    <form class="article-form" action="" method="post">
      <h3 style="color: #18a5a6; font-size: 22px;">Contact us</h3>
      <input type="hidden" name="contact[ruta]" value="<?= $ruta ?>">
      <input type="text" name="contact[name]" value="" placeholder="Name" required>
      <input type="text" name="contact[email]" value="" placeholder="E-mail" required>
      <input type="text" name="contact[country]" value="" placeholder="Country" required>
      <input type="text" name="contact[phone]" value="" placeholder="Phone" required>
      <textarea class="" name="contact[message]" placeholder="Message" required style="margin-bottom: 20px"></textarea>
      <div class="g-recaptcha" data-sitekey="6Ler7CEUAAAAADFjNFnrPeTmheiuIj9KJ4UBoE03"></div>
      <button type="submit" name="button">Submit</button>
    </form>
  </p>

  <?php
    include "inc/addthis.php";
    include "inc/keywords.php";
    $bannerIndex = "C1";
    include "inc/revive-banner.php";
  ?>

  <?php if(!empty($next)) { ?>
    <a class="read-more" href="<?= Page::getLink($next) ?>"><p>PROČITAJTE SLEDEĆI TEKST: <span><?= $next['title'] ?></span></p></a>
  <?php } ?>



  <?php if($page['comments']) include "inc/comments.php"; ?>

<?php
  //include "inc/page-gdk.php";
?>
</section><!-- gallery index -->
  </div>

<aside class="col-md-14">
    <section>
      <?php
      $bannerIndex = "D1";
      include "inc/revive-banner.php";
      ?>
    </section>

  <section>
  <?php
  if(!$mobile) {
    $bannerIndex = "D2";
    include "inc/revive-banner.php";
  }else{
    $bannerIndex = "MD2";
    include "inc/revive-banner.php";
  }
  ?>
  </section>


  <?php
    include "inc/top.php";
    //include "inc/social.php";
    include "inc/social-buttons.php";
  ?>

  <section>
  <?php
  if(!$mobile) {
    $bannerIndex = "D3";
    include "inc/revive-banner.php";
  }else{
    $bannerIndex = "MD3";
    include "inc/revive-banner.php";
  }
  ?>
  <?php
  include "inc/aside-fb.php";
  ?>
  </section>
</aside>

<section class="col-md-13 related-topic">
  <?php include "inc/related.php"; ?>
</section>

<aside class="col-md-14">
  <?php
     //include "inc/aside-gdk.php";
  $bannerIndex = "D4";
  include "inc/revive-banner.php";
  $bannerIndex = "D5";
  include "inc/revive-banner.php";
     include "inc/aside-brands.php";
     //include "inc/aside-tagcloud.php";
   ?>
</aside>

<?php include "inc/highlights.php"; ?>
