<?php
if(empty($bannerIndex)) return;
$sInd = "bnr_".$bannerIndex;
if(!@$setup->$sInd) return;

$openX = array(
'H1'      => array('zoneid'=>'19','n'=>'ade7a8d6','class'=>''),
'H2_125'  => array('zoneid'=>'21','n'=>'a0ff3b0d','class'=>'banner-top'),
'H2_250'  => array('zoneid'=>'22','n'=>'a38e2707','class'=>'banner-top'),
//'H3'      => array('zoneid'=>'58','n'=>'a31d24aa','class'=>'bnrH3'),

'C1'   => array('zoneid'=>'127','n'=>'aa7cba8f','class'=>'bnrC1'),

//'D1'   => array('zoneid'=>'159 ','n'=>'aa8e07c6','class'=>'add_300x250'),
'D1'   => array('zoneid'=>'159','n'=>'743ef895','class'=>'add'),
'D2'   => array('zoneid'=>'160','n'=>'a084c752','class'=>'add-two'),
'MD2'   => array('zoneid'=>'181','n'=>'a084c752','class'=>'bnrMD2'),
'D2exp'   => array('zoneid'=>'92','n'=>'a61380b0','class'=>'bnrD2Exp'),
'D3'   => array('zoneid'=>'163','n'=>'a9d4417a','class'=>'add-down'),
'MD3'   => array('zoneid'=>'182','n'=>'a084c752','class'=>'bnrMD3'),
'D4'   => array('zoneid'=>'178','n'=>'a9d4417s','class'=>'bnrD4'),
'D5'   => array('zoneid'=>'179','n'=>'a9d4417d','class'=>'bnrD5'),

'MAPA'   => array('zoneid'=>'200','n'=>'a6f6fd42','class'=>'bnrMapa'),

'BL' => array('zoneid'=>'164','n'=>'a6f6fd68','class'=>'bnrBL'),
'BR' => array('zoneid'=>'165','n'=>'a0ff41de','class'=>'bnrBR'),

'BH1' => array('zoneid'=>'20','n'=>'ae38bdc0','class'=>'bnrBH1'),
'BH2' => array('zoneid'=>'27','n'=>'a869e3d8','class'=>'bnrBH2'),
'BH3' => array('zoneid'=>'161','n'=>'a90dda7f','class'=>'bnrBH3'),
'MBW' => array('zoneid'=>'162','n'=>'ab4b588a','class'=>'bnrMBW'),
'MBH3' => array('zoneid'=>'180','n'=>'ab4b588a','class'=>'bnrMBH3'),

'PR1' => array('zoneid'=>'93','n'=>'a91c3694','class'=>'bnrPR1'),
'PR2' => array('zoneid'=>'94','n'=>'a91c3694','class'=>'bnrPR2'),
'MPR1' => array('zoneid'=>'142','n'=>'a54eaef2','class'=>'bnrMPR1'),

'GDK_H1' => array('zoneid'=>'33','n'=>'ae22195c','class'=>'bnrGDK_H1'),
'GDK_H2' => array('zoneid'=>'36','n'=>'aaa10a0e','class'=>'bnrGDK_H2'),
'GDK_H3' => array('zoneid'=>'35','n'=>'a59098b5','class'=>'bnrGDK_H3'),
'GDK_H4' => array('zoneid'=>'34','n'=>'aa875d73','class'=>'bnrGDK_H4'),

'ADR_H1' => array('zoneid'=>'30','n'=>'abf528ad','class'=>'bnrADR_H1'),
'ADR_H2' => array('zoneid'=>'32','n'=>'a3936ab4','class'=>'bnrADR_H2'),
'ADR_H3' => array('zoneid'=>'31','n'=>'a709b5f9','class'=>'bnrADR_H3')

);

$banner = @$openX[$bannerIndex];
if(empty($banner)) return;
$class = array($banner['class']);

if(($bannerIndex=="BL" || $bannerIndex=="BR") && @$setup->bnr_fix) $class[] = "fix";

?>

<section class="<?= implode(" ",$class) ?>">
  <script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://banners.ministudio.rs/www/delivery/ajs.php':'http://banners.ministudio.rs/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=<?= $banner['zoneid'] ?>");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
  //]]>--></script>
  <noscript>
    <a href='http://banners.ministudio.rs/www/delivery/ck.php?n=<?= $banner['n'] ?>&amp;cb=<?= rand(1,getrandmax()) ?>' target='_blank'><img src='http://banners.ministudio.rs/www/delivery/avw.php?zoneid=<?= $banner['zoneid'] ?>&amp;cb=<?= rand(1,getrandmax()) ?>&amp;n=<?= $banner['n'] ?>' border='0' alt='' /></a>
  </noscript>
</section>