<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= @$seo['title'] ?></title>
    <meta name="description" content="<?= @$seo['descr'] ?>" />
    <link href="<?= TURI ?>css/gdkwidget.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= TURI ?>js/gdkwidget.js"></script>
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
            <li><a href="<?= GDKURI ?>" target='_blank'><img src="<?= TURI ?>img/widget/gdk-home.jpg" /></a></li>
            <?php
              foreach($products as $p){
                $cena = $p['cena_tip'] == 'upit' ? "Cena na upit" : (((empty($p['cena_tip']) || $p['cena_tip'] == "fix") ? "" : ($p['cena_tip']=='min' ? "od" : "do") )." ".number_format($p['cena'],0,",","."));
                $valuta = $p['cena_tip'] == 'upit' ? "" : " <span class='green'>".($p['valuta'] == 'eur' ? "&euro;" : $p['valuta'])."</span>";
                $p['wnaziv'] = $p['title'];
            ?>
              <li>
                <a class='title' href='<?= $p['link'] ?>' target='_blank'><?= $p['wnaziv'] ?></a>
                <a title='<?= $p['wnaziv'] ?>' href="<?= $p['link'] ?>" target='_blank'>
                  <img class='abstract' src="<?= $p['img'] ?>" alt="<?= $p['wnaziv'] ?>" />
                </a>
                <a class='cena' href='<?= $p['link'] ?>' target='_blank'><?= $cena.$valuta ?></a>

              </li>
            <?php } ?>
          </ul>
        </div>
        <a id='head' href='<?= SURI ?>gdedakupim' target='_blank'></a>
      </div>
    </div>
  </body>
</html>
