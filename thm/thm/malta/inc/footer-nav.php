<?php
if(empty($nav)) $nav = Category::getList();
if(empty($nav)) return;
?>

<div style="clear: both"></div>
<section class="col-md-12 bottom-nav">
  <ul class="footer-navigation">
    <li <?= @$home ? "class='active'" : "" ?>><a href="<?= SURI ?>" >HOME</a></li>
    <?php
      $navSub = NULL; $navParentURI = SURI;
      foreach($nav as $c) {
        echo "<li ".(@$route[0]['route']=='category' && @$route[0]['id']==$c['id'] ? "class='active'" : "")."><a href='".SURI."{$c['furl']}'>{$c['title']}</a></li>\n";
        if(@$route[0]['route']=='category' && @$route[0]['id']==$c['id']) { $navSub = @$c['sub']; $navParentURI =  SURI.$c['furl']."/"; }
      }
    ?>
    <?php if(false){?>
    <li <?= @$route[0]['route']=='gdk' ? "class='active'":"" ?>><a href="<?= GDKURI ?>"><?= @$setup->gdk_title ?></a></li>
    <li <?= @$route[0]['route']=='vodic' ? "class='active'":"" ?>><a href="<?= ADRURI ?>">Lux vodič</a></li>
    <?php } ?>
  </ul>

  <div class="footer-sub-menu">
  <?php
    if(!empty($home)) include "nav-home-submenu.php";
    elseif(!empty($gdk) && false) include "nav-gdk-submenu.php";
    elseif(!empty($towns)) {
  ?>
   <ul>
              <?php foreach($towns as $t) echo "<li ".((@$route[0]['route']=='town' && @$route[0]['id']==$t['id']) || (@$route[1]['route']=='town' && @$route[1]['id']==$t['id']) ? "class='active'" : "")."><a href='{$navParentURI}{$t['furl']}'>{$t['title']}</a></li>\n"; ?>
            </ul>

  <?php
    }
  ?>
  </div>
</section>


<div class="container footer-main">
    <p style="margin-top: 20px; margin-bottom: 10px; display:inline-block;">WowMalta -</p><h1 style="display: inline-block; font-size: 14px; color: #fff; margin-left: 5px;"> Travel Info Guide for Malta, Gozo & Comino</h1>
    <img style="display: block; margin: 20px auto; margin-bottom: 20px;" src="<?= TURI ?>/img/footer-logo-white.png" alt="">
    <ul>
        <li><a href="">malta <span>|<span></a></li>
        <li><a href="">gozo <span>|<span></a></li>
        <li><a href="">comino</a></li>
        <li></li>
    </ul>
    <p style="margin-top: 10px; margin-bottom: 10px;">WowMalta is a part of Blues Limited Media Company</p>
    <ul>
        <li class="padding-left"><a href="<?= SURI ?>about/about-us">about us</a></li>
        <li class="padding-left"><a href="<?= SURI ?>chest/pdf/Wow_Malta_Presentation.pdf" target="_blank">advertising</a></li>
        <li class="padding-left"><a href="<?= SURI ?>about/contact">contact</a></li>
        <li class="padding-left"></li>
    </ul>

    <p style="margin-top: 10px;"">You can visit WowMalta on the following domains WowMalta: </p>
    <ul class="follow-us">
        <li><a href="http://www.wowmalta.com.mt/">wowmalta.com.mt <span>|</span></a></li>
        <li><a href="#">wowmalta.net <span>|</span></a></li>
        <li><a href="#">wowmalta.biz <span>|</span></a></li>
        <li><a href="#">wowmalta.eu</a></li>
    </ul>
</div>