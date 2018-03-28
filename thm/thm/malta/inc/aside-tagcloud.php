<?php
$tagCloud = Box::getTagCloud(50);
if(empty($tagCloud)) return;
?>
<section class="tag-cloud">
  <h2>Linkovi</h2>
  <ul>
  <?php
    $i = 0;
    foreach($tagCloud as $tc) {
      echo "<li><a href='".SURI."tagcloud/{$tc['tag']}' ".(++$i%2 ? "class='green'":"").">{$tc['tag']}</a></li>\n";
    }
  ?>
</section>