<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+
$lang['PP_LockedUsers'] = '锁定状态';
$lang['PP_LoginAttempts'] = '管理失败的登录尝试';
$lang['PP_Guest is not unlockable'] = '游客账户不能被锁定和解锁';
$lang['PP_Admins is not unlockable'] = '管理员账户不能被锁定和解锁';
$lang['PP_Guest cannot be pwdreset'] = '游客账户不能更新密码！';
$lang['PP_Generic is not unlockable'] = '通用账户不能被锁定和解锁';
$lang['PP_Generic cannot be pwdreset'] = '通用账户不能更新密码！';
$lang['PP_Error_Password_Need_Enforcement_%s'] = '安全：控制系统计算所选择的密码的复杂性。你的密码的复杂度太低（得分= %s）。请用以下规则选择一个更安全的新密码：<br/>
- 使用字母和数字<br/>
- 使用小写和大写<br/>
- 增加密码长度（字符数）<br />
管理员要求密码的最低得分是：';
$lang['PP_Error_Password_Mandatory'] = '安全：密码是必须的！';
$lang['PP_Err_Userlist_Settings'] = '此标签仅在密码更新或帐户解锁被启用时才可用';
$lang['PP_Default user is not unlockable'] = '默认用户不能被锁定和解锁';
$lang['PP_Disable'] = '禁用（默认）';
$lang['PP_Enable'] = '启用';
$lang['PP %d users unlocked'] = '%d个用户已解锁';
$lang['PP_Default user cannot be pwdreset'] = '默认用户的账户不能更新密码！';
$lang['PP_Admins cannot be pwdreset'] = '管理员账户不能更新密码！';
$lang['PP_AdminPassword_Enforced'] = '应用于管理员';
$lang['PP %d users pwdreseted'] = '%d个用户需要更新密码';
$lang['PP %d user unlocked'] = '%d个用户已解锁';
$lang['PP %d user pwdreseted'] = '%d个用户需要更新密码';
$lang['PP_LoginAttempts_d'] = '本选项启用记录因密码错误而登录失败的尝试，并自动锁定相关用户账户。此设计用来应对可能的使用密码字典进行的黑客攻击。<br/><br/>
<b style=&quot;color: red;&quot;>站长、公共账户和游客账户不受此功能影响。</b><br/><br/>
启用后，您可指定锁定账户之前尝试登录的失败次数的上限，并定制发送给被锁定账户的用户的消息。此消息仅在用户成功证明其id时显示。<br/><br/>
如要解锁账户，请前往用户管理标签页。您将看到一个反映账户状态的列，以红色表示被锁定的账户，以绿色表示未锁定的账户。选择一个或多个账户并使用解锁按钮应用解锁操作。';
$lang['PP_PwdResetTitle_d'] = '启用此选项将在用户管理标签页增加一项新特性，即更新选中用户的密码。此外，会加入一个反映他们密码状态的列，包含下列属性：<br/><br/>
- 密码待更新：密码更新请求已发出。<br/>
- 密码已更新：请求发出后密码已被更新。<br/>
- 原始密码：账户创建时的原始密码，未被要求更新。<br/><br/>
<b style=&quot;color: red;&quot;>站长、公共账户和游客账户不受此功能影响。</b><br/><br/>
这些用户每次连接都将被自动重定向到他们的设置页面，直到他们更改了密码，而此页面将明确传达有关信息。';
$lang['PP_Pwd_Actions_d'] = '在这里设置解锁账户和密码更新的要求。<br/><br/>
在设定一项操作前请选择用户。在应用任何操作前必须勾选确认框。<br/><br/>
<b style=&quot;color: red;&quot;>重要：</b> 操作将 <u><b>仅仅</b> 应用于个人账户</u>，不包括管理员、站长、默认用户及游客。';
$lang['PP_Max number of failed attempts_d'] = '填"0"则不计算尝试次数';
$lang['PP_passwTitle_d'] = '启用本选项将强制注册时填写的密码必须符合安全标准，要求访问者选择的密码符合最低的复杂程度。如未达到门槛要求，密码的得分及达标所需要的得分将被显示，并提供提高得分的建议。<br/><br/>
有现场试验测试密码的复杂程度，可使用户获得对定义复杂度的得分的了解。<br/><br/>
提示：密码的得分是基于几个变量计算的：长度、使用的字符类型（字母、数字、大写、小写、特殊字符）。低于100分被视为过低，100至500分为普通复杂度；高于500分，安全度极佳。';
$lang['PP_passwadmTitle_d'] = '无论是否应用密码复杂度规则，管理员都可以创建一个用户帐户。<br/><br/>
提示：如果用户密码增强被启用，在用户想要变更密码的情况下，将服从设定的规则。';
$lang['PP_User_Account_Locked_Txt'] = '对不起，因登录失败次数过多，出于安全考虑，您访问相册的权限已被锁定。这可能是因您的账户遭到黑客攻击引起的。请联系网站管理员，申请解锁账户。';
$lang['PP_UserLocked_Custom_Txt_d'] = '在此您可变更向账户被锁定的用户显示的消息。要使用多语言，您可使用 Extended description 插件的标签，如果它已启用。';
$lang['PP_Support_txt'] = '本插件的唯一官方支持为这些 Piwigo 论坛主题：<br/>
<a href="http://piwigo.org/forum/viewtopic.php?id=22863" onclick="window.open(this.href);return false;">English forum - http://piwigo.org/forum/viewtopic.php?id=22863</a>';
$lang['PP_Title'] = 'Password Policy - 版本：';
$lang['PP_Unlock'] = '解锁中';
$lang['PP_Unlock selected users'] = '解锁选中的用户';
$lang['PP_User Locked'] = '用户已锁定';
$lang['PP_User Not Locked'] = '用户未锁定';
$lang['PP_Users_List_Tab'] = '管理';
$lang['PP_Webmaster cannot be pwdreset'] = '站长账户不能更新密码！';
$lang['PP_Webmaster is not unlockable'] = '站长账户不能被锁定和解锁';
$lang['PP_You cannot pwdreset your account'] = '您自己的账户不能更新密码！';
$lang['PP_You cannot unlock your account'] = '您不能解锁您自己的账户';
$lang['PP_You need to confirm pwdreset'] = '您必须确认密码更新（勾选）！';
$lang['PP_You need to confirm unlock'] = '您必须确认解锁（勾选）！';
$lang['PP_config_tab'] = '设置';
$lang['PP_passwtestTitle'] = '测试密码的复杂程度';
$lang['PP_UserLocked_Custom_Txt'] = '自定义致被锁定用户的消息';
$lang['PP_Password_Enforced_true'] = '启用。最低得分：';
$lang['PP_Password_Enforced'] = '正在加强密码的安全级别';
$lang['PP_ScoreTest'] = '结果：';
$lang['PP_PwdReset_Done'] = '密码已更新';
$lang['PP_PwdReset_NA'] = '原密码';
$lang['PP_PwdReset_Todo'] = '要更新的密码';
$lang['PP_Pwd_Actions'] = '用户管理';
$lang['PP_Select page number'] = '选择要显示的页码';
$lang['PP_Select page size'] = '选择页面尺寸';
$lang['PP_SubTitle'] = '插件设置';
$lang['PP_Password_Reset_Msg'] = '请更换您的密码！';
$lang['PP_PwdReset'] = '密码更新';
$lang['PP_Password reset selected users'] = '对选中的用户要求更新密码';
$lang['PP_No_Userlist'] = '无可以显示的用户';
$lang['PP_Max number of failed attempts'] = '尝试失败次数的上限：';
$lang['PP_PasswordTest'] = '计算得分';
$lang['PP_passwtestTitle_d'] = '输入密码进行测试，然后点击 &quot;计算得分&quot; 以查看结果。';
$lang['PP_save_config'] = '设定已保存。';
$lang['PP_submit'] = '提交设定';