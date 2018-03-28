<ul>
  <li><a href="<?= ADRURI ?>" <?= (@$route[0]['route']=='vodic' && (empty($route[1]) || $route[1]['route']=='brand')) ? "class='current'":"" ?>>Lux brendovi</a></li>
  <li><a href="<?= ADRURI ?>adresar" <?= (@$route[0]['route']=='vodic' && (@$route[1]['route']=='adresar' || @$route[1]['route']=='gdkdist')) ? "class='current'":"" ?>>Lux adresar</a></li>
  <!-- li><a href="<?= GDKURI ?>">Kategorija C predstavite se...</a></li -->
</ul>