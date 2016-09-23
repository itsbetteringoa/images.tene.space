</li>
<li>
  {include file=$EASYCAPTCHA_ABS_PATH|cat:'template/common.inc.tpl'}

  {* <!-- DRAG & DROP --> *}
  {if $EASYCAPTCHA.challenge == 'drag'}
  <span class="property"><label class="easycaptcha_hint">{'To verify you are a human, please place the <b>%s</b> in the most right box bellow.'|translate:$EASYCAPTCHA.drag.text}</label></span>

  {* <!-- TIC TAC TOE --> *}
  {else if $EASYCAPTCHA.challenge == 'tictac'}
  <span class="property"><label class="easycaptcha_hint">{'You are player X, click on the right case to complete the line.'|translate}</label></span>

  {/if}
  {$smarty.capture.easycaptcha}