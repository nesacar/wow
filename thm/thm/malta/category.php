<?php include "inc/slider.php"; ?>

<aside class="col-md-14">
  <?php
      $bannerIndex = "D1";
      include "inc/revive-banner.php";
  ?>
</aside>

<section class="col-md-13 article">
<?php
  $pageList = $pages1;
  include "inc/articles.php";
?>
</section>

<aside class="col-md-14">
  <section>
  <?php
  if(!$mobile) {
    $bannerIndex = "D2";
    include "inc/revive-banner.php";
  }else{
    $bannerIndex = "MD2";
    include "inc/revive-banner.php";
  }
  ?>
  </section>

  <?php
    include "inc/map.php";
    include "inc/top.php";
  //include "inc/addthis.php";
   include "inc/social-buttons.php";

  ?>
</aside>

<?php include "inc/highlights.php"; ?>

 <section class="col-md-13 article">
<?php
  $pageList = $pages2;
  include "inc/articles.php";
?>
  <div class="show-more" id="scroll_end"><img src="<?= TURI ?>img/arr.png" style="width: auto; height: auto;" alt="učitaj jos sadrzaja"></div>
</section>

<aside class="col-md-14">
  <section>
  <?php
  if(!$mobile) {
    $bannerIndex = "D3";
    include "inc/revive-banner.php";
  }else{
    $bannerIndex = "MD3";
    include "inc/revive-banner.php";
  }
  ?>
  </section>

  <?php
    //include "inc/aside-gdk.php";
   

  $bannerIndex = "D4";
  include "inc/revive-banner.php";
  $bannerIndex = "D5";
  include "inc/revive-banner.php";

    include "inc/aside-brands.php";
    
     include "inc/aside-fb.php";
    include "inc/social-buttons.php";
    //include "inc/aside-tagcloud.php";
  ?>
</aside>

<!-- Skripta za ucitavanje na kraju scroll-a -->
<script type="text/javascript">
var los_sem = false; //semaphore
var los_page = 1;
$('#scroll_end').click(loadOnScroll);
//$(window).scroll(function(){if(!los_sem && $(window).scrollTop()+$(window).height() >= $('#scroll_end').position().top) loadOnScroll();});
function loadOnScroll(){
  var link = "<?= SURI . @$relatedParams['by'] ?>/scroll";
  if(los_sem) return;
  los_sem = true; los_page++;
  $.post(link,{by:'<?= @$relatedParams['by'] ?>',id:'<?= @$relatedParams['id'] ?>',cat: '<?= @$relatedParams['cat'] ?>' ,limit:'<?= @$relatedParams['limit'] ?>',page:los_page},function(data){if(data=='empty') {$('#scroll_end').slideUp(); return;} $('#scroll_end').before(data); los_sem=false;});
}
</script>

<!-- Related can be by: home, category, town, or brand (pgt scroll is not related...) -->