<div id="leftholder">
  <div style="margin:0; padding:0; height:20px; width:740px; float:left; position:relative;">
    <img src="<?= TURI ?>images/linetheme.png" width="740" height="20" />
  </div>
  <div id="left">
    <?php if($session->logged_in)  Common::dbg($e);  else { ?>
    <h2>Greška</h2>
    Nažalost došlo je do greške :(
    <br />
    Administrator je obavešten i stvar će uskoro biti rešena
    <br /><br /><br /><br />
    <?php } ?>
  </div>
</div>

