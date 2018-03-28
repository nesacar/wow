<?php
if(empty($dist)) return;
if(empty($locList)) return;
?>
<div id="menu3" class="kontakt" >

    <?php
    $showMap = false;
    foreach($locList as $loc) if(!empty($loc['geoloc'])) {
        $showMap = true;
        ?>
        <input type='hidden' class='mapa-marker' value='<?= $loc['id'] ?>' />
        <input type='hidden' id='mm-loc-<?= $loc['id'] ?>' value='<?= $loc['geoloc'] ?>' />
        <input type='hidden' id='mm-title-<?= $loc['id'] ?>' value='<?= empty($loc['title']) ? $dist['title'] : $loc['title'] ?>' />
        <input type='hidden' id='mm-descr-<?= $loc['id'] ?>' value='<?= $loc['addr'] .", ".$loc['town'] ."<br />Tel: " . $loc['tel'] ?>' />
        <?php
    }
    if($showMap) {
        ?>
        <div class="mapa" id="gmap_canvas"></div>
        <?php
    }

    foreach($locList as $loc) {
        if($msp['header'] && $loc['pos']==1) continue;
        ?>
        <h2><?= empty($loc['title']) ? $dist['title'] : $loc['title'] ?></h2>
        <ul>
            <li><span>Address:</span> <?= $loc['addr'] .", ".$loc['town'] ?></li>
            <li><span>Phone:</span> <?= $loc['tel'] ?></li>
            <?php if(!empty($loc['bhours'])) { ?><li><span>Radno vreme:</span> <?= $loc['bhours'] ?></li><?php } ?>
        </ul>
        <?php
    }
    ?>
</div>