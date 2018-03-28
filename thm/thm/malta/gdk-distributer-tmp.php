

<div class="container">


    <div class="col-md-13" style="padding: 0;">
        <div class="left">
            <div class="leftwhite-ms">
                <div class="ms-header">
                    <h1><?= $dist['title'] ?></h1>

                    <ul class="nav nav-pills" >
                        <li class="active" style=""><a data-toggle="pill" href="#home" >About us</a></li>
                        <li style=""><a data-toggle="pill" href="#menu1">Assortment</a></li>
                        <li style=""><a data-toggle="pill" href="#menu2">Gallery</a></li>
                        <li style=""><a data-toggle="pill" href="#menu3">Contact</a></li>
                    </ul>
                </div>
                <div class="clear"></div>


                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active" >

                        <div id="ms-header">
                            <?php if(!empty($dist['logo'])) { ?><img src="<?= SURI . $dist['logo'] ?>" alt="<?= $dist['title'] ?>" height="118" width="118" /><?php } ?>
                            <ul>
                                <li><span><?= empty($loc['title']) ? "Address" : $loc['title'] ?>:</span> <?= @$loc['addr'] .", ".@$loc['town'] ?></li>
                                <li><span>Phone:</span>  <?= @$loc['tel'] ?></li>
                                <?php if(!empty($loc['bhours'])) { ?><p><span class="green">RADNO VREME:</span> <?= $loc['bhours'] ?></p><?php } ?>
                                <?php if(!empty($dist['url'])) { ?><a href="http://<?= str_replace("http://","",$dist['url']) ?>" target="_blank"><?= $dist['url'] ?></a><?php } ?>
                            </ul>
                        </div>
                        <div class="vest">
                            <?= $dist['html'] ?>
                        </div>
                        <?php include "inc/keywords.php"; ?>

                        <?php if(!empty($brandList) && !empty($brandsActive)) { ?>
                        <div class="title3">BRANDS</div>
                        <div class="brendovilista">
                            <ul>
                                <?php foreach($brandList as $b) if(in_array($b['id'],$brandsActive)) { ?>
                                    <li><a href="<?= ADRURI . $b['furl'] ?>" title="<?= $b['title'] ?>"><img src="<?= SURI ?>image.php/<?= basename($b['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $b['logo']?>" alt="<?= $b['title'] ?>"></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="gdkwrapper">
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/1000-5.5.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/1000-5.5/1000-5.5.jpg"></a>
                                <h1>bernardbraud</h1>
                                <h2>1000-5.5</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/aerosystem.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/aerosystem/aerosystem.jpg"></a>
                                <h1>lalique</h1>
                                <h2>aerosystem one</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href="">  <img src="http://www.luxlife.rs/image.php/al dente.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/al dente/al dente.jpg"></a>
                                <h1>bernardaud</h1>
                                <h2>al dente</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/41 14 423.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/41 14 423/41 14 423.jpg"></a>
                                <h1>christofle</h1>
                                <h2>albi</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/41 74 180.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/41 74 180/41 74 180.jpg"></a>
                                <h1>bernardbraud</h1>
                                <h2>1000-5.5</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/03948220-1-612-0-pastry-stand-2-tiers.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/etazere1/03948220-1-612-0-pastry-stand-2-tiers.jpg"></a>
                                <h1>lalique</h1>
                                <h2>aerosystem one</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href="">  <img src="http://www.luxlife.rs/image.php/04200710-01-612-0-rectangular-tray.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/posluzavnik1/04200710-01-612-0-rectangular-tray.jpg"></a>
                                <h1>bernardaud</h1>
                                <h2>al dente</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/04200710-01-612-0-rectangular-tray.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/posluzavnik1/04200710-01-612-0-rectangular-tray.jpg"></a>
                                <h1>christofle</h1>
                                <h2>albi</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/albi-candlestick.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/svecnjak/albi-candlestick.jpg"></a>
                                <h1>bernardbraud</h1>
                                <h2>1000-5.5</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/1110769_fpx.tif.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/allegorie/1110769_fpx.tif.jpg"></a>
                                <h1>lalique</h1>
                                <h2>aerosystem one</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href="">  <img src="http://www.luxlife.rs/image.php/robbe-berking-3.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/robbe-berking-3/robbe-berking-3.jpg"></a>
                                <h1>bernardaud</h1>
                                <h2>al dente</h2>
                                <h3>cena na upit</h3>
                            </div>
                            <div class="gdkthumb-brand">
                                <a href=""> <img src="http://www.luxlife.rs/image.php/1756-13_600_1.jpg?width=155&height=117&cropratio=155:117&image=http://www.luxlife.rs/chest/proizvodi/sun-moon-stars/amadeo/1756-13_600_1.jpg"></a>
                                <h1>christofle</h1>
                                <h2>albi</h2>
                                <h3>cena na upit</h3>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade gallery" style="width: 100%; padding: 0;">

                        <div class="gallery-images">
                            <div class="relative">


                                <a href="#"><span class="left-arrow" onClick='return lgShift(-1)'></span></a>
                                <a href="#"><span class="right-arrow" onClick='return lgShift(1)'></span></a>

                                <div id="bigFrame">
                                    <img id="bigFrameImg" src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (9).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (9).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" />
                                </div>
                            </div><!-- relative -->
                            <ul class="thumbs">
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (1).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (1).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (1).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (1).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (10).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (10).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (10).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (10).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (11).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (11).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (11).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (11).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (12).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (12).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (12).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (12).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (13).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (13).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (13).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (13).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (14).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (14).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (14).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (14).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>

                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (1).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (1).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (1).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (1).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (10).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (10).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (10).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (10).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (11).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (11).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (11).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (11).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (12).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (12).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (12).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (12).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (13).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (13).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (13).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (13).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>
                                <li><a class='gallery_thumbs' href="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (14).jpg?width=600&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (14).jpg" onClick="return false"><img src="http://www.luxlife.rs/image.php/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (14).jpg?width=84&image=http://www.luxlife.rs/chest/gallery/luksuzni-dom-mark-dzejkobsa-na-menhetnu/luksuz-living-kuce-poynatih-mark-dzejkobsa-menheten-01 (14).jpg" alt="Luksuzni dom Mark D�ejkobsa na Menhetnu" /></a></li>

                            </ul>

                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade kontakt" >

                        <div id="ms-header" >
                            <img src="http://www.luxlife.rs/chest/logo/1408108269_Sun-Moon-Stars_logo.png">
                            <ul>
                                <li><span>Adress:</span> Nu�i?eva 25, 11000 Beograd, Srbija</li>
                                <li><span>Phone:</span>  +381 11 40 797 44</li>
                                <li><span>Web:</span> www.sunmoon-stars.com</li>
                            </ul>

                        </div>
                        <img class="mapa" src="img/mapa.jpg">
                        <h2>"sun, moon & stars" - bulevar</h2>
                        <p><span>Adress: </span>Bulevar kralja Alekandra 86, 11000 Beograd, Srbija</p>
                        <p><span>Phone: </span>+381 11 40 797 49</p>
                        <p><span>Working hours: </span>10-22h</p>

                        <h2>"sun, moon & stars" - swarovski monobrand</h2>
                        <p><span>Adresa: </span>Knez Mihailova 25, 11000 Beograd, Srbija</p>
                        <p><span>Telefon: </span>+381 11 40 797 44</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>
    <div class="col-md-14" style="">
        <article  class="reklamaDesno" style="">
            <img src="img/Casa.jpg" alt="">
        </article>
        <?php include "inc/top.php"; ?>
    </div>
</div>