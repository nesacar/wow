<?php if(empty($dist)) return; ?>
<div class="gdkwrapper">
    <?php
        $brandsById = array(); foreach($brandList as $b) $brandsById[$b['id']] = $b;
        $i=0;
        if(!empty($productList)) foreach($productList as $p) {
        $link = GdkProduct::getLink($p);
        $img  = GdkProduct::getImage($p);
        if(empty($img)) $img = CURI . "noImg.png";
        $cena = $p['cena_tip'] == 'upit' ? "Cena na upit" : (((empty($p['cena_tip']) || $p['cena_tip'] == "fix") ? "" : ($p['cena_tip']=='min' ? "od" : "do") )." ".number_format($p['cena'],0,",","."));
        $valuta = $p['cena_tip'] == 'upit' ? "" : " <span class='green'>".($p['valuta'] == 'eur' ? "&euro;" : $p['valuta'])."</span>";
    ?>
    <div class="gdkthumb-brand">
        <a href="<?= $link ?>"> <img src="<?= SURI ?>image.php/<?= basename($img) ?>?width=300&height=300&cropratio=300:300&image=<?= $img ?>" alt="<?= $p['title'] ?>"></a>
        <h1><?= @$brandsById[$p['brand']]['title'] ?></h1>
        <h2><a href="<?= $link ?>"><?= $p['title'] ?></a></h2>
        <h3><?= $cena.$valuta ?></h3>
    </div>
    <?php } ?>
</div>