<p><label>{if $CRYPTO.captcha_type=='string'}{'Enter code'|translate}{else}{'Solve equation'|translate}{/if} :</label></p>
<p>
  <img id="captcha" src="{$CRYPTO_PATH}securimage/securimage_show.php" alt="CAPTCHA Image">
  <a href="#" onclick="document.getElementById('captcha').src = '{$CRYPTO_PATH}securimage/securimage_show.php?'+Math.random(); return false;">
    <img src="{$CRYPTO_PATH}template/refresh_{$CRYPTO.button_color}.png"></a>
  <input type="text" name="captcha_code" style="width:{$CRYPTO.code_length}em;" maxlength="{$CRYPTO.code_length}" />
</p>