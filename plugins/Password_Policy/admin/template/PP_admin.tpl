{combine_script id='jquery' path='themes/default/js/jquery.min.js'}
{combine_script id='jquery.cluetip' require='jquery' path='themes/default/js/plugins/jquery.cluetip.js'}

{combine_css path= $PP_PATH|@cat:'admin/template/pp.css'}

{footer_script}{literal}
jQuery().ready(function()
{
  jQuery("#PP_LoginAttempts_true").click(function() {
    jQuery("#PP_USRLOCKEDTXT").show("slow");
  });
  jQuery("#PP_LoginAttempts_false").click(function() {
    jQuery("#PP_USRLOCKEDTXT").hide("slow");
  });
  

  jQuery('.cluetip').cluetip(
  {
    width: 550,
    splitTitle: '|'
  });
});
{/literal}{/footer_script}


<div class="titrePage">
  <h2>{'PP_Title'|@translate} {$PP_VERSION}<br/>{'PP_SubTitle'|@translate}</h2>
</div>

<form method="post" class="general">
<fieldset>
  <ul>
    <li>
      <label class="cluetip" title="{'PP_Password_Enforced'|translate}|{'PP_passwTitle_d'|translate}">
        {'PP_Password_Enforced'|@translate}
      </label>

      <label for="PP_Password_Enforced_false"><input id="PP_Password_Enforced_false" type="radio" value="false" {$PP_PASSWORDENF_FALSE} name="PP_Password_Enforced"/>
        {'PP_Disable'|@translate}
      </label>
      <label for="PP_Password_Enforced_true"><input id="PP_Password_Enforced_true" type="radio" value="true" {$PP_PASSWORDENF_TRUE} name="PP_Password_Enforced"/>
        {'PP_Password_Enforced_true'|@translate}&nbsp;</label>
        <input type="text" name="PP_Password_Score" value="{$PP_PASSWORD_SCORE}" size="5" style="text-align: center;"/>
      <br /><br />
        {'PP_PasswordTest'|@translate}
        <input class="cluetip" title="{'PP_passwtestTitle'|translate}|{'PP_passwtestTitle_d'|translate}" type="text" name="PP_Password_Test" value="{$PP_PASSWORD_TEST}" size="50" style="text-align: left;"/>
        &nbsp;&nbsp;&nbsp;
        <input class="submit" type="submit" value="{'PP_PasswordTest'|@translate}" name="PasswordTest"/>
        &nbsp;&nbsp;&nbsp;{'PP_ScoreTest'|@translate}{$PP_PASSWORD_TEST_SCORE}
    </li>

      <ul>
        <li>
          <label class="cluetip" title="{'PP_AdminPassword_Enforced'|translate}|{'PP_passwadmTitle_d'|translate}">
            {'PP_AdminPassword_Enforced'|@translate}
          </label>

          <label for="PP_AdminPassword_Enforced_false"><input id="PP_AdminPassword_Enforced_false" value="false" {$PP_ADMINPASSWENF_FALSE} name="PP_AdminPassword_Enforced" type="radio"/>
            {'PP_Disable'|@translate}
          </label>
          <label for="PP_AdminPassword_Enforced_true"><input id="PP_AdminPassword_Enforced_true" value="true" {$PP_ADMINPASSWENF_TRUE} name="PP_AdminPassword_Enforced" type="radio"/>
            {'PP_Enable'|@translate}
          </label>            
        </li>
      </ul>

    <li>
      <label class="cluetip" title="{'PP_PwdReset'|translate}|{'PP_PwdResetTitle_d'|translate}">
        {'PP_PwdReset'|@translate}
      </label>

      <label for="PP_PwdReset_false"><input id="PP_PwdReset_false" value="false" {$PP_PWDRESET_FALSE} name="PP_PwdReset" type="radio"/>
        {'PP_Disable'|@translate}
      </label>
      <label for="PP_PwdReset_true"><input id="PP_PwdReset_true" value="true" {$PP_PWDRESET_TRUE} name="PP_PwdReset" type="radio"/>
        {'PP_Enable'|@translate}
      </label>
    </li>

    <li>
      <label class="cluetip" title="{'PP_LoginAttempts'|translate}|{'PP_LoginAttempts_d'|translate}">
        {'PP_LoginAttempts'|@translate}
      </label>

      <label for="PP_LoginAttempts_false"><input id="PP_LoginAttempts_false" value="false" {$PP_LOGFAILEDPASSW_FALSE} name="PP_LogFailedPassw" type="radio"/>
        {'PP_Disable'|@translate}
      </label>
      <label for="PP_LoginAttempts_true"><input id="PP_LoginAttempts_true" value="true" {$PP_LOGFAILEDPASSW_TRUE} name="PP_LogFailedPassw" type="radio"/>
        {'PP_Enable'|@translate}
      </label>
    </li>

    <ul>
      <li id="PP_USRLOCKEDTXT" {if $PP_LOGFAILEDPASSW_FALSE} style="display: none"{/if}>
        <label class="cluetip" title="{'PP_Max number of failed attempts'|translate}|{'PP_Max number of failed attempts_d'|translate}">
          {'PP_Max number of failed attempts'|@translate}&nbsp;&nbsp;<input type="text" name="PP_NbFailedPassw" value="{$PP_NBLOGFAIL}" size="5" style="text-align: center;"/>
        </label>
<br />
        <label class="cluetip" title="{'PP_UserLocked_Custom_Txt'|translate}|{'PP_UserLocked_Custom_Txt_d'|translate}">
          {'PP_UserLocked_Custom_Txt'|@translate}
        </label>
        <textarea class="pp_textfields" name="PP_CustomLockMsg" id="PP_CustomLockMsg" rows="10" {$TAG_INPUT_ENABLED}>{$PP_USRLOCKEDTXT}</textarea>
          {if 'FCK_PATH'|@defined}
            <div style="text-align:right;">
              <a href="#" onClick="toogleEditor('PP_CustomLockMsg'); return false;">FCK Editor On/Off</a>
            </div>
          {/if}
      </li>
    </ul>
  </ul>

  <p>
    <input class="submit" type="submit" value="{'PP_submit'|@translate}" name="submit" {$TAG_INPUT_ENABLED}/>
  </p>
</fieldset>
</form>

<fieldset>
  {'PP_Support_txt'|@translate}
</fieldset>