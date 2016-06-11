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
$lang['PP_Title'] = 'Password Policy - versão:';
$lang['PP_submit'] = 'Submeter configurações';
$lang['PP_save_config'] = 'Configurações salvas';
$lang['PP_Disable'] = 'Desabilitar (padrão)';
$lang['PP_Enable'] = 'Habilitar';
$lang['PP_Error_Password_Mandatory'] = 'Segurança: Senha é obrigatório!';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Segurança: Um sistema de controle calcula uma pontuação na complexidade das senhas escolhidas. A complexidade de sua senha é muito baixa (pontuação=%s). Por favor, escolha uma nova senha mais segura, seguindo as seguintes regras: <br>
- Use letras e números <br>
- Use maiúsculas e minúsculas<br>
- Aumentar o comprimento (número de caracteres) <br>
A pontuação mínima exigido nas senhas pelo administrador é:';
$lang['PP_AdminPassword_Enforced'] = 'Inscrição para administradores';
$lang['PP_Default user cannot be pwdreset'] = 'Renovação de senha não pode ser definido para conta de usuário padrão!';
$lang['PP_Webmaster cannot be pwdreset'] = 'Renovação de senha não pode ser definido para a conta webmaster!';
$lang['PP_Admins cannot be pwdreset'] = 'Renovação de senha não pode ser feita para contas de administradores!';
$lang['PP_You cannot pwdreset your account'] = 'Renovação de senha não pode ser definido por sua própria conta!';
$lang['PP_You need to confirm pwdreset'] = 'Você deve confirmar renovação de senha (caixa de seleção)!';
$lang['PP %d user pwdreseted'] = 'Obrigatória a renovação da senha para o usuário %d';
$lang['PP %d users pwdreseted'] = 'Obrigatória a renovação da senha para os usuários %d';
$lang['PP_passwTitle_d'] = 'Ativar essa opção torna obrigatória a apreensão de uma senha no momento do registo, e requer que a senha escolhida pelo visitante atingir um nível mínimo de complexidade. Se o limite não for atingido, a pontuação obtida e a pontuação mínima a ser alcançada serão exibidas, juntamente com recomendações para aumentar o valor da pontuação. <br/><br/>
Existem campos de teste para medir a complexidade de uma senha, e pode dar uma idéia da pontuação para definir a complexidade personalizada. <br/><br/>
Nota: A pontuação de uma senha é calculada com base em vários parâmetros: comprimento, tipo de caracteres utilizados (letras, números, letras maiúsculas, minúsculas, caracteres especiais). Uma pontuação abaixo de 100 é considerado baixo, de 100 a 500, a complexidade é média, além de 500, a segurança é excelente.';
$lang['PP_PwdResetTitle_d'] = 'Ativando esta opção será adicionada uma nova funcionalidade do painel de gerenciamento de usuários do Piwigo (Usuários> Gerenciar), que pode ser aplicado para renovar a senha de usuários selecionados. Além disso, uma nova coluna é adicionada para mostrar o estado de senhas para cada um deles, com os seguintes valores: <br/><br/>
- Senha a ser renovada: Um pedido de renovação de senha foi planejado <br/>.
- Password renovada: A senha foi renovada depois de um pedido <br/>.
- Password Original: Senha original escolhida no momento da criação da conta e nunca foi solicitada renovação <br/>
<b style=&quot;color: red;&quot;>Webmaster, contas genéricas e convidados estão excluídas desta função. </b><br/>
Esses usuários serão redirecionados automaticamente para sua página de personalização em cada uma das suas conexões até que mudarem a senha e uma mensagem explícita será exibida nesta página.';
$lang['PP_LoginAttempts_d'] = 'Esta opção permite a gravação de tentativas de login para a galeria devido a senha errada e bloqueia automaticamente a conta do utilizador em causa. Ele é projetado para combater possíveis ataques de hackers com o uso de dicionários de senhas. <br/><br/>
<b style=&quot;color: red;&quot;>Webmaster, contas genéricas e convidados estão excluídas desta função. </b><br/><br/>
Ao permitir, você vai ser capaz de especificar o número máximo de tentativas permitidas antes do bloqueio e defir uma mensagem personalizada para o usuário que bloqueou sua conta. Esta mensagem é exibida apenas se o usuário consegue identificar após bloqueio. <br/><br/>
Para desbloquear as contas, ir para a interface de gerenciamento de usuário da sua galeria. Você encontrará uma nova coluna indicando o status de contas simbolizados por um símbolo vermelho (para conta bloqueada) e verde (para a conta desbloqueada). Selecione uma ou mais contas para desbloquear e usar o botão de desbloqueio projetado para esta finalidade.';
$lang['PP_UserLocked_Custom_Txt'] = 'Personalizando a mensagem de informações para o usuário bloqueado';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Aqui você pode alterar o texto da mensagem exibida para o usuário cuja conta foi bloqueada. Para usar vários idiomas, você pode usar as tags a descrição estendida do plugin se ele estiver ativo.';
$lang['PP_User_Account_Locked_Txt'] = 'Desculpe, por motivo de segurança o acesso à galeria foi fechada devido a muitas tentativas de login. Isto pode ser devido a uma tentativa de invasão em sua conta. Por favor, contate o administrador do site para solicitar o desbloqueio.';
$lang['PP_Webmaster is not unlockable'] = 'Usuários webmaster não podem ser bloqueados e não podem ser desbloqueados';
$lang['PP_You cannot unlock your account'] = 'Você não pode abrir a sua própria conta';
$lang['PP_You need to confirm unlock'] = 'Você deve confirmar o desbloqueio (caixa de seleção)!';
$lang['PP_passwadmTitle_d'] = 'Um administrador pode criar uma conta de usuário com ou sem a aplicação da regra de complexidade computacional. <br/><br/>
Nota: Se o usuário da conta criada quer alterar a senha e o fortalecimento de senhas de usuários estiver ativa, ela estará sujeita ao conjunto de regras.';
$lang['PP_passwtestTitle'] = 'Testando a complexidade de uma senha';
$lang['PP_passwtestTitle_d'] = 'Digite a senha para teste e, em seguida, clique em &quot;Score calculation&quot; para ver o resultado.';
$lang['PP_PwdReset_Done'] = 'Senha renovada';
$lang['PP_PwdReset_NA'] = 'Senha original';
$lang['PP_PwdReset_Todo'] = 'Senha a ser renovada';
$lang['PP_ScoreTest'] = 'Resultado:';
$lang['PP_SubTitle'] = 'Configuração do plugin';
$lang['PP_Support_txt'] = 'O apoio oficial para este plugin é apenas neste tópico no fórum Piwigo:<br/>
<a href="http://piwigo.org/forum/viewtopic.php?id=22863" onclick="window.open(this.href);return false;">English forum - http://piwigo.org/forum/viewtopic.php?id=22863</a> ';
$lang['PP_Unlock'] = 'Desbloquear';
$lang['PP_Unlock selected users'] = 'Desbloquear usuários selecionados';
$lang['PP_User Locked'] = 'Usuário bloqueado';
$lang['PP_User Not Locked'] = 'Usuário desbloqueado';
$lang['PP %d user unlocked'] = '%d usuário desbloqueado';
$lang['PP %d users unlocked'] = '%d usuários desbloqueados';
$lang['PP_Admins is not unlockable'] = 'Usuários de administração não podem ser bloqueados e não podem ser desbloqueados';
$lang['PP_Default user is not unlockable'] = 'Usuário padrão não pode ser bloqueado e não pode ser desbloqueado';
$lang['PP_Generic cannot be pwdreset'] = 'Renovação de senha não podem ser configurada para contas genéricas!';
$lang['PP_Generic is not unlockable'] = 'Usuários genéricos não podem ser bloqueados e não podem ser desbloqueados';
$lang['PP_Guest cannot be pwdreset'] = 'Renovação de senha não pode ser configurada pora conta de convidados!';
$lang['PP_Guest is not unlockable'] = 'Os usuários convidados não podem ser bloqueados e não pode ser desbloqueados';
$lang['PP_LockedUsers'] = 'Estado de bloqueio';
$lang['PP_LoginAttempts'] = 'Gestão de tentativas de login';
$lang['PP_Max number of failed attempts'] = 'Número máximo de tentativas de falha:';
$lang['PP_Max number of failed attempts_d'] = 'O número 0 desativa contagem de tentativas.';
$lang['PP_Password reset selected users'] = 'Pedido de renovação de senha para usuários selecionados';
$lang['PP_PasswordTest'] = 'Cálculo de pontuação';
$lang['PP_Password_Enforced'] = 'Reforçar o nível de senhas de segurança';
$lang['PP_Password_Enforced_true'] = 'Ativar. Pontuação Mínima:';
$lang['PP_Password_Reset_Msg'] = 'Por favor, altere sua senha!';
$lang['PP_PwdReset'] = 'Renovação de senha';
$lang['PP_Err_Userlist_Settings'] = 'Este aba estará disponível apenas se a renovação de senha ou contas de desbloqueio estiver habilitado';
$lang['PP_No_Userlist'] = 'Não há usuários disponíveis para visualização';
$lang['PP_Pwd_Actions'] = 'Gerenciamento de usuários';
$lang['PP_Pwd_Actions_d'] = 'Desbloquear contas e solicitações de renovação de senha são definidos aqui.<br/><br/>
Selecione os usuários antes de definir uma ação. Caixa de confirmação é obrigatória antes de aplicar qualquer ação. <br/><br/> 
<b style=&quot;color: red;&quot;>Importante :</b> Aplicar a Ação <u><b>SOMENTE</b> em contas de visitantes</u>e não administradores, webmasters, padrão e convidados.';
$lang['PP_Select page number'] = 'Selecione o número da página para exibir';
$lang['PP_Select page size'] = 'Selecione o tamanho da página';
$lang['PP_Users_List_Tab'] = 'Gerenciamento';
$lang['PP_config_tab'] = 'Configuração';
?>