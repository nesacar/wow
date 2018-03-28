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

                <ul class="nav nav-pills">
                    <li class="active pills"><a data-toggle="pill" href="#home">all brands</a></li>
                    <?php foreach($assortmentList as $a) echo "<li class='pills'><a data-toggle='pill' href='#{$a['title']}' >{$a['title']}</a></li>\n"; ?>
                </ul>

                <?php if(!empty($distList)) { ?>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="klijentilista">
                            <?php foreach($distList as $d) { ?>
                                <section class="title3holder">
                                    <article class="adresarklijent">
                                        <a href="<?= ADRURI . $d['furl'] ?>">
                                            <img src="<?= SURI ?>image.php/<?= basename($d['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $d['logo']?>">
                                        </a>
                                        <h1><a href="<?= ADRURI . $d['furl'] ?>"><?= $d['title'] ?></a></h1>
                                        <ul>
                                            <li><span>Address:&nbsp;</span><?= empty($d['loc']) ? "" : $d['loc']['addr'] .", ". $d['loc']['town'] ?></li>
                                            <li><span>Phone:&nbsp;</span><?= @$d['loc']['tel'] ?></li>
                                            <li><span>Description:&nbsp;</span><?= @$d['descr'] ?></li>
                                        </ul>
                                        <div class="josadresar">
                                            » <a href="<?= ADRURI . $d['furl'] ?>" title="<?= $d['title'] ?>">Pročitajte više...</a>
                                        </div>
                                    </article>
                                </section>
                            <?php } ?>
                        </div>
                    <div>

                <?php foreach($assortmentList as $a){?>
                    <div id="<?= $a['title'] ?>" class="tab-pane fade">
                        <?php foreach($distList as $d) { ?>
                            <?php if('asc_'.$a['id'] == $d['asc']){ ?>
                                <section class="title3holder">
                                    <article class="adresarklijent">
                                        <a href="<?= ADRURI . $d['furl'] ?>">
                                            <img src="<?= SURI ?>image.php/<?= basename($d['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $d['logo']?>">
                                        </a>
                                        <h1><a href="<?= ADRURI . $d['furl'] ?>"><?= $d['title'] ?></a></h1>
                                        <ul>
                                            <li><span>Address:&nbsp;</span><?= empty($d['loc']) ? "" : $d['loc']['addr'] .", ". $d['loc']['town'] ?></li>
                                            <li><span>Phone:&nbsp;</span><?= @$d['loc']['tel'] ?></li>
                                            <li><span>Description:&nbsp;</span><?= @$d['descr'] ?></li>
                                        </ul>
                                        <div class="josadresar">
                                            » <a href="<?= ADRURI . $d['furl'] ?>" style="padding-top: 5px;">Pročitajte više...</a>
                                        </div>
                                    </article>
                                </section>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
                    </div>

                <?php } ?>

        </div>



    </div><!-- .tab-content -->
            </div></div></div>

    <div class="col-md-14" style="">
        <article  class="reklamaDesno" style="">
            <?php
            $bannerIndex = "D2";
            include "inc/revive-banner.php";
            ?>
        </article>
        <?php include "inc/top.php"; ?>
    </div>
</div>