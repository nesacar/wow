<?php
return;
if(empty($brandList)) $brandList = Gdk::brandList();
if(empty($assortmentList)) $assortmentList = Gdk::assortmentList();
if(empty($brandList) || empty($assortmentList)) return;

?>

<section class="links">

  <?php if(false){ ?><a href="<?= ADRURI ?>"><h2>Brands</h2></a> <?php } ?>
    <?php
    if(false){
    foreach($assortmentList as $as) {
      $brandIDs = Gdk::brandIDs4Assortment($as['id']);
      if(empty($brandIDs)) continue;
    ?>

      <article>
        <h3 style="background-color: #4f8718;"><?= $as['title'] ?></h3>
        <ul>
        <?php foreach($brandList as $b) if(in_array($b['id'],$brandIDs)) { ?>
           <li><a style="color: #4f8718;" href="<?= ADRURI . $b['furl']  ?>"><?= $b['title'] ?></a></li>
        <?php } ?>
        </ul>
      </article>
    <?php } ?>

    <?php }else{ ?>

      <?php
      foreach($assortmentList as $as) {
        $brandIDs = Gdk::brandIDs4Assortment($as['id']);
        if(empty($brandIDs)) continue;
        ?>

        <article>
          <h3><?= $as['title'] ?></h3>
          <ul>
            <?php foreach($brandList as $b) if(in_array($b['id'],$brandIDs)) { ?>
                <?php $assort = Gdk::getDistByBrand($b['id']); ?>
                <?php if(!empty($assort)){ ?>
                  <li><a href="<?= ADRURI .$assort['furl']  ?>"><?= $b['title'] ?></a></li>
                <?php } ?>
            <?php } ?>
          </ul>
        </article>
      <?php } ?>

    <?php } ?>
</section>