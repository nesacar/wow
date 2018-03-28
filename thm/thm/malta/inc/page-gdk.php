<?php if(empty($gdkBox) || count($gdkBox)<3) return; ?>
<div class="gdkpatternbox">
  <a href="<?= GDKURI ?>"><img src="<?= TURI ?>img/gdk-box-pattern.png" width="145" alt="<?= @$setup->gdk_title ?>"></a>
  <?php
  foreach($gdkBox as $p) {
    $link = GdkProduct::getLink($p);
    $cena = $p['cena_tip'] == 'upit' ? "Cena na upit" : (((empty($p['cena_tip']) || $p['cena_tip'] == "fix") ? "" : ($p['cena_tip']=='min' ? "od" : "do") )." ".number_format($p['cena'],0,",","."));
    $valuta = $p['cena_tip'] == 'upit' ? "" : " ".($p['valuta'] == 'eur' ? "&euro;" : $p['valuta']);
  ?>
  <div class="gdkboxthumb">
    <a title="<?= $p['title'] ?>" href="<?= $link ?>">
      <img src="<?= SURI ?>image.php/<?= basename($p['img']) ?>?width=155&height=117&cropratio=155:117&image=<?= $p['img'] ?>" alt="<?= $p['title'] ?>" />
    </a>
    <a class="mf" title="<?= $p['title'] ?>" href="<?= $link ?>"><?= @$brandNames[$p['brand']] ?></a>
    <a class="cena" title="<?= $p['title'] ?>" href="<?= $link ?>">CENA <span><?= $cena . $valuta ?></span></a>
  </div>
  <?php } ?>
</div>