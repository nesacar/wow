<?php
if(empty($nav)) $nav = Category::getList();
if(empty($nav)) return;
?>

<!-- Sidebar -->
<div id="sidebar-wrapper">
  <a href="#close-toggle" id="close-toggle"><img src="<?= TURI ?>img/close.png"></a>
  <ul class="sidebar-nav">
  <li><a href="<?= SURI ?>" <?= @$home ? "class='current'" : "" ?>>HOME</a></li>
  <?php foreach($nav as $c) { ?>
     <li><a href="<?= SURI . $c['furl'] ?>" <?= @$route[0]['route']=='category' && @$route[0]['id']==$c['id'] ? "class='current'" : "" ?>><?= $c['title'] ?></a></li>
   <?php } ?>
 </ul>
</div><!-- /#sidebar-wrapper -->