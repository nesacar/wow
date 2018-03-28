<script type="text/javascript">
function CreateBookmarkLink() {
 title = "<?= @$seo['main_title'] ?>";
 url = "<?= SURI ?>"
 if (window.sidebar) { // Mozilla Firefox Bookmark
	window.sidebar.addPanel(title, url,"");
 } else if( window.external ) { // IE Favorite
  window.external.AddFavorite( url, title); }
 else if(window.opera && window.print) { // Opera Hotlist
	var chr = 'CTRL+D';
	var agt=navigator.userAgent.toLowerCase();
	if(agt.substr(agt.indexOf('opera')+6,1) < 9) chr = 'CTRL+T';
	alert('Use '+chr+' to save this page in Opera.');
 }
 else if(navigator.userAgent.indexOf(" OPR/ ")>0) {
   alert('Use CTRL+D to save this page in Opera.');
 }
 return false;
}
</script>
<section class="social">
  <ul>
    <li><a href="#" onClick="return CreateBookmarkLink()"><img src="<?= TURI ?>img/fav-header.png"></a></li>
    <?php if(@$setup->link_fb) {  ?><li><a href="<?= @$setup->link_fb ?>"><img src="<?= TURI ?>img/facebook-header.png"></a></li><?php } ?>
    <?php if(@$setup->link_twt) { ?><li><a href="<?= @$setup->link_twt ?>"><img src="<?= TURI ?>img/twitter-header.png"></a></li><?php } ?>
    <li><a href="<?= SURI ?>rss"><img src="<?= TURI ?>img/rss-header.png"></a></li>
  </ul>
</section>