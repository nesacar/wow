<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"; ?>
<rss version="2.0">
<channel>
  <title><?= @$seo['title'] ?></title>
  <link><?= $link ?></link>
  <description><?= @$seo['descr'] ?></description>
  <language>sr</language>
  <copyright>(c) <?= date("Y") ?> Mini STUDIO Publishing Group d.o.o. All rights reserved.</copyright>
  <lastBuildDate><?= $lbDate ?></lastBuildDate>
  <generator>Mini STUDIO Publishing Group</generator>
  <ttl>480</ttl>
  <?php
    foreach($pages as $p){
      $link = Page::getLink($p);
      if(!empty($p['timg'])){
        $info = @getimagesize(__SITE_PATH."/".$p['timg']);
        $size = @filesize(__SITE_PATH."/".$p['timg']);
        @$img = array("url"=>SURI.$p['timg'],"type"=>$info['mime'],"length"=>(int)$size);
      }
      else $img = NULL;
  ?>
  <item>
    <title><?= htmlspecialchars($p['title'],ENT_QUOTES) ?></title>
    <link><?= $link ?></link>
    <description><?= empty($p['rssbody']) ? htmlspecialchars($p['descr'],ENT_QUOTES) : htmlspecialchars($p['rssbody'],ENT_QUOTES) ?></description>
    <category><?= @$cNames[$p['cat']] ?></category>
    <guid><?= $link ?></guid>
    <pubDate><?= date("r",strtotime($p['published'])) ?></pubDate>
    <?php if(!empty($img)) { ?><enclosure url="<?= $img['url'] ?>" length="<?= $img['length'] ?>" type="<?= $img['type'] ?>" /><?php } ?>
  </item>
  <?php } ?>
</channel>
</rss>