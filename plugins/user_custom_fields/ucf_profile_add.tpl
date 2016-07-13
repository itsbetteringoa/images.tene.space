  <legend>{'Registration'|@translate}</legend>
  <input type="hidden" name="redirect" value="{$REDIRECT}">
    <ul>
      {foreach from=$add_uers_register item=adduersregister}
		{if $adduersregister.UCFID == 1}
		  <li>
			<span class="property">{'Username'|@translate}</span>
			{$UCF_USERNAME}
		  </li>
		{else if $adduersregister.UCFID == 2}
		 {if not $SPECIAL_USER}
		   <li>
			<span class="property">
			  <label for="password">{'Password'|@translate}</label>
			</span>
			<input type="password" name="password" id="password" value="">
		  </li>
		  <li>
			<span class="property">
			  <label for="use_new_pwd">{'New password'|@translate}</label>
			</span>
			<input type="password" name="use_new_pwd" id="use_new_pwd" value="">
		  </li>
		  <li>
			<span class="property">
			  <label for="passwordConf">{'Confirm Password'|@translate}</label>
			</span>
			<input type="password" name="passwordConf" id="passwordConf" value="">
		  </li>
		 {/if}
		{else if $adduersregister.UCFID == 3}
		 {if not $SPECIAL_USER} {* can modify password + email*}
		  <li>
			<span class="property">
			<label for="mail_address">{'Email address'|@translate}</label>
			</span>
			<input type="text" name="mail_address" id="mail_address" value="{$UCF_EMAIL}">
		  </li>
		 {/if}
		{else if $adduersregister.UCFID == 4}
		{else if}
		  <li>
			<span class="property">
              <label for="login">{if $adduersregister.UCFOBLIGATORY==1}*{/if} {$adduersregister.UCFWORDING}</label>
			</span>
			<input type="text" {if $useED==1}placeholder="{'Use Extended Description tags...'|@translate}"{/if} {if $adduersregister.UCFOBLIGATORY==1}required{/if} name="data[{$adduersregister.UCFID}]" id="data[{$adduersregister.UCFID}]" value="{$adduersregister.UCFDATA}">
		  </li>
        {/if}
	  {/foreach}


  </ul>
</fieldset>

