<?php
    if(empty($mobile)) $mobile = Box::isMobile($_SERVER['HTTP_USER_AGENT']);
?>
<header class="clearfix">
  <div class="container hed" style="position: relative">
    <?php
    $bannerIndex = "BH2";
    include "revive-banner.php";
    ?>
    <div><a href="<?= SURI ?>"><img src="<?= TURI ?>img/logo.png" class="logo" alt="logo"></a></div>
    <?php if(!$mobile){ ?> <div style="position: absolute; top: 15px; right: 0;"><?php include 'weather.php'; ?></div> <?php } ?>
  </div><!-- container -->

  <?php include "nav.php"; ?>

  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="<?= SURI ?>pretraga" method="POST">
          <input class="nav-search" type="search" name="s" title="Pretraga..." placeholder="Search..." />
          <span>Enter the search words.</span>
        </form>
        <a class="fade_close" data-dismiss="modal"><img src="<?= TURI ?>img/close.png" /></a>
      </div>
    </div>
  </div>
</header>