<fieldset>
  <legend>{'Enter your personnal informations'|@translate}</legend>
    <ul>
      {foreach from=$add_uers_register item=adduersregister}
		{if $adduersregister.UCFID == 1}
		  <li>
			<span class="property">
              <label for="login">* {'Username'|@translate}</label>
			</span>
			<input type="text" name="login" id="login" value="{$F_LOGIN}" >
		  </li>
		{else if $adduersregister.UCFID == 2}
		  <li>
			<span class="property">
			  <label for="password">* {'Password'|@translate}</label>
			</span>
			<input type="password" name="password" id="password" >
		  </li>
		  <li>
			<span class="property">
			  <label for="password_conf">* {'Confirm Password'|@translate}</label>
			</span>
			<input type="password" name="password_conf" id="password_conf" >
		  </li>
		{else if $adduersregister.UCFID == 3}
		  <li>
			<span class="property">
			  <label for="mail_address">{if $obligatory_user_mail_address}* {/if}{'Email address'|@translate}</label>
			</span>
			<input type="email" {if $adduersregister.UCFOBLIGATORY==1}required{/if} name="mail_address" id="mail_address" value="{$F_EMAIL}" >
			{if not $obligatory_user_mail_address}
			  ({'useful when password forgotten'|@translate})
			{/if}
		  </li>
		{else if $adduersregister.UCFID == 4}
		  <li {if $adduersregister.UCFOBLIGATORY==1}style="display: none"{/if}>
			<span class="property">
			  <label for="send_password_by_mail">{'Send my connection settings by email'|@translate}</label>
			</span>
			<input type="checkbox" name="send_password_by_mail" id="send_password_by_mail" value="1" checked="checked">
		  </li>
		{else if}
		  <li>
			<span class="property">
              <label for="login">{if $adduersregister.UCFOBLIGATORY==1}*{/if} {$adduersregister.UCFWORDING}</label>
			</span>
			<input type="text" {if $useED==1}placeholder="{'Use Extended Description tags...'|@translate}"{/if} {if $adduersregister.UCFOBLIGATORY==1}required{/if} name="data[{$adduersregister.UCFID}]" id="data[{$adduersregister.UCFID}]">
		  </li>
        {/if}
	  {/foreach}


  </ul>
</fieldset>