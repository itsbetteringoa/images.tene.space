<?php
$lang['PP_Title'] = 'Password Policy - Version : ';
$lang['PP_SubTitle'] = 'Plugin-Konfiguration';
$lang['PP_submit'] = 'Einstellungen übermitteln';
$lang['PP_save_config'] = 'Einstellungen gespeichert';
$lang['PP_Disable'] = 'Deaktivieren (Standard)';
$lang['PP_Enable'] = 'Aktivieren';
$lang['PP_Support_txt'] = 'Die offizielle Unterstützung für dieses Plugin ist nur auf diesem Diskussionsforum von Piwigo:<br>
<a href="http://piwigo.org/forum/viewtopic.php?id=" onclick="window.open(this.href);return false;">Englisch-Forum - http://piwigo.org/forum/viewtopic.php?id=</a>';
$lang['PP_PasswordTest'] = 'Score-Berechnung';
$lang['PP_ScoreTest'] = 'Ergebnis:';
$lang['PP_Error_Password_Mandatory'] = 'Sicherheit: Passwort wird vorausgesetzt!';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Sicherheit: Ein Kontrollsystem berechnet einen Score der gewählten Passwort-Komplexität. Die Komplexität Ihres Passwortes ist zu gering (Score = %s). Bitte setzen Sie ein sichereres Passwort mit Hilfe dieser Richtlinien:<br/>
- Buchstaben und Nummern<br/>
- Groß- und Kleinschreibung<br/>
- Länge erhöhen (Anzahl Zeichen)<br/>
Der minimale Passwort-Score der vom Administrator vorausgesetzt wird ist: ';
$lang['PP_Password_Enforced'] = 'Passwort-Sicherheitsstufe erhöhen';
$lang['PP_Password_Enforced_true'] = 'Aktivieren. Minimaler Score:';
$lang['PP_AdminPassword_Enforced'] = 'Auf Administratoren anwenden';
$lang['PP_Password_Reset_Msg'] = 'Bitte Passwort ändern!';
$lang['PP_PwdReset'] = 'Passworterneuerung';
$lang['PP_Password reset selected users'] = 'Passworterneuerung für ausgewählte Benutzer anfordern';
$lang['PP_Guest cannot be pwdreset'] = 'Passworterneuerung kann nicht für Gast-Konten gesetzt werden!';
$lang['PP_Default user cannot be pwdreset'] = 'Passworterneuerung kann nicht für den Standardbenutzer gesetzt werden!';
$lang['PP_Webmaster cannot be pwdreset'] = 'Passworterneuerung kann nicht für den Webmaster gesetzt werden!';
$lang['PP_Generic cannot be pwdreset'] = 'Passworterneuerung kann nicht für generische Konten gesetzt werden!';
$lang['PP_Admins cannot be pwdreset'] = 'Passworterneuerung kann nicht für Administratoren-Konten gesetzt werden!';
$lang['PP_You cannot pwdreset your account'] = 'Passworterneuerung kann nicht für Ihr eigenes Konto gesetzt werden!';
$lang['PP_You need to confirm pwdreset'] = 'Sie müssen die Passworterneuerung bestätigen (Checkbox)!';
$lang['PP_PwdReset_Todo'] = 'Passwort, das erneuert werden soll';
$lang['PP_PwdReset_Done'] = 'Passwort ersetzt';
$lang['PP_PwdReset_NA'] = 'Ursprüngliches Passwort';
$lang['PP %d user pwdreseted'] = 'Passworterneuerung für %d Benutzer erforderlich';
$lang['PP %d users pwdreseted'] = 'Passworterneuerung für %d Benutzer erforderlich';
$lang['PP_passwtestTitle'] = 'Passwortkomplexität testen';
$lang['PP_passwtestTitle_d'] = 'Passwort zum Testen eingeben und danach auf &quot;Score-Berechnung&quot; klicken, um das Ergebnis zu sehen.';
$lang['PP_passwTitle_d'] = 'Enabling this option makes mandatory the seizure of a password upon registration, and requires the password chosen by the visitor to meet a minimum level of complexity. If the threshold is not reached, the score achieved and the minimum score to be achieved are displayed, along with recommendations to increase the value of this score.<br/><br/>
There is field test to measure the complexity of a password, and can afford to get an idea of the score to define complex custom.<br/><br/>
Note: The score of a password is calculated based on several parameters: length, type of characters used (letters, digits, uppercase, lowercase, special characters). A score below 100 is considered low, from 100 to 500, the complexity is average; beyond 500, the security is excellent.';
$lang['PP_passwadmTitle_d'] = 'An administrator can create a user account with or without application of the rule of computing complexity.<br/><br/>
Note: If the user account created wants to change password and strengthening passwords for users is active, it will be subject to the rule set.
Webmaster, generischen und Gast-Accounts sind von dieser Funktion ausgeschlossen.<br>
Diese Benutzer werden automatisch auf ihre Anpassung an jeder Seite ihrer Verbindungen umgeleitet werden, bis sie ihr Passwort geändert und eine explizite Meldung auf dieser Seite angezeigt werden.';
$lang['PP_Admins is not unlockable'] = 'Administratoren können nicht gesperrt und entsperrt werden';
$lang['PP_LoginAttempts'] = 'Verwaltung der fehlgeschlagenen Loginversuche';
$lang['PP_LockedUsers'] = 'Sperr-Status';
$lang['PP_Generic is not unlockable'] = 'Generische Benutzer können nicht gesperrt oder entsperrt werden';
$lang['PP_You need to confirm unlock'] = 'Sie müssen die Entsperrung bestätigen (Checkbox)!';
$lang['PP_You cannot unlock your account'] = 'Sie können nicht Ihr eigenes Konto entsperren';
$lang['PP_Webmaster is not unlockable'] = 'Webmaster können nicht gesperrt oder entsperrt werden';
$lang['PP_UserLocked_Custom_Txt'] = 'Info-Meldung an gesperrten Benutzer anpassen';
$lang['PP_Max number of failed attempts_d'] = 'Die Zahl 0 deaktiviert die Zählung fehlgeschlagener Versuche.';
$lang['PP_Max number of failed attempts'] = 'Maximale Anzahl fehlgeschlagener Versuche:';
$lang['PP_Guest is not unlockable'] = 'Gast-Benutzer können nicht gesperrt oder entsperrt werden';
$lang['PP_Default user is not unlockable'] = 'Standardbenutzer kann nicht gesperrt und entsperrt werden';
$lang['PP_Unlock'] = 'Entsperren';
$lang['PP_Unlock selected users'] = 'Ausgewählte Benutzer entsperren';
$lang['PP_User Not Locked'] = 'Benutzer nicht gesperrt';
$lang['PP_User Locked'] = 'Benutzer gesperrt';
$lang['PP %d user unlocked'] = '%d Benutzer entsperrt';
$lang['PP %d users unlocked'] = '%d Benutzer entsperrt';
$lang['PP_User_Account_Locked_Txt'] = 'Entschuldigung, aus Sicherheitsgründen wurde Ihr Zugang aufgrund zu vieler fehlgeschlagener Loginversuche gesperrt. Dies könnte ein Hinweis auf einen Hackerangriff sein. Bitte kontaktieren Sie den Administrator der Seite, um die Entsperrung anzufragen.';
$lang['PP_LoginAttempts_d'] = 'Durch Aktivierung dieser Option starten Sie eine Protokollierung von Login-Fehlversuchen zu Ihrem Account und erhalten die Möglichkeit diesen zu blockieren, wenn z.B. versucht wird mit Hilfe von Passwort Bibliotheken diesen zu hacken..<br/><br/>
<b style=&quot;color: red;&quot;>Webmaster, generische und Gast-Accounts sind von dieser Funktion ausgeschlossen.</b><br/><br/>
Die maximale Anzahl von Fehlversuchen vor dem Blockieren kann festgelegt werden. Es ist auch möglich ein Meldung einzugeben, die nur angezeigt wird, wenn sich ein Benutzer an einem blockierten Account mit richtigem Passwort anmeldet.<br/><br/>
Das Freischalten eines Accounts erfolgt über das Management Interface der Gallerie. Sie sehen dort eine neue Spalte mit Lock-Informationen. Ein rotes Symbol zeigt einen blockierten Account, ein grünes Symbol einen freien. Die Accounts können ausgewählt und mit dem "Freischalten"-Button wieder freigeschaltet werden.
';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Hier können Sie eine Meldung eingeben, die angezeigt wird, wenn ein Benutzer versucht, sich mit richtigem Passwort an einem blockierten Account anzumelden. Mehrsprachigkeit ist mit Extended description plugin tags möglich, wenn diese aktiviert sind.';
$lang['PP_Err_Userlist_Settings'] = 'Dieser Reiter ist nur verfügbar, falls die Passworterneuerung oder Kontoentsperrung aktiviert ist';
$lang['PP_No_Userlist'] = 'Es können keine Benutzer angezeigt werden';
$lang['PP_Pwd_Actions'] = 'Benutzerverwaltung';
$lang['PP_Pwd_Actions_d'] = 'Kontoentsperrungs- und Passworterneuerungsanfragen werden hier gesetzt.<br/><br/>
Wähle Benutzer aus, bevor Du eine Aktion auswählst. Die Bestätigungscheckbox ist verpflichtend, bevor eine Aktion ausgeführt wird.<br/><br/>
<b style=&quot;color: red;&quot;>Wichtig :</b>Aktionen werden <u><b>NUR</b> auf Besucherkonten</u> und nicht auf Administrator-, Webmaster-, Standard- und Gastkonten angewendet.';
$lang['PP_Select page number'] = 'Seitenzahl wählen, die angezeigt werden soll';
$lang['PP_Select page size'] = 'Seitengröße auswählen';
$lang['PP_Users_List_Tab'] = 'Verwaltung';
$lang['PP_config_tab'] = 'Konfiguration';

$lang['PP_PwdResetTitle_d'] = 'Das Aktivieren dieser Option wird eine neue Funktion im Piwigo-Benutzerverwaltung Panel hinzufügen (Benutzer> Verwalten), das kann sich bewerben, um das Passwort für ausgewählte Benutzer zu erneuern. Darüber hinaus wird eine neue Spalte hinzugefügt, um den Status von Passwörtern für jeden von ihnen für die folgenden Werte:<br>
- Passwort erneuert werden: Ein Passwort Antrag auf Verlängerung ist geplant.<br>
- Passwort erneuert: Das Passwort hat nach einer Anfrage erneuert worden.<br>
- Original-Passwort: Das Original-Passwort an Account-Erstellung gewählt und hat noch nie für eine Erneuerung erforderlich gewesen.<br>
Webmaster, generischen und Gast-Accounts sind von dieser Funktion ausgeschlossen.<br>
Diese Benutzer werden automatisch auf ihre Anpassung an jeder Seite ihrer Verbindungen umgeleitet werden, bis sie ihr Passwort geändert und eine explizite Meldung auf dieser Seite angezeigt werden.';
