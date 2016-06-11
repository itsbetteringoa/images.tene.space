{combine_script id='jquery.chosen' load='footer' path='themes/default/js/plugins/chosen.jquery.min.js'}
{combine_css path="themes/default/js/plugins/chosen.css"}

{footer_script}{literal}
jQuery(document).ready(function() {
  jQuery(".chzn-select").chosen();

  function checkStatusOptions() {
    if (jQuery("input[name=apply_to_albums]:checked").val() == "list") {
      jQuery("#albumList").show();
    }
    else {
      jQuery("#albumList").hide();
    }
  }

  checkStatusOptions();

  jQuery("input[name=apply_to_albums]").change(function() {
    checkStatusOptions();
  });
});
{/literal}{/footer_script}

{html_style}{literal}
fieldset {border:none; border-top:1px solid #bbb;}
{/literal}{/html_style}

<div class="titrePage">
  <h2>{'Configuration'|@translate} - Polaroid</h2>
</div>

<form method=post>
<fieldset>
  <legend>{'Apply to albums'|@translate}</legend>
  <p>
    <label><input type="radio" name="apply_to_albums" value="all"{if $apply_to_albums eq 'all'} checked="checked"{/if}> <strong>{'all albums'|@translate}</strong></label>
    <label><input type="radio" name="apply_to_albums" value="list"{if $apply_to_albums eq 'list'} checked="checked"{/if}> <strong>{'a list of albums'|@translate}</strong></label>
  </p>
  <p id="albumList">
    <select data-placeholder="Select albums..." class="chzn-select" multiple style="width:700px;" name="albums[]">
      {html_options options=$album_options selected=$album_options_selected}
    </select>
  </p>
</fieldset>

<p class="formButtons">
  <input type="submit" name="submit" value="{'Save Settings'|@translate}">
</p>

</form>
