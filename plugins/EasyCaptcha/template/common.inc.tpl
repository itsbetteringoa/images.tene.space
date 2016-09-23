{* <!-- DRAG & DROP --> *}
{if $EASYCAPTCHA.challenge == 'drag'}
{combine_script id='jquery.event.drag' load='footer' require='jquery' path=$EASYCAPTCHA_PATH|cat:'template/jquery.events/jquery.event.drag-2.2.js'}
{combine_script id='jquery.event.drop' load='footer' require='jquery' path=$EASYCAPTCHA_PATH|cat:'template/jquery.events/jquery.event.drop-2.2.js'}

{combine_script id='easycaptcha.drag' load='footer' require='jquery.event.drag,jquery.event.drop' path=$EASYCAPTCHA_PATH|cat:'template/drag.js'}
{combine_css id='easycaptcha.drag' path=$EASYCAPTCHA_PATH|cat:'template/drag.css' template=true version=$EASYCAPTCHA.lastmod}

{capture name=easycaptcha}
<noscript id="easycaptcha_noscript">
  {'You must activate JavaScript in your browser in order to be able to add a comment, sorry for the inconvenience.'|translate}
</noscript>

<div id="easycaptcha" style="display:none;">
{counter start=0 assign=i}
{foreach from=$EASYCAPTCHA.drag.selection item=image}
  <div class="drag_item" style="left:{math equation='10+(x+5)*y' x=$EASYCAPTCHA.drag.size y=$i}px;" data-id="{$image}">
    <img src="{$ROOT_URL}{$EASYCAPTCHA_PATH}drag/get.php?{$EASYCAPTCHA.drag.theme}&amp;{$image}">
  </div>
  {counter}
{/foreach}
  <div class="drop_zone">{'Drop'|translate}</div>
</div>

{* <!-- fields are not type "hidden" for LiveValidation in GuestBook and ContactForm --> *}
<input type="text" name="easycaptcha" value="" style="display:none;">
<input type="text" name="easycaptcha_key" value="{$EASYCAPTCHA.key}" style="display:none;">
{/capture}


{* <!-- TIC TAC TOE --> *}
{else if $EASYCAPTCHA.challenge == 'tictac'}
{combine_css id='easycaptcha.tictac' path=$EASYCAPTCHA_PATH|cat:'template/tictac.css' template=true version=$EASYCAPTCHA.lastmod}

{html_style}
#easycaptcha table {
  background: url('{$ROOT_URL}{$EASYCAPTCHA_PATH}tictac/gen.php?t={$smarty.now}') no-repeat;
}
{/html_style}

{footer_script require='jquery'}
(function($){
$('#easycaptcha input').on('change', function() {
    $('#easycaptcha label').removeClass('selected');
    $(this).parent('label').addClass('selected');
});
}(jQuery));
{/footer_script}

{capture name=easycaptcha}
<div id="easycaptcha">
  <table>
    <tr>
      <td><label><input type="radio" name="easycaptcha" value="00"></label></td>
      <td><label><input type="radio" name="easycaptcha" value="10"></label></td>
      <td><label><input type="radio" name="easycaptcha" value="20"></label></td>
    </tr>
    <tr>
      <td><label><input type="radio" name="easycaptcha" value="01"></label></td>
      <td><label><input type="radio" name="easycaptcha" value="11"></label></td>
      <td><label><input type="radio" name="easycaptcha" value="21"></label></td>
    </tr>
    <tr>
      <td><label><input type="radio" name="easycaptcha" value="02"></label></td>
      <td><label><input type="radio" name="easycaptcha" value="12"></label></td>
      <td><label><input type="radio" name="easycaptcha" value="22"></label></td>
    </tr>
  </table>
</div>

<input type="text" name="easycaptcha_key" value="{$EASYCAPTCHA.key}" style="display:none;">
{/capture}

{/if}