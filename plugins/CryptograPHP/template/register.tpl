</li>
<li>
  <span class="property">
    <label for="captcha_code">{if $CRYPTO.captcha_type=='string'}{'Enter code'|translate}{else}{'Solve equation'|translate}{/if} </label>
  </span>
  <input type="text" id="captcha_code" name="captcha_code" style="width:{$CRYPTO.code_length}em;" maxlength="{$CRYPTO.code_length}" />
  <img id="captcha" src="{$CRYPTO_PATH}securimage/securimage_show.php" alt="CAPTCHA Image" style="vertical-align:top;">
  <a href="#" onclick="document.getElementById('captcha').src = '{$CRYPTO_PATH}securimage/securimage_show.php?'+Math.random(); return false;">
    <img src="{$CRYPTO_PATH}template/refresh_{$CRYPTO.button_color}.png" style="vertical-align:bottom;"></a>