<?php include "inc/slider.php"; ?>

<aside class="col-md-14">
  <?php
  $bannerIndex = "D1";
  include "inc/revive-banner.php";
  ?>
</aside>

<?php
  $pageList = $pages1;
  include "inc/featured.php";
?>


<aside class="col-md-14">
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
     include "inc/map.php";
    include "inc/top.php";
    //include "inc/social.php";
     //include "inc/addthis.php";
     include "inc/social-buttons.php";
    
  ?>
</aside>

<?php include "inc/highlights.php"; ?>

<?php
  $pageList = $pages2;
  include "inc/featured.php";
?>

<aside class="col-md-14">
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
  </section>

  <?php
    //include "inc/aside-gdk.php";
   

    $bannerIndex = "D4";
    include "inc/revive-banner.php";
    $bannerIndex = "D5";
    include "inc/revive-banner.php";

    include "inc/aside-brands.php";
      include "inc/aside-fb.php";
      include "inc/social-buttons.php";
    //include "inc/aside-tagcloud.php";
  ?>
</aside>