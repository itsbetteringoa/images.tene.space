{footer_script require="jquery"}
<!-- Protected images by the "rightClick" plugin (version {$RIGHTCK.Version}): {$RIGHTCK.Dir}/template/rightClick_protect.tpl -->
jQuery(document).ready(function() {ldelim}
  jQuery(document).on('contextmenu', '{','|@implode:$RIGHTCK.Selectors}',  function() {ldelim}
    return false;
  });
	
  jQuery(document).on('dragstart', '{','|@implode:$RIGHTCK.Selectors}',  function() {ldelim}
    return false;
  });
});
{/footer_script}
