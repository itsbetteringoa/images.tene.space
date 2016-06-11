<div class="titrePage">
  <h2>ShareThis - {$SHARETHIS_VERSION}</h2>
  <div class="left-links{if $CUSTOM_CSS!=="yes"} no-gd{/if}">
    <ul><li><a href="http://blog.dragonsoft.us/piwigo/" target="_blank">{'Home'|@translate}</a>&nbsp;|&nbsp;</li>
      {if $CUSTOM_CSS=="yes"}
      <li><a class="ajax cboxElement" href="{$SHARETHIS_PATH|cat:"changelog.php"}?version={$SHARETHIS_VERSION}">{'Changelog'|@translate}</a>&nbsp;|&nbsp;</li>
      {/if}
      <li><a href="http://piwigo.org/forum/viewtopic.php?id=158356" target="_blank">{'Support'|@translate}</a>&nbsp;|&nbsp;</li>
      <li><a title="Follow me on Twitter" href="http://twitter.com/greydragon_th" target="_blank">{'Follow'|@translate}</a>&nbsp;|&nbsp;</li>
      <li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GYVNZCNDMSD58" target="_blank">{'Coffee Fund'|@translate}</a>&nbsp;|&nbsp;</li>
      <li><a href="http://piwigo.org/ext/extension_view.php?eid=793" onclick="return false" target="_blank">{'Download'|@translate}</a></li>
    </ul>
  </div>
</div>

<form action="" method="post">
<fieldset id="ShareThis">
  <legend>{'Configuration'|@translate}</legend>
  <ul>
    <li><label><span class="graphicalCheckbox {if $INC_FACEBOOK}icon-check{else}icon-check-empty{/if}">&nbsp;</span><input name="inc_facebook" id="inc_facebook" type="checkbox" value="1" {if $INC_FACEBOOK}checked="checked"{/if}>{'Post to Facebook'|@translate}</label></li>
    <li><label><span class="graphicalCheckbox {if $INC_PINTEREST}icon-check{else}icon-check-empty{/if}">&nbsp;</span><input name="inc_pinterest" id="inc_pinterest" type="checkbox" value="1" {if $INC_PINTEREST}checked="checked"{/if}>{'Post to Pinterest'|@translate}</label></li>
    <li><label><span class="graphicalCheckbox {if $INC_TWITTER}icon-check{else}icon-check-empty{/if}">&nbsp;</span><input name="inc_twitter" id="inc_twitter" type="checkbox" value="1" {if $INC_TWITTER}checked="checked"{/if}>{'Post to Twitter'|@translate}</label></li>
    <li><label><span class="graphicalCheckbox {if $INC_GOOGLEPLUS}icon-check{else}icon-check-empty{/if}">&nbsp;</span><input name="inc_googleplus" id="inc_googleplus" type="checkbox" value="1" {if $INC_GOOGLEPLUS}checked="checked"{/if}>{'Post to Google Plus'|@translate}</label></li>
    <li><label><span class="graphicalCheckbox {if $INC_TUMBLR}icon-check{else}icon-check-empty{/if}">&nbsp;</span><input name="inc_tumblr" id="inc_tumblr" type="checkbox" value="1" {if $INC_TUMBLR}checked="checked"{/if}>{'Post to Tumblr'|@translate}</label></li>
  </ul>
</fieldset>
<fieldset>
  <p><input type="submit" name="submit" value="{'Submit'|@translate}"></p>
</fieldset>
</form>

{combine_css path=$SHARETHIS_PATH|cat:"/css/admin.css"}

{if $CUSTOM_CSS=="yes"}
  {combine_css path="themes/default/js/plugins/colorbox/style2/colorbox.css"}
  {combine_css path=$GDTHEME_PATH|cat:"admin/css/styles.css"}
  {combine_script id='jquery.colorbox' load='footer' require='jquery' path='themes/default/js/plugins/jquery.colorbox.min.js' }
  {combine_script id='greydragon.admin' load='footer' require='jquery,jquery.ui.button.js' path=$GDTHEME_PATH|cat:"admin/js/admin.js" }
{else}
{html_head}{literal}
<style type="text/css">
  .graphicalCheckbox { display: none; }
  p.buttons { margin-top: 0; }
  .content select { width: 20.4em !important; margin-right: 0.6em; }
</style>
{/literal}{/html_head}
{/if}

{*
{combine_script id='iloader' load='footer' path=$GDTHUMB_PATH|cat:"/js/image.loader.js"}
{combine_script id='admin.precache' load='footer' path=$GDTHUMB_PATH|cat:"/js/gdthumb.admin.js" require='jquery.ui.effect-slide'}
*}