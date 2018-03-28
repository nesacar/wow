<div class="container">
    <div class="col-md-13 shop-product">
        <!-- <span class="category-top">
          <a href="" style="font-family: 'Roboto';">VINA</a>

        </span><br> -->
        <h1>brand</h1>
        <img src="<? SURI ?>image.php/<?= basename($product['image']) ?>?width=485&height=363&image=<?= $product['image'] ?>" alt="">
        <div class="shop-info">
            <h2><a href="<?= ADRURI . $brand['furl'] ?>"><?= $brand['title'] ?></a></h2>
            <h2><?= $product['title'] ?></h2>

            <p><?= $product['descr'] ?></p>
            <h3 class="cena">
                <?= $product['cena_tip'] == 'upit' ? "Cena na upit" : (((empty($product['cena_tip']) || $product['cena_tip'] == "fix") ? "" : ($product['cena_tip']=='min' ? "od" : "do") )." ".number_format($product['cena'],0,",",".")) ?>
                <?= $product['cena_tip'] == 'upit' ? "" : " <span class='green'>".($product['valuta'] == 'eur' ? "&euro;" : $product['valuta'])."</span>" ?>
            </h3>
        </div>
    </div>
    <div class="col-md-14">
        <?php
        $bannerIndex = "D2";
        include "inc/revive-banner.php";
        ?>
        <?php include "inc/top.php"; ?>
    </div>
</div>