<div class="container">
    <div class="col-md-13" style="padding: 0;">
        <div class="left">
            <div class="leftwhite-adr">
                <div class="adresarslajfna2">
                    <h1>
                        <h1><a href="<?= ADRURI ?>">GUIDE</a> - BRANDS</h1>
                    </h1>
                </div>
                <div class="clear"></div>

                <ul class="nav nav-pills" >
                    <li class="active pills"><a data-toggle="pill" href="#home">all brands</a></li>
                    <?php foreach($assortmentList as $a) echo "<li class='pills'><a data-toggle='pill' href='#{$a['title']}' onClick='return false' >{$a['title']}</a></li>\n"; ?>
                </ul>

                <?php if(!empty($brandList)) { ?>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="klijentilista">
                            <?php foreach($brandList as $b) { ?>
                                <section class="title3holder">
                                    <article class="adresarklijent">
                                        <img src="<?= SURI ?>image.php/<?= basename($b['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $b['logo']?>">
                                        <h1><?= $b['title'] ?></h1>
                                        <ul>
                                            <li><span>Address:&nbsp;</span><?= empty($b['loc']) ? "" : $b['loc']['addr'] .", ". $b['loc']['town'] ?></li>
                                            <li><span>Phone:&nbsp;</span><?= ['loc']['tel'] ?></li>
                                            <li><span>Description:&nbsp;</span><?= @$b['descr'] ?></li>
                                        </ul>
                                        <div class="josadresar">
                                            � <a href="<?= ADRURI . $b['furl'] ?>" title="<?= $b['title'] ?>">Pro?itajte vi�e...</a>
                                        </div>
                                    </article>
                                </section>
                            <?php } ?>
                        </div>
                    <div>

                <?php foreach($assortmentList as $a){?>
                    <div id="<?= $a['title'] ?>" class="tab-pane fade">
                        <?php foreach($brandList as $b) { ?>
                            <?php if('asc_'.$a['id'] == $b['asc']){ ?>
                                <section class="title3holder">
                                    <article class="adresarklijent">
                                        <img src="<?= SURI ?>image.php/<?= basename($b['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $b['logo']?>">
                                        <h1>sun, moon & stars</h1>
                                        <ul>
                                            <li><span>Address:&nbsp;</span> Nu�i?eva 25, 11000 Beograd, Srbija</li>
                                            <li><span>Phone:&nbsp;</span>+381 11 40 797 44</li>
                                            <li><span>Description:&nbsp;</span>Sun, Moon & Stars je ekskluzivni distributer dekorativnih predmeta i kuhinjskog posu?a u Srbiji za naj?uvenije svetske kompanije Villeroy&Boch, Rosenthal, Swarovski, WMF, Christofle,</li>
                                        </ul>
                                        <div class="josadresar">
                                            � <a href="" style="padding-top: 5px;">Pro?itajte vi�e...</a>
                                        </div>
                                    </article>
                                </section>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>


                <?php } ?>

        </div><!-- .tab-content -->



    </div>

    <div class="col-md-14" style="">
        <article  class="reklamaDesno" style="">
            <?php
            $bannerIndex = "D2";
            include "inc/revive-banner.php";
            ?>
        </article>
        <section class="most-read">
            <h2>NAJ?ITANIJE</h2>
            <ul>
                <li><span>»</span> <a href="">link 1</a></li>
                <li><span>»</span> <a href="">link 2</a></li>
                <li><span>»</span> <a href="">link 3</a></li>
                <li><span>»</span> <a href="">link 4</a></li>
                <li><span>»</span> <a href="">link 5</a></li>
            </ul>
        </section>
    </div>
</div>