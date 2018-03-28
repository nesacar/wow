<section class="wrapper">
  <section class="left">
    <section class="leftwhite-adr">

      <article class="adresarslajfna2">
        <h1><a href="<?= ADRURI ?>">ADRESAR</a> - BRENDOVI</h1>
      </article>

      <div class="clear"></div>
       <?php
        $bannerIndex = "ADR_H1";
        include "inc/openx-banner.php";
      ?>

      <div class="neka-klasa-za-kategorije-asortimana" id="assortment-filter">
        <a class='adresarbutton' href='#svi-brendovi' onClick="return false" data-filter="0">Svi brendovi</a>
        <?php foreach($assortmentList as $a) echo "<a class='adresarbutton' href='#{$a['title']}' onClick='return false' data-filter='{$a['id']}'>{$a['title']}</a>\n"; ?>
      </div>


	    <?php if(!empty($brandList)) { ?>
      <div class="clear"></div>
      <section class="brendovilista">

        <div>
        <?php foreach($brandList as $b) { ?>
          <li class="assortment-filter-item <?= $b['asc'] ?>">
            <a href="<?= ADRURI . $b['furl'] ?>" title="<?= $b['title'] ?>">
              <img src="<?= SURI ?>image.php/<?= basename($b['logo']) ?>?width=118&height=118&cropratio=1:1&image=<?= SURI . $b['logo']?>" alt="<?= $b['title'] ?>">
            </a>
      		  <h1><?= $b['title'] ?></h1>
      		</li>
        <?php } ?>
        </ul>
      </section>
      <?php } ?>

      <div class="clear"></div>
      <?php
        $bannerIndex = "ADR_H3";
        include "inc/openx-banner.php";
      ?>
    </section>
  </section>
  <?php include 'inc/aside-full.php'; ?>
</section>
<div class="clear"></div>
<?php include 'inc/highlights.php'; ?>

<script type="text/javascript">
$(document).ready(function(){
  $("#assortment-filter a").click(function(){
    var aid = $(this).attr('data-filter');
    $('#assortment-filter-current').html($(this).html());
    $('.brendovilista').hide();
    if(aid==0) $('.assortment-filter-item').show();
    else {
      $('.assortment-filter-item').hide();
      $('.asc_'+aid).show();
    }
    $('.assortment-filter-item').css({marginRight:'10px'});
    $('.brendovilista').fadeIn();
    $('.assortment-filter-item:visible').each(function (i) { if (i % 5 == 4) $(this).css({marginRight:'0'})});
  })
})

</script>