<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2013 Piwigo Team                  http://piwigo.org |
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
$lang['PP_Title'] = 'Password Policy - Versão: ';
$lang['PP_SubTitle'] = 'Configuração da extensão';
$lang['PP_submit'] = 'Submeter definições';
$lang['PP_save_config'] = 'Configuração salva';
$lang['PP_Disable'] = 'Desativar (padrão)';
$lang['PP_Enable'] = 'Ativar';
$lang['PP_Support_txt'] = 'O apoio oficial sobre esta extensão é apenas apenas existe neste tópico do fórum Piwigo: <br>
<a href="http://piwigo.org/forum/viewtopic.php?id=" onclick="window.open(this.href);return false;"> Forum em Inglês - http://piwigo.org/forum/viewtopic.php?id=</a>';
$lang['PP_PasswordTest'] = 'Senha teste:';
$lang['PP_ScoreTest'] = 'Resultado:';
$lang['PP_Error_Password_Mandatory'] = 'Segurança: A senha é obrigatória';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Segurança: Um sistema de controle calcula uma pontuação na complexidade das senhas escolhidas. A complexidade da sua senha é muito baixa (escore =%s). Por favor, escolha uma nova senha mais segura, seguindo as seguintes regras:<br>
- Use letras e números<br>
- Use maiúsculas e minúsculas<br>
- Aumentar (número de caracteres) <br>
A pontuação mínima exigida pelo administrador é de:';
$lang['PP_Password_Enforced_true'] = 'Ativar: Pontuação mínima';
$lang['PP_AdminPassword_Enforced'] = 'Aplicar aos administradores';
$lang['PP_Password_Reset_Msg'] = 'Por favor altere a sua semha';
$lang['PP_PwdReset'] = 'Renovação de senha';
$lang['PP_Password reset selected users'] = 'Solicitar renovação de senha aos seguintes utilizadores';
$lang['PP_Guest cannot be pwdreset'] = 'Renovação de senha não pode ser definido para contas de visitantes!';
$lang['PP_Default user cannot be pwdreset'] = 'Renovação de senha pode ser definida por defeito para conta de utilizador';
$lang['PP_Webmaster cannot be pwdreset'] = 'Renovação de senha não pode ser definida para a conta de Webmaster';
$lang['PP_Generic cannot be pwdreset'] = 'Renovação de senha não pode ser definida para contas genéricas';
$lang['PP_Admins cannot be pwdreset'] = 'Renovação da senha não pode ser definida para conta de administrador';
$lang['PP_You cannot pwdreset your account'] = 'Renovação de senha não pode ser definida para a sua própria galeria';
$lang['PP_You need to confirm pwdreset'] = 'Deverá confirmar a renovação da senha (sinalize a caixa)';
$lang['PP_PwdReset_Todo'] = 'Senha a ser renovada';
$lang['PP_PwdReset_Done'] = 'Senha renovada';
$lang['PP_PwdReset_NA'] = 'Senha original';
$lang['PP %d user pwdreseted'] = 'Renovação de senha requerida para %d um utilizador';
$lang['PP %d users pwdreseted'] = 'Renovação de senha requerida para %d utilizadores';
$lang['PP_Webmaster is not unlockable'] = 'Os utilizadores webmaster não podem ser bloqueados ou desbloqueados';
$lang['PP_You cannot unlock your account'] = 'Não pode desbloquear a sua conta';
$lang['PP_You need to confirm unlock'] = 'Deverá confirmar o desbloqueio (sinalize a caixa)';
$lang['PP_passwtestTitle'] = 'Teste da complexidade da senha';
$lang['PP_passwtestTitle_d'] = 'Escreva a senha a testar e depois clique em &quot;Score calculation&quot; para ver o resultado.';
$lang['PP %d user unlocked'] = '%d utilizador desbloqueado';
$lang['PP %d users unlocked'] = '%d utilizadores desbloqueados';
$lang['PP_Admins is not unlockable'] = 'Admin não pode ser bloqueada ou desbloqueada';
$lang['PP_Default user is not unlockable'] = 'Utilizador por defeito não pode ser bloqueado ou desbloqueado';
$lang['PP_Generic is not unlockable'] = 'Utilizadores genéricos não podem ser bloqueados ou desbloqueados';
$lang['PP_Guest is not unlockable'] = 'Visitantes não podem ser bloqueados ou desbloqueados';
$lang['PP_LockedUsers'] = 'Estado de bloqueio';
$lang['PP_LoginAttempts'] = 'Gestão de tentativas de login';
$lang['PP_LoginAttempts_d'] = 'Esta opção ativa a gravação de tentativas de tentativas falhadas de entrada na galeria devido a senha errada e bloqueia automaticamente a conta do utilizador em causa. Foi concebido para contabilizar tentativas de possíveis ataques de hackers utilizando dicionários de senhas. <br/><br/>
<b style="color: red;&quot;>Webmaster, contas genéricas e convidados estão excluídos desta função. </b><br/>
Ao ativar, você vai ser capaz de especificar o número máximo de tentativas permitidas antes do bloqueio e defina uma mensagem personalizada para o utilizador o que bloqueou sua conta. Esta mensagem é exibida apenas se o utilizador continuar a tentar a identificação após bloqueio. <br/>
Para desbloquear as contas, vai ao interface de gerenciamento de utilizador para a galeria. Encontrará uma nova coluna indicando o status de contas com um símbolo vermelho (para conta bloqueada) e verde (para a conta desbloqueada). Selecione uma ou mais contas para desbloquear e clique no botão Desbloquear existente para esta finalidade.';
$lang['PP_Max number of failed attempts'] = 'Número máximo de tentativas';
$lang['PP_Max number of failed attempts_d'] = 'O número 0 desativa a contegem de tentativas';
$lang['PP_Password_Enforced'] = 'Reforçar o nível de segurança das senhas ';
$lang['PP_PwdResetTitle_d'] = 'Ativando esta opção irá adicionar uma nova funcionalidade no painel de gerenciamento de utilizadores do Piwigo (Gerenciar utilizadores), que pode ser aplicada na renovação da senha dos utilizadores selecionados. E adição, uma nova coluna é adicionada para mostrar o estado das senhas, para cada um deles, com os seguintes valores:<br/>
- Senha a ser renovada: Foi solicitado um pedido de renovação de senha<br/>.
- Senha renovada: A senha foi renovada depois de solicitado <br/>.
- Senha Original:. A senha original escolhida no momento da criação da conta e nunca foi solicitada renovação<br/>
<b style=&quot;color: red;&quot;> Contas do Webmaster, genéricas e convidados estão excluídas desta função.</b><br/>
Esses utilizadores serão redirecionados automaticamente para sua página personalizada quando das suas ligações até que alterem a sua senha e uma mensagem explícita será exibida nesta página.';
$lang['PP_Unlock'] = 'Desbloquear';
$lang['PP_Unlock selected users'] = 'Desbloquear os utilizadores selecionados';
$lang['PP_User Locked'] = 'Utilizador bloqueado';
$lang['PP_User Not Locked'] = 'Utilizador não bloqueado';
$lang['PP_UserLocked_Custom_Txt'] = 'Personalização da mensagem informativa para o utilizador bloqueado';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Aqui você pode alterar o texto da mensagem exibida ao utilizador cuja conta foi bloqueada. Para usar vários idiomas, pode usar a  descrição extensa das etiquetas das extensões se ativa.';
$lang['PP_User_Account_Locked_Txt'] = 'Desculpe, por motivo de segurança o seu acesso à galeria foi bloqueado devido a multiplas tentativas de entrada. Isto pode ser devido a uma tentativa de invasão da sua conta. Por favor, contate o administrador do site para solicitar o desbloqueio.';
$lang['PP_passwTitle_d'] = '
Ativando esta opção torna obrigatório uma senha no momento do registo, e requer que a senha escolhida pelo visitante tenha um nível mínimo de complexidade. Se o limite não for atingido, a pontuação obtida e a pontuação mínima permitida, são exibidas, juntamente com a recomendação de aumento do valor da pontuação. <br/><br/>
Existe campo de teste para medir a complexidade de uma senha, e pode forçar uma pontuação personalizada para definir a complexidade.<br/><br/>
Nota: A pontuação de uma senha é calculada com base em vários parâmetros: comprimento, tipo de caracteres utilizados (letras, números, letras maiúsculas, minúsculas, caracteres especiais). Uma pontuação abaixo de 100 é considerada baixa, de 100 a 500, a complexidade é média, além de 500, a segurança é excelente.




';
$lang['PP_passwadmTitle_d'] = 'Um administrador pode criar uma conta de utilizador com ou sem a aplicação da regra de complexidade. <br/>
Nota: Se, após a conta de utilizador criada, quiser alterar a senha e o verificador de senhas de utilizadores estiver ativo, ficará sujeito ao conjunto de regras.';
$lang['PP_Err_Userlist_Settings'] = 'Esta guia apenas está disponível se Renovar senha ou desbloquear contas de estiverem ativados';
$lang['PP_No_Userlist'] = 'Não Existem utilizadores para mostrar';
$lang['PP_Pwd_Actions'] = 'Gerenciar utilizadores';
$lang['PP_Pwd_Actions_d'] = 'Desbloquear contas e solicitações de renovação de senha são definidos aqui.<br/><br/>
Selecione os utilizadores antes de definir uma ação. Sinalizar a caixa de confirmação é obrigatório antes de aplicar qualquer ação.<br/><br/>
<b style=&quot;color: red;&quot;>Importante: </b> Aplicar ações <u><b>SOMENTE</b> em contas de visitantes </u> e não administradores, webmaster, padrão e convidados.
';
$lang['PP_Select page number'] = 'Selecione o número da página a mostrar';
$lang['PP_Select page size'] = 'Selecionar o tamanho da página
';
$lang['PP_Users_List_Tab'] = 'Gerenciar';
$lang['PP_config_tab'] = 'Configuração';
?>