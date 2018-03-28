<?php
if(empty($bannerIndex)) return;
$sInd = "bnr_".$bannerIndex;
if(!@$setup->$sInd) return;

$openX = array(
'H1'      => array('zoneid'=>'19','n'=>'ade7a8d6','class'=>''),
'H2_125'  => array('zoneid'=>'21','n'=>'a0ff3b0d','class'=>'banner-top'),
'H2_250'  => array('zoneid'=>'22','n'=>'a38e2707','class'=>'banner-top'),
//'H3'      => array('zoneid'=>'58','n'=>'a31d24aa','class'=>'bnrH3'),

'D1'   => array('zoneid'=>'159','n'=>'aa8e07c6','class'=>'add'),
'D2'   => array('zoneid'=>'160','n'=>'a084c752','class'=>'add-two'),
'D3'   => array('zoneid'=>'164','n'=>'a9d4417a','class'=>'add-down'),

'BL' => array('zoneid'=>'164','n'=>'a6f6fd68','class'=>'bnrBL'),
'BR' => array('zoneid'=>'165','n'=>'a0ff41de','class'=>'bnrBR'),

'BH1' => array('zoneid'=>'20','n'=>'ae38bdc0','class'=>'bnrBH1'),
'BH2' => array('zoneid'=>'27','n'=>'a869e3d8','class'=>'bnrBH2'),
'BH3' => array('zoneid'=>'161','n'=>'a90dda7f','class'=>'bnrBH3'),
'MBH3' => array('zoneid'=>'162','n'=>'ab4b588a','class'=>'bnrMBH3'),
'MBW' => array('zoneid'=>'162','n'=>'ab4b588a','class'=>'bnrMBW'),

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
    <a href='http://banners.ministudio.rs/www/delivery/ck.php?n=<?= $banner['n'] ?>&amp;cb=<?= rand(1,getrandmax()) ?>' target='_blank'><img src='http://banners.ministudio.rs/www/delivery/avw.php?zoneid=<?= $banner['zoneid'] ?>&amp;cb=<?= rand(1,getrandmax()) ?>&amp;n=<?= $banner['n'] ?>' border='0' alt='' /></a>
</section>