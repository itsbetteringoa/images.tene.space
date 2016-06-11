<div class="titrePage">
  <h2>{'Read metadata'|@translate}</h2>
</div>
{if isset ($read)}
  <form method="post" >
	<fieldset id="mainrm">
	  <legend>{'Choose photo ID'|@translate}</legend>
	  <input type="number" name="idreadmetadata" value="{$read.RM_ID}">
	  <p>
	    <input class="submit" name="submitreadmetadata" type="submit" value="{'Submit'|@translate}">
	  </p>
	</fieldset>
  </form>
{/if}
{if isset ($readmetadata)}
  <p style="text-align:left;padding-left:20px">
    <a href="{$readmetadata.U_SHOWPHOTOADMIN}"><span class="icon-wrench"></span>{'Photo admin page'|@translate}</a>
  </p>
  <fieldset id="mainrm">
    <legend>{'Information is read from'|@translate} {$readmetadata.RM_NAME} - {$readmetadata.RM_FILE}</legend>
	<p style="text-align:left;">
	  <img src="{$readmetadata.RM_SCR}" alt="{'Thumbnail'|translate}"><br>
	  <br>
	  <span style="font-size:1.2em;font-weight: bold;">{$readmetadata2.RM_IPTCWORDING} {$readmetadata.RM_FILE}</span>
      {foreach from=$rm_iptc item=rm}
	    <br>{$rm.RM_KEY} = {$rm.RM_VALUE}
	  {/foreach}
    <p>
	<p style="text-align:left;">
	<span style="font-size:1.2em;font-weight: bold;">{$readmetadata3.RM_EXIFWORDING} {$readmetadata.RM_FILE}</span><br>
    {foreach from=$rm_exif item=rm}
	  {if isset ($rm.RM_SECTION) and $rm.RM_SECTION!='1'}
	    {$rm.RM_SECTION}
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  {/if}
	  {$rm.RM_KEY} = {$rm.RM_VALUE}<br>
	{/foreach}
    <p>
  </fieldset>
  
{/if}