<div class="vest">
    <?= $dist['html'] ?>
</div>
<?php include 'inc/keywords.php'; ?>
<?php if(!empty($brandList) && !empty($brandsActive)) { ?>
    <div class="title3">BRANDS</div>
    <div class="brendovilista">
        <ul>
            <?php foreach($brandList as $b) if(in_array($b['id'],$brandsActive)) { ?>
                <?php if(false){ ?>
                    <li>
                        <a href="<?= ADRURI . $b['furl'] ?>" title="<?= $b['title'] ?>">
                            <img src="<?= SURI ?>image.php/<?= basename($b['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $b['logo']?>" alt="<?= $b['title'] ?>">
                        </a>
                    </li>
                <?php }else{ ?>
                    <li>
                        <a href="<?= ADRURI . $dist['furl'] ."/asortiman" ?>" title="<?= $b['title'] ?>">
                            <img src="<?= SURI ?>image.php/<?= basename($b['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $b['logo']?>" alt="<?= $b['title'] ?>">
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
<?php } ?>
