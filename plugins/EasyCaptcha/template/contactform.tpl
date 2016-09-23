<tr>
  {include file=$EASYCAPTCHA_ABS_PATH|cat:'template/common.inc.tpl'}

  {* <!-- DRAG & DROP --> *}
  {if $EASYCAPTCHA.challenge == 'drag'}
  <td class="title"></td>
  <td>
    <span class="easycaptcha_hint">{'To verify you are a human, please place the <b>%s</b> in the most right box bellow.'|translate:$EASYCAPTCHA.drag.text}</span>
    {$smarty.capture.easycaptcha}
  </td>

  {footer_script}
  var captcha_code = new LiveValidation(jQuery('input[name="easycaptcha"]')[0], {ldelim} onlyOnSubmit: true });
  captcha_code.add(Validate.Presence, {ldelim} failureMessage: "{'Pleaser answer'|translate}" });
  {/footer_script}

  {* <!-- TIC TAC TOE --> *}
  {else if $EASYCAPTCHA.challenge == 'tictac'}
  <td class="title"></td>
  <td>
    <span class="easycaptcha_hint">{'You are player X, click on the right case to complete the line.'|translate}</span>
    {$smarty.capture.easycaptcha}
  </td>

  {footer_script}
  var captcha_code = new LiveValidation(jQuery('input[name="easycaptcha_key"]')[0], {ldelim} onlyOnSubmit: true });
  captcha_code.add(Validate.Custom, {ldelim}
    failureMessage: "{'Pleaser answer'|translate}",
    against: function() {ldelim}
        return jQuery('input[name="easycaptcha"]:checked').length != 0;
    }
  });
  {/footer_script}

  {/if}
</tr>