<div class="container">


    <div class="col-md-13" style=" padding: 0 33px 0 35px;;">
        <div class="left" style="padding: 0;">
            <div class="leftwhite-ms">
                <div class="ms-header">
                    <h1><?= $dist['title'] ?></h1>

                    <ul class="nav nav-pills" >
                        <li><a href="<?= ADRURI . $dist['furl'] ?>" <?= empty($msp_cur) ? "class='current'":"" ?>><?= $dist['ms_title'] ?></a></li>
                        <?php foreach($dms as $msp) { ?>
                            <li><a href="<?= ADRURI . $dist['furl'] ."/". $msp['furl'] ?>" <?= @$msp_cur['id']==$msp['id'] ? "class='current'":"" ?>><?= $msp['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="clear"></div>

                <?php if((empty($msp_cur) || $msp_cur['header']) && !empty($location)) { ?>
                <div id="ms-header">
                    <img src="<?= SURI . $dist['logo']?>" alt="<?= $dist['title'] ?>" width="118" height="118">
                    <ul>
                        <li><span>Address:</span> <?= $location['addr'] .", ".$location['town'] ?></li>
                        <li><span>Phone:</span> <?= $location['tel'] ?></li>
                        <?php if(!empty($location['bhours'])) { ?><li><span>Radno vreme:</span> <?= $location['bhours'] ?></li><?php } ?>
                        <?php if(!empty($dist['url'])) { ?><li><span>Web:</span> <a href="http://<?= str_replace("http://","",$dist['url']) ?>" target="_blank"><?= $dist['url'] ?></a></li><?php } ?>
                    </ul>
                </div>
                <?php } ?>

                <?php include $ms_body; ?>

            </div>
        </div>
    </div>

    <div class="col-md-14" style="">
        <article  class="reklamaDesno" style="">
            <?php
            if(!$mobile) {
                $bannerIndex = "D2";
                include "inc/revive-banner.php";
            }else{
                $bannerIndex = "MD2";
                include "inc/revive-banner.php";
            }
            ?>
        </article>
        <?php include "inc/top.php"; ?>
    </div>
</div>