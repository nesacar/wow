<?php
if(empty($nav)) $nav = Category::getList();
if(empty($nav)) return;
if(empty($towns)) $towns = Town::getList();
if(empty($mobile)) $mobile = Box::isMobile($_SERVER['HTTP_USER_AGENT']);
?>
<div class="navigation stick">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation">
      <div class="navbar-header">
        <a  class="menu-toggle" id="menu-toggle"><img src="<?= TURI ?>img/nav-toggle.png"></i></a>
      </div>

      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        	<li <?= @$home ? "class='active'" : "" ?>><a href="<?= SURI ?>" >home</a></li>
          <?php
            $navParentURI = SURI;
            foreach($nav as $c) {
              echo "<li ".(@$route[0]['route']=='category' && @$route[0]['id']==$c['id'] ? "class='active'" : "")."><a href='".SURI."{$c['furl']}'>{$c['title']}</a></li>\n";
              if(@$route[0]['route']=='category' && @$route[0]['id']==$c['id']) { $navParentURI =  SURI.$c['furl']."/"; }
            }
          ?>
          <?php if(false){ ?>
          <li <?= @$route[0]['route']=='gdk' ? "class='active'":"" ?>><a href="<?= GDKURI ?>"><?= @$setup->gdk_title ?></a></li>
          <li <?= @$route[0]['route']=='guide' ? "class='active'":"" ?>><a href="<?= ADRURI ?>adresar">guide</a></li>
          <?php } ?>
        </ul>

        <div style="clear: both"></div>
        <div class="sub_menu">
          <div class="container">
          <?php
            //if(!empty($home)) include "nav-home-submenu.php";
            if(!empty($gdk) && false) include "nav-gdk-submenu.php";
            elseif(!empty($towns)) {
          ?>
            <ul>
              <?php foreach($towns as $t) echo "<li ".((@$route[0]['route']=='town' && @$route[0]['id']==$t['id']) || (@$route[1]['route']=='town' && @$route[1]['id']==$t['id']) ? "class='active'" : "")."><a href='{$navParentURI}{$t['furl']}'>{$t['title']}</a></li>\n"; ?>
            </ul>
          <?php
            }
          ?>
            <form class="searchme">
              <a data-toggle="modal" data-target=".bs-example-modal-lg" href="#"><i class="glyphicon glyphicon-search"></i></a>
            </form>
          </div>
        </div>
      </div>
        <?php if($mobile){ ?> <div style="width: 200px; position: absolute; right: 25px; top: 2px;"><?php include 'weather-mobile.php'; ?></div> <?php } ?>
      <div class="search"><a data-toggle="modal" data-target=".bs-example-modal-lg" href="#"><i class="fa fa-search"></i></a></div>
    </nav>
  </div>
</div>