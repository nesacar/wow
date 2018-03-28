<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P7SZWGZ');</script>
<!-- End Google Tag Manager -->

  <meta charset="utf-8">
  <title><?= @$seo['title'] ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="<?= @$seo['descr'] ?>" />
  <meta name="keywords" content="<?= @$seo['kwrds'] ?>" />
  <meta name="author" content="Mini STUDIO Publishing Group">

  <!-- Facebok Open Graph -->
  <meta property="og:title" content="<?= @$seo['title'] ?>"/>
  <?php if(!empty($gallery)) foreach($gallery as $img) echo "<meta property=\"og:image\" content=\"".SURI.str_replace(" ","%20",$img)."\"/>\n"; ?>
  <?php if(!empty($cat) && $cat['image'] != null){ ?>
      <meta property="og:image" content="<?= $cat['image'] ?>"/>
  <?php }else{ ?>
      <meta property="og:image" content="<?= @$seo['main_img'] ?>"/>
  <?php } ?>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="<?= @$seo['url'] ?>"/>
  <meta property="og:site_name" content="<?= @$seo['title'] ?>"/>
  <meta property="og:description" content="<?= @$seo['descr'] ?>" />
  <!-- Facebok Open Graph Kraj-->

  <!-- ITEM za GOOGLE + -->
  <meta itemprop="name" content="<?= @$seo['title'] ?>" />
  <meta itemprop="description" content="<?= @$seo['descr'] ?>" />
  <meta itemprop="image" content="<?= @$seo['main_img'] ?>" />
  <!-- ITEM za GOOGLE + END -->

  <!-- ITEM Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@wowmalta">
  <meta name="twitter:creator" content="@wowmalta">
  <meta name="twitter:title" content="<?= @$seo['title'] ?>">
  <meta name="twitter:description" content="<?= @$seo['descr'] ?>">
  <meta name="twitter:image" content="<?= @$seo['main_img'] ?>">
  <!-- ITEM Twitter END -->

  <!--link rel="stylesheet/less" href="<?= TURI ?>less/bootstrap.less" type="text/css" /-->
  <!--link rel="stylesheet/less" href="<?= TURI ?>less/responsive.less" type="text/css" /-->
  <!--script src="<?= TURI ?>js/less-1.3.3.min.js"></script-->
  <!--append ‘#!watch’ to the browser URL, then refresh the page. -->

  <meta name="google-site-verification" content="udApUfIVWbgCI9pjeC4JZYLdD1JQ-Bzgo6vKHwXVzBs" />

  <link rel="stylesheet" href="<?= TURI ?>css/bootstrap.css" />
  <link rel="stylesheet" href="<?= TURI ?>css/style.css" />
  <link rel="stylesheet" href="<?= TURI ?>css/gdk.css" />
  <link rel="stylesheet" href="<?= TURI ?>css/forms.css" />
  <link rel="stylesheet" href="<?= TURI ?>css/navigation.css" />
  <link rel="stylesheet" href="<?= TURI ?>css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= TURI ?>css/simple-sidebar.css" />
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="<?= TURI ?>js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="icon" type="image/x-icon" href="<?= TURI ?>favicon.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= TURI ?>images/apple-touch-icon.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= TURI ?>images/apple-touch-icon.png" />
  <link rel="apple-touch-icon-precomposed" href="<?= TURI ?>images/apple-touch-icon.png" />
  <link rel="shortcut icon" href="<?= TURI ?>favicon.ico" />
  <style>
    .gallery {
      padding: 10px 10px 0 0;
    }
    .gallery p {
      line-height: 1.4;
    }
    .thumbs li {

    margin: 10px 20px 13px 0;
    width: 93px;
    }
    #bigFrame {
      width: 100%;
    }
    @media(max-width: 991px) {
      .gallery {
        padding-left: 10px !important;
      }
    }
  </style>
  <?php include "inc/js.php"; ?>

  <!-- Google analitika -->
  <!-- <?= @$setup->ga_code ?> -->


  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7SZWGZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
  $bannerIndex = "BL";
  include "inc/revive-banner.php";
  $bannerIndex = "BR";
  include "inc/revive-banner.php";
?>
<?php if(false){ ?>
<a href="<?= SURI ?>"><img src="<?= TURI ?>img/l1.jpg" alt="bnrBL" class="bnrBL"></a>
<a href="<?= SURI ?>"><img src="<?= TURI ?>img/d2.jpg" alt="bnrBR" class="bnrBR"></a>
<?php } ?>
<div id="wrapper">
  <?php include "inc/nav-sidebar.php"; ?>
  <div id="page-content-wrapper">
    <?php include 'inc/header.php' ?>

    <div class="container <?php if(isset($huawei_pr) && $huawei_pr){ ?>svetla-pozadina<?php } ?>"  <?php if(isset($huawei_pr) && $huawei_pr){ ?>id="main-container-pr" <?php }else{ ?>id="main-container"<?php } ?>>
      <div class="clearfix">
      <div class="col-md-12">
        <?php
          $bannerIndex = "H2_125";
          include "inc/revive-banner.php";
          $bannerIndex = "H2_250";
          include "inc/revive-banner.php";
          if(!$mobile) {
            $bannerIndex = "BH3";
            include "inc/revive-banner.php";
          }else{
            $bannerIndex = "MBH3";
            include "inc/revive-banner.php";
          }
        ?>
        <div class="poljeMBH3">
          <?php
            if(empty($mobile)) $mobile = Box::isMobile($_SERVER['HTTP_USER_AGENT']);
            if($mobile){
              $bannerIndex = "MBW";
              include "inc/revive-banner.php";
            }
          ?>
        </div>
      </div>

        <?php include @$body; ?>


        <?php include 'inc/footer-nav.php';?>
      </div>
    </div>

    <?php
      include "inc/footer.php";
      include "inc/newsletter-popup.php";
    ?>
    <?php if(false){ ?>
    <div style="display: none">google-site-verification: googlec58de916056968da.html</div>
    <?php } ?>

    <script>
      $(function(){
        <?php if(false) { ?>
        $.post("<?= SURI ?>rezolucija",
            {rezolucija: $(window).width()},
            function(data){ $('.poljeMBH3').html(data);}
        );
        <?php } ?>
        /*$('.bnrPR1').hover(function(){ $('.bnrPR2').fadeIn(); $(this).fadeOut(); }, function(){
          if($('.bnrPR2').is(':hover')){
            $('.bnrPR2').hover(function(){}, function(){ $(this).fadeOut(); $('.bnrPR1').fadeIn(); });
          }else{
            $('.bnrPR2').fadeOut(); $('.bnrPR1').fadeIn();
          }
        });*/
        $('.bnrPR1').hover(function(){ $('.bnrPR2').css({'display':'block'}); }, function(){});
        $('.bnrPR2').hover(function(){}, function(){ $(this).css({'display':'none'}); });
        $('.close-ban').click(function(){ $('.bnrPR1').css({'display':'none'}); $('.bnrPR2').css({'display':'none'}); $(this).css({'display':'none'});});
      });
    </script>



<!-- Twitter universal website tag code -->
<script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init','nxeh3');
twq('track','PageView');
</script>
<!-- End Twitter universal website tag code -->


</body>
</html>
