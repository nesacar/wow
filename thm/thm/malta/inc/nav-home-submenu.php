<ul>
             <?php foreach($towns as $t) echo "<li ".((@$route[0]['route']=='town' && @$route[0]['id']==$t['id']) || (@$route[1]['route']=='town' && @$route[1]['id']==$t['id']) ? "class='active'" : "")."><a href='{$navParentURI}{$t['furl']}'>{$t['title']}</a></li>\n"; ?>
           </ul>
