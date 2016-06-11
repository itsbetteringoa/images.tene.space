<?php
$lang['PP_Title'] = 'Password Policy - Version: ';
$lang['PP_SubTitle'] = 'Configuration du plugin';
$lang['PP_submit'] = 'Enregistrer les paramètres';
$lang['PP_save_config'] ='Configuration enregistrée.';
$lang['PP_Disable'] = ' Désactiver (valeur par défaut)';
$lang['PP_Enable'] = ' Activer ';
$lang['PP_Support_txt'] = 'Le support officiel sur ce plugin se fait exclusivement sur ce fil du forum FR de Piwigo:<br/>
<a href="http://fr.piwigo.org/forum/viewtopic.php?id=24558" onclick="window.open(this.href);return false;">Forum français - http://fr.piwigo.org/forum/viewtopic.php?id=24558</a>';
$lang['PP_PasswordTest'] = 'Calcul du score';
$lang['PP_ScoreTest'] = 'Résultat: ';
$lang['PP_Error_Password_Mandatory'] = 'Sécurité : Le mot de passe est obligatoire !';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Sécurité : Un système de contrôle calcule un score de complexité sur les mots de passe choisis. La complexité de votre mot de passe est trop faible (score = %s). Veuillez choisir un nouveau mot de passe plus sûr en respectant les règles suivantes :<br/>
- Utiliser des lettres et des chiffres<br/>
- Utiliser des minuscules et des majuscules<br/>
- Augmenter sa longueur (nombre de caractères)<br/>
Le score minimal des mots de passe imposé par l\'administrateur est de : ';
$lang['PP_Password_Enforced'] = 'Renforcement de la sécurité des mots de passe';
$lang['PP_Password_Enforced_true'] = ' Activer. Score minimum: ';
$lang['PP_AdminPassword_Enforced'] = 'Application aux administrateurs';
$lang['PP_Password_Reset_Msg'] = 'Veuillez modifier votre mot de passe !';
$lang['PP_PwdReset'] = 'Renouvellement du mot de passe';
$lang['PP_Password reset selected users'] = 'Demander le renouvellement du mot de passe pour les utilisateurs sélectionnés';
$lang['PP_Guest cannot be pwdreset'] = 'Le renouvellement de mot de passe ne peut pas être demandé pour les invités !';
$lang['PP_Default user cannot be pwdreset'] = 'Le renouvellement de mot de passe ne peut pas être demandé pour l\'utilisateur par défaut !';
$lang['PP_Webmaster cannot be pwdreset'] = 'Le renouvellement de mot de passe ne peut pas être demandé pour le webmaster !';
$lang['PP_Generic cannot be pwdreset'] = 'Le renouvellement de mot de passe ne peut pas être demandé pour un compte générique !';
$lang['PP_Admins cannot be pwdreset'] = 'Le renouvellement de mot de passe ne peut pas être demandé pour un compte d\'administrateur !';
$lang['PP_You cannot pwdreset your account'] = 'Le renouvellement de mot de passe ne peut pas être demandé pour votre propre compte utilisateur !';
$lang['PP_You need to confirm pwdreset'] = 'Vous devez confirmer la demande de renouvellement de mot de passe (case à cocher) !';
$lang['PP_PwdReset_Todo'] = 'Mot de passe à changer';
$lang['PP_PwdReset_Done'] = 'Mot de passe modifié';
$lang['PP_PwdReset_NA'] = 'Mot de passe original';
$lang['PP %d user pwdreseted'] = 'Renouvellement de mot de passe demandé pour %d utilisateur';
$lang['PP %d users pwdreseted'] = 'Renouvellement de mot de passe demandé pour %d utilisateurs';
$lang['PP_passwtestTitle'] = 'Tester la complexité d\'un mot de passe';
$lang['PP_passwtestTitle_d'] = 'Saisir le mot de passe à tester puis cliquer sur le bouton &quot;Calcul du score&quot; pour afficher le résultat.';
$lang['PP_passwTitle_d'] = 'L\'activation de cette option rend obligatoire la saisie d\'un mot de passe à l\'inscription, et oblige le mot de passe choisi par le visiteur à répondre à un niveau minimum de complexité. Si ce seuil n\'est pas atteint, le score réalisé et le score minimum à atteindre sont affichés, ainsi que des recommandations pour augmenter la valeur de ce score.<br/><br/>
Un champ de test permet de mesurer la complexité d\'un mot de passe, et peut permettre de se faire une idée du score à définir pour une complexité personnalisée.<br/><br/>
NB: Le score d\'un mot de passe est calculé en fonction de plusieurs paramètres : longueur, types de caractères utilisés (lettres, chiffres, majuscules, minuscules, caractères spéciaux). Un score inférieur à 100 est considéré comme faible; de 100 à 500, la complexité est dans la moyenne; au-delà de 500, la sécurité est excellente.';
$lang['PP_passwadmTitle_d'] = 'Un administrateur peut créer un compte d\'utilisateur avec ou sans application de la règle de calcul de complexité.<br/><br/>
A noter : Si l\'utilisateur du compte ainsi créé désire changer de mot de passe et que le renforcement des mots de passe pour les utilisateurs est actif, il sera soumis à la règle configurée.';
$lang['PP_PwdResetTitle_d'] = 'L\'activation de cette option ajoutera une nouvelle fonction dans l\'onglet &quot;gestion&quot; qui permet de demander le renouvellement du mot de passe pour les utilisateurs sélectionnés. De plus, une nouvelle colonne s\'ajoutera pour présenter le statut des mots de passe pour chacun d\'eux avec les valeurs suivantes :<br/><br/>
- Mot de passe à changer : Une demande de changement de mot de passe a été programmée.<br/>
- Mot de passe modifié : Le mot de passe a été changé suite à une demande.<br/>
- Mot de passe original : Le mot de passe est celui choisi à la création du compte et n\'a jamais fait l\'objet d\'une demande de changement.<br/><br/>
<b style=&quot;color: red;&quot;>Le compte webmaster, génériques et invités (Guest) sont exclus de cette fonction.</b><br/><br/>
Ces utilisateurs seront alors systématiquement redirigés vers leur page de personnalisation à chacune de leurs connexions tant qu\'ils n\'auront pas modifié leur mot de passe. Un message explicite sera affiché sur cette page.';
$lang['PP_User_Account_Locked_Txt'] = 'Désolé, pour des raisons de sécurité votre accès à la galerie a été verrouillé en raison d\'un trop grand nombre de tentatives de connexion infructueuses. Ceci peut être dû à une tentative de piratage de votre compte. Veuillez contacter l\'administrateur du site pour en demander le déverrouillage.';
$lang['PP_LoginAttempts'] = 'Gestion des tentatives de connexion echouées';
$lang['PP_LoginAttempts_d'] = 'Cette option permet de comptabiliser les tentatives échouées de connexion à la galerie pour cause de mot de passe erroné et de verrouiller automatiquement le compte d\'utilisateur concerné. Elle est prévue pour contrer d\'éventuelles tentatives de piratage par usage de dictionnaires de mots de passe.<br/><br/>
<b style=&quot;color: red;&quot;>Le compte webmaster, génériques et invités (Guest) sont exclus de cette fonction.</b><br/><br/>
En l\'activant, vous aurez la possibilité de préciser le nombre maximum de tentatives autorisées avant verrouillage et de définir un message personnalisé d\'information à l\'utilisateur qui aura son compte verrouillé. Ce message n\'est affiché que si l\'utilisateur en question arrive à s\'identifier correctement après le verrouillage.<br/><br/>
Pour déverrouiller les comptes, rendez-vous dans l\'onglet &quot;gestion&quot;. Vous y trouverez une nouvelle colonne indiquant l\'état des comptes symbolisé par un pictogramme rouge (pour compte verrouillé) et vert (pour compte non verrouillé). Sélectionnez le ou les compte(s) à déverrouiller et utiliser le bouton de déverrouillage prévu à cet effet.';
$lang['PP_Max number of failed attempts'] = 'Nombre maximum de tentatives : ';
$lang['PP_Max number of failed attempts_d'] = 'Le chiffre 0 désactive le comptage des tentatives.';
$lang['PP_UserLocked_Custom_Txt'] = 'Personnalisation du message d\'information à l\'utilisateur verrouillé';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Vous pouvez modifier ici le texte du message affiché à l\'utilisateur dont le compte est verrouillé. Pour une utilisation multi-langues, vous pouvez utiliser les balises [lang] du plugin Extended Description si celui-ci est actif.';
$lang['PP_LockedUsers'] = 'Verrous';
$lang['PP_Unlock'] = 'Déverrouillage';
$lang['PP_Unlock selected users'] = 'Déverrouiller les utilisateurs sélectionnés';
$lang['PP_Guest is not unlockable'] = 'Les utilisateurs invités ne sont pas verrouillables et ne peuvent pas être déverrouillés';
$lang['PP_Default user is not unlockable'] = 'Les utilisateurs par défaut ne sont pas verrouillables et ne peuvent pas être déverrouillés';
$lang['PP_Webmaster is not unlockable'] = 'Les utilisateurs webmaster ne sont pas verrouillables et ne peuvent pas être déverrouillés';
$lang['PP_You cannot unlock your account'] = 'Vous ne pouvez pas déverrouiller votre propre compte';
$lang['PP_Generic is not unlockable'] = 'Les utilisateurs génériques ne sont pas verrouillables et ne peuvent pas être déverrouillés';
$lang['PP_Admins is not unlockable'] = 'Les utilisateurs administrateurs ne sont pas verrouillables et ne peuvent pas être déverrouillés';
$lang['PP_User Not Locked'] = 'Utilisateur non verrouillé';
$lang['PP_User Locked'] = 'Utilisateur verrouillé';
$lang['PP_You need to confirm unlock'] = 'Vous devez confirmer le déverrouillage (case à cocher) !';
$lang['PP %d user unlocked'] = '%d utilisateur déverrouillé';
$lang['PP %d users unlocked'] = '%d utilisateurs déverrouillés';
$lang['PP_config_tab'] = 'Configuration';
$lang['PP_Users_List_Tab'] = 'Gestion';
$lang['PP_Pwd_Actions'] = 'Gestion des utilisateurs';
$lang['PP_Pwd_Actions_d'] = 'Les actions de renouvellement forcée des mots de passe et de déverrouillages de comptes se font ici.<br/><br/>
Sélectionnez les utilisateurs avant d\'appliquer une action. De même, il est nécessaire de cocher la case de confirmation avant chaque action.<br/><br/>
<b style=&quot;color: red;&quot;>Important :</b> Les actions ne s\'appliquent <u><b>QUE</b> sur les comptes visiteurs</u> et pas administrateurs, webmestre, par défaut et invité (guest).';
$lang['PP_Err_Userlist_Settings'] = 'Cet onglet n\'est disponible que si le renouvellement du mots de passe ou la gestion des tentatives de connexion echouées est actif';
$lang['PP_No_Userlist'] = 'Pas d\'utilisateurs à afficher';
$lang['PP_Select page number'] = 'Sélectionnez le numéro de la page à afficher';
$lang['PP_Select page size'] = 'Sélectionnez le nombre de lignes par pages';
?>