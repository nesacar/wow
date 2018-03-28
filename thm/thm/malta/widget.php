<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= @$seo['title'] ?></title>
    <meta name="description" content="<?= @$seo['descr'] ?>" />
    <link href="<?= TURI ?>css/widget.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= TURI ?>js/widget.js" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        var wtimer, wt = 3000;
        $('.infiniteCarousel').infiniteCarousel().mouseenter(function(){clearInterval(wtimer);$('.arrow').fadeIn()}).mouseleave(function(){$('.arrow').fadeOut();wtimer = setInterval(function(){$('.infiniteCarousel').trigger('next')}, wt)});
        wtimer = setInterval(function(){$('.infiniteCarousel').trigger('next')}, wt);
      })
    </script>
  </head>
  <body>
    <div id='widget'>
      <div class='infiniteCarousel'>
        <div class='wrapper'>
          <ul>
            <li><a href="<?= SURI ?>" target='_blank'><img class='abstract' src="<?= TURI ?>img/widget/home1.jpg" /></a></li>
            <?php
              foreach($pages as $p){
                $title = empty($p['wtitle']) ? $p['title'] : $p['wtitle'];
                $titleArr = explode("  ",$title);
                $alnk = Page::getLink($p);
            ?>
              <li>
                <a href="<?= $alnk ?>" target='_blank'><img class='abstract' src="<?= SURI.$p['wimg'] ?>" /></a>
                <?php if($title != '*'){?>
                <a class='title' href='<?= $alnk ?>' target='_blank'>
                <?php
                  $i = 0;
                  foreach($titleArr as $t) echo (++$i % 2) ? "<span>{$t}</span> " : $t." ";
                ?>
                </a>
                <?php } ?>
              </li>
            <?php } ?>
          </ul>
        </div>
        <a id='head' href='<?= SURI ?>' target='_blank'></a>
      </div>
    </div>
  </body>
</html>