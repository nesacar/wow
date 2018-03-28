<section class="col-md-13 gallery">
  <div class="overflow">
    <span class="category-top">
      <h1>Unsubscribe from the <span>NEWSLETTER</span> list</h1>
    </span>
  </div>

  <p>
    <?php
    if(isset($odjava_info)) {
      echo "<h2>Info</h2>".$odjava_info;
    }
    else {
    ?>
    <h2>Potvrda odjave</h2>
    <form method="post">
      <input type=hidden name='id' value='<?php echo $usr['id']; ?>' />
      <input type=hidden name='email' value='<?php echo $usr['email']; ?>' />
      <label title='Confirm to unsubscribe'>
      <input type=checkbox name='odjava_potvrda' value='true' onChange="$('#button_odjava').prop('disabled',!this.checked)"/>
        I no longer wish to receive notifications on the email address: <?php echo $usr['email']; ?>
      </label> <br />
      <input type=submit id='button_odjava' value='Unsubscribe' disabled='disabled' />


    </form>

    <?php
    }

    ?>
  </p>
  <div style='height:100px'></div>
</section><!-- gallery index -->

<aside class="col-md-14" style='margin-bottom: 10px'>
  <section>
  <?php
    $bannerIndex = "D1";
    include "inc/revive-banner.php";
  ?>
  </section>
  <section>
  <?php
    $bannerIndex = "D2";
    include "inc/revive-banner.php";
  ?>
  </section>

  <?php
    include "inc/top.php";
    include "inc/social.php";
  ?>
</aside>
