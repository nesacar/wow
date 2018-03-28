<?php
if(empty($catLinks)) $catLinks = Category::getLinks();
if(empty($catNames)) $catNames = Category::getNames();
?>

<section class="col-md-13 article">
  <h1>Search results: <span style='color: #FFF'><?= @$tcTerm ?></span></h1>
  <?php if(isset($noResult)) { ?>
    <p></p>
  <?php } ?>

    <?php
      if(!empty($result)) foreach($result as $r) {
        $showH2 = false;
        switch(@$r['tbl']) {
          case 'brand':
            $link = ADRURI . $r['furl'];
            //$img  = "<img src='".SURI."image.php/".basename($r['logo'])."?width=118&height=118&cropratio=1:1&image=".SURI.$r['logo']."' alt='{$r['title']}' />";
            $img  = "<img src='".SURI.$r['logo']."' alt='{$r['title']}' />";
            $artclass = "sr_brand";
          break;

          case 'dist':
            $link = ADRURI . $r['furl'];
            //$img  = "<img src='".SURI."image.php/".basename($r['logo'])."?width=118&height=118&cropratio=1:1&image=".SURI.$r['logo']."' alt='{$r['title']}' />";
            $img  = "<img src='".SURI.$r['logo']."' alt='{$r['title']}' />";
            $artclass = "sr_dist";
          break;

          default:
            $link = Page::getLink($r);
            $img  = "<img src='".SURI."image.php/".basename($r['timg'])."?width=559&height=373&cropratio=559:373&image=".SURI.$r['timg']."' alt='{$r['title']}' />";
            //$img  = "<img src='".SURI.$r['timg']."' alt='{$r['title']}' />";
            $showH2 = true;
            $artclass = "sr_page";
          break;

        }

    ?>
      <article class="<?= $artclass ?>">
        <a href="<?= $link ?>"><?= $img ?></a>
		    <?php if($showH2) { ?><span class="grey"><?= Common::datum_sr($r['published']) ?></span>&nbsp;<a href="<?= @$catLinks[$r['cat']] ?>"><?= @$catNames[$r['cat']] ?></a><?php } ?>
  		  <h2><a href="<?= $link ?>"><?= $r['title'] ?></a></h2>
  		  <p><?= $r['descr'] ?></p>
        <p class="jos">» <a href="<?= $link ?>">Pročitajte više...</a></p>
      </article>

    <?php
      }
    ?>

</section>

<aside class="col-md-14">
  <section class="none">
  <?php
    $bannerIndex = "D1";
    include "inc/revive-banner.php";
  ?>
  </section>
  <section class="none">
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
  ?>

  <section class="none">
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
    include "inc/aside-fb.php";
  $bannerIndex = "D4";
  include "inc/revive-banner.php";
  $bannerIndex = "D5";
  include "inc/revive-banner.php";
    include "inc/aside-brands.php";
    //include "inc/aside-tagcloud.php";
  ?>
</aside>
<?php include "inc/highlights.php"; ?>