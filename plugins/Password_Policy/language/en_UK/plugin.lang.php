<?php
$lang['PP_Title'] = 'Password Policy - Version: ';
$lang['PP_SubTitle'] = 'Plugin configuration';
$lang['PP_submit'] = 'Submit settings';
$lang['PP_save_config'] ='Settings saved.';
$lang['PP_Disable'] = ' Disable (default)';
$lang['PP_Enable'] = ' Enable ';
$lang['PP_Support_txt'] = 'The official support on this plugin is only on these Piwigo forum topic:<br/>
<a href="http://piwigo.org/forum/viewtopic.php?id=22863" onclick="window.open(this.href);return false;">English forum - http://piwigo.org/forum/viewtopic.php?id=22863</a>';
$lang['PP_PasswordTest'] = 'Score calculation';
$lang['PP_ScoreTest'] = 'Result: ';
$lang['PP_Error_Password_Mandatory'] = 'Security: Password is mandatory!';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Security: A control system calculates a score on the chosen passwords complexity. The complexity of your password is too low (score = %s). Please, choose a new password more secure by following these rules:<br/>
- Use letters and numbers<br/>
- Use lowercase and uppercase<br/>
- Increase its length (number of characters)<br/>
The minimum passwords score required by the administrator is: ';
$lang['PP_Password_Enforced'] = 'Strengthening the security level of passwords';
$lang['PP_Password_Enforced_true'] = ' Enable. Minimum Score: ';
$lang['PP_AdminPassword_Enforced'] = 'Applying to administrators';
$lang['PP_Password_Reset_Msg'] = 'Please, change your password!';
$lang['PP_PwdReset'] = 'Password renewal';
$lang['PP_Password reset selected users'] = 'Request password renewal for selected users';
$lang['PP_Guest cannot be pwdreset'] = 'Password renewal can\'t be set for guests account!';
$lang['PP_Default user cannot be pwdreset'] = 'Password renewal can\'t be set for default user account!';
$lang['PP_Webmaster cannot be pwdreset'] = 'Password renewal can\'t be set for the webmaster account!';
$lang['PP_Generic cannot be pwdreset'] = 'Password renewal can\'t be set for generic accounts!';
$lang['PP_Admins cannot be pwdreset'] = 'Password renewal can\'t be set for admins account!';
$lang['PP_You cannot pwdreset your account'] = 'Password renewal can\'t be set for your own account!';
$lang['PP_You need to confirm pwdreset'] = 'You must confirm password renewal (check box)!';
$lang['PP_PwdReset_Todo'] = 'Password to be renewed';
$lang['PP_PwdReset_Done'] = 'Password renewed';
$lang['PP_PwdReset_NA'] = 'Original password';
$lang['PP %d user pwdreseted'] = 'Password renewal required for %d user';
$lang['PP %d users pwdreseted'] = 'Password renewal required for %d users';
$lang['PP_passwtestTitle'] = 'Testing the complexity of a password';
$lang['PP_passwtestTitle_d'] = 'Enter the password to test and then click on &quot;Score calculation&quot; to see the result.';
$lang['PP_passwTitle_d'] = 'Enabling this option makes mandatory the seizure of a password upon registration, and requires the password chosen by the visitor to meet a minimum level of complexity. If the threshold is not reached, the score achieved and the minimum score to be achieved are displayed, along with recommendations to increase the value of this score.<br/><br/>
There is field test to measure the complexity of a password, and can afford to get an idea of the score to define complex custom.<br/><br/>
Note: The score of a password is calculated based on several parameters: length, type of characters used (letters, digits, uppercase, lowercase, special characters). A score below 100 is considered low, from 100 to 500, the complexity is average; beyond 500, the security is excellent.';
$lang['PP_passwadmTitle_d'] = 'An administrator can create a user account with or without application of the rule of computing complexity.<br/><br/>
Note: If the user account created wants to change password and strengthening passwords for users is active, it will be subject to the rule set.';
$lang['PP_PwdResetTitle_d'] = 'Enabling this option will add a new feature in the management tab to renew the password for selected users. In addition, a new column is added to show the status of passwords for each of them with the following values:<br/><br/>
- Password to be renewed: A password renewal request has been planned.<br/>
- Password renewed: The password has been renewed after a request.<br/>
- Original Password: The original password chosen at account creation and has never been required for a renewal.<br/><br/>
<b style=&quot;color: red;&quot;>Webmaster, generic and guest accounts are excluded from this function.</b><br/><br/>
These users will be automatically redirected to their customization page at each of their connections until they changed their password and an explicit message will be displayed on this page.';
$lang['PP_User_Account_Locked_Txt'] = 'Sorry, for security reason your access to the gallery has been locked due to too many failed login attempts. This may be due to a hacking attempt on your account. Please contact the site administrator to request the unlocking.';
$lang['PP_LoginAttempts'] = 'Management of failed login attempts';
$lang['PP_LoginAttempts_d'] = 'This option enables the recording of failed login attempts to the gallery due to incorrect password and automatically lock the concerned user account. It is designed to counter possible hacking attempts with the use of password dictionaries.<br/><br/>
<b style=&quot;color: red;&quot;>Webmaster, generic and guest accounts are excluded from this function.</b><br/><br/>
By enabling, you will be able to specify the maximum number of failed attempts allowed before locking and define a custom message to the user who has locked his account. This message is only displayed if the user succeeds in identification after locking.<br/><br/>
To unlock the accounts, go to the management tab. You\'ll find a new column indicating the status of accounts symbolized by a red symbol (for locked account) and green (for unlocked account). Select one or more accounts to unlock and use the unlock button to apply the action.';
$lang['PP_Max number of failed attempts'] = 'Maximum number of failed attempts: ';
$lang['PP_Max number of failed attempts_d'] = 'The number 0 disables counting attempts.';
$lang['PP_UserLocked_Custom_Txt'] = 'Customizing the information message to the locked user';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Here you can change the text of the message displayed to the user whose account has been locked. To use multiple languages, you can use the Extended description plugin\'s tags if it is active.';
$lang['PP_LockedUsers'] = 'Locking state';
$lang['PP_Unlock'] = 'Unlocking';
$lang['PP_Unlock selected users'] = 'Unlock selected users';
$lang['PP_Guest is not unlockable'] = 'Guest users can not be locked and can not be unlocked';
$lang['PP_Default user is not unlockable'] = 'Default user can not be locked and can not be unlocked';
$lang['PP_Webmaster is not unlockable'] = 'Webmaster users can not be locked and can not be unlocked';
$lang['PP_You cannot unlock your account'] = 'You can not unlock your own account';
$lang['PP_Generic is not unlockable'] = 'Generic users can not be locked and can not be unlocked';
$lang['PP_Admins is not unlockable'] = 'Admin users can not be locked and can not be unlocked';
$lang['PP_User Not Locked'] = 'User not locked';
$lang['PP_User Locked'] = 'User locked';
$lang['PP_You need to confirm unlock'] = 'You must confirm unlocking (check box)!';
$lang['PP %d user unlocked'] = '%d user unlocked';
$lang['PP %d users unlocked'] = '%d users unlocked';
$lang['PP_config_tab'] = 'Configuration';
$lang['PP_Users_List_Tab'] = 'Management';
$lang['PP_Pwd_Actions'] = 'Users management';
$lang['PP_Pwd_Actions_d'] = 'Unlocking accounts and password renewal requests are set here.<br/><br/>
Select users before set an action. Confirmation checkbox is mandatory before applying any action.<br/><br/>
<b style=&quot;color: red;&quot;>Important :</b> Actions apply <u><b>ONLY</b> on visitor accounts</u> and not administrators, webmaster, default and guest.';
$lang['PP_Err_Userlist_Settings'] = 'This tab is available only if password renewal or unlocking accounts is enabled';
$lang['PP_No_Userlist'] = 'No users available to display';
$lang['PP_Select page number'] = 'Select page number to display';
$lang['PP_Select page size'] = 'Select page size';
?>