{combine_script id='jquery' path='themes/default/js/jquery.min.js'}
{combine_script id='jquery.cluetip' require='jquery' path='themes/default/js/plugins/jquery.cluetip.js'}
{combine_script id='jquery.tablesorter' require='jquery' path=$PP_PATH|@cat:'admin/template/js/jquery.tablesorter.min.js'}
{combine_script id='jquery.tablesorter.pager' require='jquery' path=$PP_PATH|@cat:'admin/template/js/jquery.tablesorter.pager.min.js'}

{combine_css path= $PP_PATH|@cat:'admin/template/pp.css'}
{if $PP_THEME=='clear'}{combine_css path= $PP_PATH|@cat:'admin/template/themes/clear/theme.css'}{/if}
{if $PP_THEME=='roma'}{combine_css path= $PP_PATH|@cat:'admin/template/themes/roma/theme.css'}{/if}


<script type="text/javascript">
jQuery().ready(function()
{ldelim}
  jQuery('.cluetip').cluetip(
  {ldelim}
    width: 600,
    splitTitle: '|'
  {rdelim});
{rdelim});

$(document).ready(function() 
    {ldelim}
      $("#sorting")
      .tablesorter(
      {ldelim}
          widgets: ["zebra"],
          widgetOptions :
          {ldelim}
              zebra : [ "normal-row", "alt-row" ]
          {rdelim},
          sortList:[[1,0]],
          // pass the headers argument and assing a object 
          headers:
          {ldelim}
              // assign the second column (we start counting zero) 
              0:
              {ldelim} 
                  // disable it by setting the property sorter to false 
                  sorter: false
              {rdelim},
              // assign the second column (we start counting zero) 
              2:
              {ldelim} 
                  // disable it by setting the property sorter to false 
                  sorter: false
              {rdelim},
          {rdelim}
      {rdelim})
      .tablesorterPager({ldelim}container: $("#pager"), page: 0, size: 20, output: '{ldelim}page{rdelim} / {ldelim}totalPages{rdelim}'{rdelim});
    {rdelim} 
);
</script>

<div class="titrePage">
  <h2>{'PP_Title'|@translate} {$PP_VERSION}<br/>{'PP_Pwd_Actions'|@translate}</h2>
</div>

<form method="post" class="general">
  <fieldset>
  	<legend class="cluetip" title="{'PP_Pwd_Actions'|translate}|{'PP_Pwd_Actions_d'|translate}">{'PP_Pwd_Actions'|@translate}</legend>
{if count($users) > 0}
      <table id="sorting" class="table2">
  		  <thead>
    			<tr class="throw">
      			<th>&nbsp;</th>
      			<th>{'Username'|@translate}&nbsp;&nbsp;</th>
            <th>{'Profile'|@translate}&nbsp;&nbsp;</th>
            <th>{'User status'|@translate}&nbsp;&nbsp;</th>
      			<th>{'Email address'|@translate}&nbsp;&nbsp;</th>
         {if $PWRESET == True}
            <th>{'PP_PwdReset'|@translate}&nbsp;&nbsp;</th>
         {/if}
         {if $LOGFAILBLOCK == True}
            <th>{'PP_LockedUsers'|@translate}&nbsp;&nbsp;</th>
         {/if}
    			</tr>
  			</thead>
        <tbody>
        {foreach from=$users item=user name=users_loop}
          <tr class="{if $smarty.foreach.users_loop.index is odd}row1{else}row2{/if}">
            <td><input type="checkbox" name="selection[]" value="{$user.ID}" {$user.CHECKED} id="selection-{$user.ID}"/></td>
            <td><label for="selection-{$user.ID}">{$user.USERNAME}</label></td>
            <td style="text-align:center;"><a href="./admin.php?page=profile&amp;user_id={$user.ID}" title="{'Profile'|@translate}" onclick="window.open(this.href); return false;"><img src="{$PP_PATH}admin/template/icons/edit_s.png" alt=""/></a></td>
            <td>{$user.STATUS}</td>
            <td>{$user.EMAIL}</td>
          {if $PWRESET == True}
            <td style="text-align:center;">{$user.PWDRESET}</td>
          {/if}
          {if $LOGFAILBLOCK == True}
            <td style="text-align:center;">{$user.PWD_LOCKED}</td>
          {/if}
          </tr>
        {/foreach}
      </tbody>
      </table>

  <div id="pager" class="pager">
		<img src="{$PP_PATH}admin/template/icons/first.png" class="first" alt=""/>
		<img src="{$PP_PATH}admin/template/icons/prev.png" class="prev" alt=""/>
		<input type="text" class="pagedisplay"/>
		<img src="{$PP_PATH}admin/template/icons/next.png" class="next" alt=""/>
		<img src="{$PP_PATH}admin/template/icons/last.png" class="last" alt=""/>
		<select class="pagesize" title="{'PP_Select page size'|@translate}">
			<option  value="10">10</option>
			<option selected="selected" value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
		</select>
    <select class="gotoPage" title="{'PP_Select page number'|@translate}"></select>
  </div>
  <br/>

  <fieldset>
    <legend>{'target'|@translate}</legend>
      <label><input type="radio" name="target" value="all"/> {'all'|@translate}</label>
      <label><input type="radio" name="target" value="selection" checked="checked"/> {'selection'|@translate}</label>
  </fieldset>

  {if $PWRESET == True}
  <fieldset>
    <legend>{'PP_PwdReset'|@translate}</legend>
      <label>{'confirm'|@translate} : <input type="checkbox" name="confirm_pwdreset" value="1"/></label><br />
      <input class="submit" type="submit" value="{'PP_Password reset selected users'|@translate}" name="pwdreset"/>
  </fieldset>
  {/if}
  {if $LOGFAILBLOCK == True}
  <fieldset>
    <legend>{'PP_Unlock'|@translate}</legend>
      <label>{'confirm'|@translate} : <input type="checkbox" name="confirm_unlock" value="1"/></label><br />
      <input class="submit" type="submit" value="{'PP_Unlock selected users'|@translate}" name="unlock"/>
  </fieldset>
  {/if}
  </fieldset>
{else}
	<div>
    {'PP_No_Userlist'|@translate}
	</div>
{/if}
</form>