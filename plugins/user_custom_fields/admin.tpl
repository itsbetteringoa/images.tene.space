{combine_script id='jquery.ui.sortable' require='jquery.ui' load='footer' path='themes/default/js/ui/minified/jquery.ui.sortable.min.js'}
{combine_script id='core.scripts' load='async' path='themes/default/js/scripts.js'}
{footer_script}
jQuery(document).ready(function(){
  jQuery(".drag_button").show();
  jQuery(".categoryLi").css("cursor","move");
  jQuery(".categoryUl").sortable({
    axis: "y",
    opacity: 0.8,
    update : function() {
      jQuery("#manualOrderInfo").show();
    }
  });

  jQuery("#infoOrdering").submit(function(){
    ar = jQuery('.categoryUl').sortable('toArray');
    for(i=0;i < ar.length ;i++) {
      iord = ar[i].split('iord_');
      document.getElementsByName('infoOrd[' + iord[1] + ']')[0].value = i;
    }
  });

  jQuery("#cancelManualOrderInfo").click(function(){
    jQuery(".categoryUl").sortable("cancel");
    jQuery("#manualOrderInfo").hide();
  });
  
  jQuery('.categoryLi').mouseover(function(){
    jQuery(this).children('span').show();
  });
  jQuery('.categoryLi').mouseout(function(){
    jQuery(this).children('span').hide();
  });
  
  jQuery('#aip_sumit').click(function(){
    jQuery("#add_info_edit").show();
    jQuery("#leg_add").show();
    jQuery("#leg_edit").hide();
    jQuery('#aip_add').empty();
    jQuery('#aip_hide').attr('checked', false);
	jQuery('#aip_adminonly').attr('checked', false);
    jQuery('#hideid').val(0);
    jQuery("textarea[name=inserwording]").focus();
  });
  
  jQuery("#addinfoClose").click(function(){
    jQuery("#add_info_edit").hide();
  });

  jQuery('.pphide').click(function(){
    var id= $(this).data('id');
    var link= $(this).data('link2');
    $.ajax({
        method: 'POST',
        url: link,
        success: function(Datalc,textStatus,jqXHR) {
          jQuery('#pphide'+id).hide();
          jQuery('#ppshow'+id).show();
		  jQuery('#ppobligatorys'+id).hide();
          jQuery('#ppobligatoryh'+id).show();
          jQuery('#iord_'+id).css("opacity","0.4");
		  $('#edit_libinfo'+id).attr('data-hide', 0);
        }
      });
  });
  jQuery('.ppshow').click(function(){
    var id= $(this).data('id');
    var link= $(this).data('link2');
    $.ajax({
        method: 'POST',
        url: link,
        success: function(Datalc,textStatus,jqXHR) {
          jQuery('#pphide'+id).show();
          jQuery('#ppshow'+id).hide();
          jQuery('#iord_'+id).css("opacity","1");
		  $('#edit_libinfo'+id).attr('data-hide', 1);
         }
      });
  });
  jQuery('.ppadminonlyh').click(function(){
    var id= $(this).data('id');
    var link= $(this).data('link3');
    $.ajax({
        method: 'POST',
        url: link,
        success: function(Datalc,textStatus,jqXHR) {
          jQuery('#ppadminonlyh'+id).hide();
          jQuery('#ppadminonlys'+id).show();
		  $('#edit_libinfo'+id).attr('data-adminonly', 1);
        }
      });
  });
  jQuery('.ppadminonlys').click(function(){
    var id= $(this).data('id');
    var link= $(this).data('link3');
    $.ajax({
        method: 'POST',
        url: link,
        success: function(Datalc,textStatus,jqXHR) {
          jQuery('#ppadminonlyh'+id).show();
          jQuery('#ppadminonlys'+id).hide();
		  $('#edit_libinfo'+id).attr('data-adminonly', 0);
         }
      });
  });

  jQuery('.ppobligatoryh').click(function(){
    var id= $(this).data('id');
    var link= $(this).data('link4');
    $.ajax({
        method: 'POST',
        url: link,
        success: function(Datalc,textStatus,jqXHR) {
          jQuery('#ppobligatoryh'+id).hide();
          jQuery('#ppobligatorys'+id).show();
		  $('#edit_libinfo'+id).attr('data-obligatory', 1);
        }
      });
  });
  jQuery('.ppobligatorys').click(function(){
    var id= $(this).data('id');
    var link= $(this).data('link4');
    $.ajax({
        method: 'POST',
        url: link,
        success: function(Datalc,textStatus,jqXHR) {
          jQuery('#ppobligatoryh'+id).show();
          jQuery('#ppobligatorys'+id).hide();
		  $('#edit_libinfo'+id).attr('data-obligatory', 0);
         }
      });
  });

  jQuery('.edit_libinfo').click(function(){
    var id_prop_photo=$(this).data('id');
    var lib=$(this).data('lib');
    var hide=$(this).data('hide');
	var adminonly=$(this).data('adminonly');
	var obligatory=$(this).data('obligatory');
    jQuery("#add_info_edit").show();
    jQuery("#leg_add").hide();
    jQuery("#leg_edit").show();
    jQuery('#hideid').val(id_prop_photo);
    jQuery('#aip_add').text(lib);
	if(hide==1){
		jQuery('#aip_hide').prop('checked', false);
	}else{
		jQuery('#aip_hide').prop('checked', true);
	}
	if(adminonly==0){
		jQuery('#aip_adminonly').prop('checked', false);
	}else{
		jQuery('#aip_adminonly').prop('checked', true);
    }
	if(obligatory==0){
		jQuery('#aip_obligatory').prop('checked', false);
	}else{
		jQuery('#aip_obligatory').prop('checked', true);
    }
    jQuery("textarea[name=inserwording]").focus();
	
  });
  
});
{/footer_script}
{html_style}
.mouse:hover{
    cursor:pointer;
}
{/html_style}


<div class="titrePage">
  <h2>{'Manage user custom filds'|@translate}</h2>
</div>
{if isset ($addinfotemplate)}
        <p class="showCreateAlbum">
            <a href="#" id="aip_sumit" >{'Create new custom filds'|@translate} </a>
        </p>
    <div id="add_info_edit" style="display: none;">
        <form method="post" >
            <fieldset>
                <legend><span id="leg_add">{'Create new custom filds'|@translate}</span><span id="leg_edit">{'Edit custom filds'|@translate}</span></legend>
                <input id="hideid" type="hidden" name="invisibleID" value="{$addinfo_edit2.AIPID}">
                <p class="input">
                    <label for="inserwording">{'Wording'|@translate}</label><br />
                    <textarea {if $useED==1}placeholder="{'Use Extended Description tags...'|@translate}"{/if} style="margin-left:50px" rows="5" cols="50" class="description" name="inserwording" id="aip_add">{$addinfo_edit2.AIPDESC}</textarea>
                    {if $useED==1}
                    <a href="{$ROOT_URL}admin/popuphelp.php?page=extended_desc" onclick="popuphelp(this.href); return false;" title="{'Use Extended Description tags...'|translate}" style="vertical-align: middle; border: 0; margin: 0.5em;"><img src="{$ROOT_URL}{$themeconf.admin_icon_dir}/help.png" class="button" alt="{'Use Extended Description tags...'|translate}'"></a>
                    {/if} 
                </p>
                <p class="input" style="width: 700px;">
                    <label for="inseractive">{'Hide'|@translate}</label>
                    <input id="aip_hide" type="checkbox" name="inseractive" {if {$addinfo_edit2.AIPACTIF}==1}checked{/if} value="1">
                </p>
				<p class="input" style="width: 700px;">
                    <label for="adminonly">{'Admin only'|@translate}</label>
                    <input id="aip_adminonly" type="checkbox" name="adminonly" {if {$addinfo_edit2.UCFADMINONLY}==1}checked{/if} value="1">
                </p>
				<p class="input" style="width: 700px;">
                    <label for="obligatory">{'Obligatory'|@translate}</label>
                    <input id="aip_obligatory" type="checkbox" name="obligatory" {if {$addinfo_edit2.UCFOBLIGATORY}==1}checked{/if} value="1">
                </p>
				<p class="actionButtons">
                    <input class="submit" name="submitUCF" type="submit" value="{'Submit'|@translate}" />
                    <a href="#" id="addinfoClose">{'Cancel'|@translate}</a>
                </p>
            </fieldset>
        </form>
    </div>
    <form id="infoOrdering" method="post" >
        <p id="manualOrderInfo" style="display:none; text-align: left">
          <input class="submit" name="submitManualOrderInfo" type="submit" value="{'Save order'|@translate}">
          {'... or '|@translate} <a href="#" id="cancelManualOrderInfo">{'cancel manual order'|@translate}</a>
        </p>
	<fieldset>
	<legend>{'Fields List'|@translate}</legend>
          <ul class="categoryUl">
            {foreach from=$user_custom_fields item=ucf}
              <li {if ($ucf.UCFACTIVE==1)}style="opacity: 1;"{else}style="opacity: 0.4;"{/if}class="categoryLi{if ($ucf.UCFEDIT==1)} virtual_cat{/if}" id="iord_{$ucf.IDUCF}">
                <img src="{$themeconf.admin_icon_dir}/cat_move.png" class="drag_button" style="display:none;" alt="{'Drag to re-order'|@translate}" title="{'Drag to re-order'|@translate}">
                {$ucf.UCFWORDING}
                <input type="hidden" name="infoOrd[{$ucf.IDUCF}]" value="{$ucf.UCFORDER}">
                <br />
                <span class="actiononphoto" style="display: none">
					{if ($ucf.UCFOBLO==1)}
                    <span id="pphide{$ucf.IDUCF}" {if ($ucf.UCFACTIVE==0)}style="display: none"{/if}class="graphicalCheckbox icon-check-empty mouse pphide" data-id="{$ucf.IDUCF}" data-link2="{$ucf.U_HIDE}">{'Hide'|@translate}</span>
                    <span id="ppshow{$ucf.IDUCF}" {if ($ucf.UCFACTIVE==1)}style="display: none"{/if}class="graphicalCheckbox icon-check mouse ppshow" data-id="{$ucf.IDUCF}" data-link2="{$ucf.U_SHOW}">{'Hide'|@translate}</span>
                    {/if}
					{if ($ucf.UCFEDIT==1)}
					| <span id="edit_libinfo{$ucf.IDUCF}" class="edit_libinfo mouse icon-pencil" data-id="{$ucf.IDUCF}" data-lib="{$ucf.UCFWORDING2}" data-hide="{$ucf.UCFACTIVE}" data-adminonly="{$ucf.UCFADMINONLY}" data-obligatory="{$ucf.UCFOBLIGATORY}"/>{'Edit'|@translate}</span>
					| <a href="{$ucf.U_DELETE}" onclick="return confirm('{'Are you sure?'|@translate|@escape:javascript}');"><span class="icon-trash"></span>{'delete'|@translate}</a>
					|<span id="ppadminonlyh{$ucf.IDUCF}" {if ($ucf.UCFADMINONLY==1)}style="display: none"{/if}class="graphicalCheckbox icon-check-empty mouse ppadminonlyh" data-id="{$ucf.IDUCF}" data-link3="{$ucf.U_ADMINONLYHIDE}">{'Admin only'|@translate}</span>
                    <span id="ppadminonlys{$ucf.IDUCF}" {if ($ucf.UCFADMINONLY==0)}style="display: none"{/if}class="graphicalCheckbox icon-check mouse ppadminonlys" data-id="{$ucf.IDUCF}" data-link3="{$ucf.U_ADMINONLYSHOW}">{'Admin only'|@translate}</span>
                    {/if}
					{if ($ucf.UCFOBLO==1)}
					|<span id="ppobligatoryh{$ucf.IDUCF}" {if ($ucf.UCFOBLIGATORY==1)}style="display: none"{/if}class="graphicalCheckbox icon-check-empty mouse ppobligatoryh" data-id="{$ucf.IDUCF}" data-link4="{$ucf.U_OBLIGATORYHIDE}">{'Obligatory'|@translate}</span>
					<span id="ppobligatorys{$ucf.IDUCF}" {if ($ucf.UCFOBLIGATORY==0)}style="display: none"{/if}class="graphicalCheckbox icon-check mouse ppobligatorys" data-id="{$ucf.IDUCF}" data-link4="{$ucf.U_OBLIGATORYSHOW}">{'Obligatory'|@translate}</span>
					{/if}
				</span>
                <br />
              </li>
            {/foreach}
          </ul>
        </fieldset>
    </form>
{/if}
{if isset ($editusertemplate)}
<form method="post" name="ucfprofile" id="ucfprofile" class="properties">
 <input id="hideuserid" type="hidden" name="invisibleUSERID" value="{$UCF_USERID}">
 <fieldset>
  <legend>{$UCF_USERNAME}</legend>
    <ul>
      {foreach from=$tab_user_custom_fields_adminlist item=userinfo}
		{if $userinfo.UCFID == 1}
		{else if $userinfo.UCFID == 2}
		{else if $userinfo.UCFID == 3}
		{else if $userinfo.UCFID == 4}
		{else if}
		  <li>
			<span class="property">
              <label for="login">{$userinfo.UCFWORDING}</label>
			</span>
			<input type="text" name="data[{$userinfo.UCFID}]" id="data[{$userinfo.UCFID}]" value="{$userinfo.UCFDATA}"> {if $userinfo.UCFADMINONLY==1}{'Admin only'|@translate}{/if}
		  </li>
        {/if}
	  {/foreach}
  </ul>
  <p class="actionButtons">
	<input class="submit" name="submitUCFa" type="submit" value="{'Submit'|@translate}" />
	<a href="#" id="addinfoClose">{'Cancel'|@translate}</a>
  </p>
 </fieldset>
</form>
{/if}