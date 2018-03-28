<?php
if(empty($seo['kwrds'])) return;
$kwA = explode(",",$seo['kwrds']);
?>

<div class="kljucnereci">
<ul>
  <li><span class="green">Keywords:</span>&nbsp;</li>
  <?php
  foreach($kwA as $kw) {
    if(trim($kw)=="") continue;
    echo "<li><a href='".SURI.'tagcloud/'.trim($kw)."'>".trim($kw)."</a></li><li>&nbsp;|&nbsp;</li>\n";
  }
  ?>
</ul>
</div>