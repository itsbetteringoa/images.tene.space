<div class="col-50">
  <label for="captcha">{if $CRYPTO.captcha_type=='string'}{'Enter code'|translate}{else}{'Solve equation'|translate}{/if}</label>
  <input type="text" name="captcha_code" id="captcha_code" style="width:{$CRYPTO.code_length}em" maxlength="{$CRYPTO.code_length}">
</div>
<div class="col-50">
  <img id="captcha" src="{$CRYPTO_PATH}securimage/securimage_show.php" alt="CAPTCHA Image" style="vertical-align:top;">
  <a href="#" id="captcha_refresh" onclick="document.getElementById('captcha').src = '{$CRYPTO_PATH}securimage/securimage_show.php?'+Math.random(); return false;">
    <img src="{$CRYPTO_PATH}template/refresh_{$CRYPTO.button_color}.png" style="vertical-align:bottom;"></a>
</div>

{footer_script}
var captcha_code = new LiveValidation("captcha_code", {ldelim} onlyOnSubmit: true });
captcha_code.add(Validate.Presence, {ldelim} failureMessage: "{'Invalid Captcha'|translate}" });
{/footer_script}