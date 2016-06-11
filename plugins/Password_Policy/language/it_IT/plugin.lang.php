<?php
$lang['PP_Title'] = 'Password Policy - Versione : ';
$lang['PP_SubTitle'] = 'Configurazione Plugin';
$lang['PP_submit'] = 'Salva le impostazioni';
$lang['PP_save_config'] = 'Configurazione salvata.';
$lang['PP_Disable'] = 'Disabilita (predefinito)';
$lang['PP_Enable'] = 'Abilita';
$lang['PP_Support_txt'] = 'Il supporto ufficiale di questo plugin è solo su questo topic nel forum di Piwigo:<br>
<a href="http://piwigo.org/forum/viewtopic.php?id=" onclick="window.open(this.href);return false;">English forum - http://piwigo.org/forum/viewtopic.php?id=</a>';
$lang['PP_PasswordTest'] = 'Prova la password : ';
$lang['PP_ScoreTest'] = 'Risultato:';
$lang['PP_Error_Password_Mandatory'] = 'Sicurezza: la password è obbligatoria!';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Sicurezza: Un sistema di controllo calcola un punteggio sulla complessità della password scelta. La complessità della vostra password è troppo bassa (punteggio = %s). Per favore, scegli una nuova password più sicura quanto segue queste regole:<br>
- Usare lettere e numeri<br>
- Usare lettere minuscole e maiuscole<br>
- Aumentare la lunghezza (numero dei caratteri)<br>
Il punteggio minimo per la password richiesto dall\'amministratore è:';
$lang['PP_Password_Enforced'] = 'Rafforzamento del livello di sicurezza delle password';
$lang['PP_Password_Enforced_true'] = 'Attivato. Punteggio minimo:';
$lang['PP_AdminPassword_Enforced'] = 'Applica a tutti gli amministratori';
$lang['PP_Password_Reset_Msg'] = 'Cambia la tua password!';
$lang['PP_PwdReset'] = 'Rinnovo password';
$lang['PP_Password reset selected users'] = 'Richiedi rinnovo password per gli utenti selezionati';
$lang['PP_Guest cannot be pwdreset'] = 'Il rinnovo della password non può essere impostato per l\'account ospite!';
$lang['PP_Default user cannot be pwdreset'] = 'Rinnovo della password non può essere impostato per l\'account utente predefinito!';
$lang['PP_Webmaster cannot be pwdreset'] = 'Il rinnovo della password non può essere impostato per l\'account webmaster!';
$lang['PP_Generic cannot be pwdreset'] = 'Il rinnovo della password non può essere impostato per gli account generici!';
$lang['PP_Admins cannot be pwdreset'] = 'Il rinnovo della password non può essere impostato per gli account amministratori!';
$lang['PP_You cannot pwdreset your account'] = 'Il rinnovo della password non può essere impostato per il tuo stesso account!';
$lang['PP_You need to confirm pwdreset'] = 'Devi confermare il rinnovo della password (spunta la casella)!';
$lang['PP_PwdReset_Todo'] = 'Password da rinnovare';
$lang['PP_PwdReset_Done'] = 'Password rinnovata';
$lang['PP_PwdReset_NA'] = 'Password originale';
$lang['PP %d user pwdreseted'] = 'Rinnovo password richiesto per %d utente';
$lang['PP %d users pwdreseted'] = 'Rinnovo password richiesto per %d utenti';
$lang['PP_passwtestTitle'] = 'Prova la complessità di una password';
$lang['PP_passwtestTitle_d'] = 'Inserisci la password per testarla e quindi fare clic su &quot;Calcolo del punteggio&quot;, per vedere il risultato.';
$lang['PP_passwTitle_d'] = 'L\'attivazione di questa opzione rende obbligatorio l\'inserimento di una password al momento dell\'iscrizione, e richiede la password scelta dal visitatore di incontrare un livello minimo di complessità. Se la soglia non viene raggiunta, il punteggio conseguito e il punteggio minimo da raggiungere sono visualizzate, insieme con raccomandazioni per aumentare il valore di questa partitura.<br><br>
Non vi è prova in campo per misurare la complessità di una password, e può permettersi di avere un\'idea del punteggio per definire personalizzati complessi.<br><br>
Nota: Il punteggio di una password è calcolato sulla base di diversi parametri: la lunghezza, il tipo di caratteri utilizzati (lettere, numeri, lettere maiuscole, minuscole, caratteri speciali). Un punteggio inferiore a 100 è considerata bassa, da 100 a 500, la complessità è nella media, oltre 500, la sicurezza è eccellente.';
$lang['PP_passwadmTitle_d'] = 'Un amministratore può creare un account utente con o senza l\'applicazione della regola della complessità di calcolo.<br><br>
Nota: Se l\'account utente creato vuole cambiare la password e il rafforzamento password per gli utenti è attivo, sarà soggetta alla regola.';
$lang['PP_PwdResetTitle_d'] = 'L\'attivazione di questa opzione aggiunge una nuova funzionalità nel pannello di gestione degli utenti Piwigo (Utenti> Gestione) che può essere applicato per rinnovare la password per gli utenti selezionati. Inoltre, una nuova colonna viene aggiunta per mostrare lo stato di password per ciascuno di essi con i seguenti valori:<br>
Password in attesa di rinnovo: Una richiesta per una nuova password è stata inserita.<br>
- Password rinnovata: La password è stata cambiata dopo una richiesta.<br>
- Password originale: La password originale scelta al momento della creazione dell\'account non è mai stata cambiata.<br>
Webmaster, account generici e gli ospiti sono esclusi da questa funzione.<br>
Questi utenti saranno automaticamente reindirizzati alla loro pagina di personalizzazione per ciascuna delle loro connessioni fino a quando hanno cambiato la propria password e un messaggio esplicito verrà visualizzato in questa pagina.';
$lang['PP_LoginAttempts_d'] = 'Questa opzione consente la registrazione dei tentativi di accesso non riusciti per la galleria a causa di password non corretta e bloccare automaticamente l\'account utente in questione. Esso è stato progettato per contrastare eventuali tentativi di hacking, con l\'uso di dizionari di password.<br/><br/>
<b style=&quot;color: red;&quot;>Webmaster, conti generici e ospiti sono esclusi da questa funzione.</b><br/><br/>
Abilitandolo, sarai in grado di specificare il numero massimo di tentativi non riusciti consentiti prima del blocco e definire un messaggio personalizzato per l\'utente che ha il suo account bloccato. Questo messaggio viene visualizzato solo se l\'utente riesce ad identificarsi dopo il blocco.<br/><br/>
Per sbloccare gli account, vai alla interfaccia di gestione utente della tua galleria. Troverai una nuova colonna che indica lo stato degli accounts rapresentato da un simbolo rosso (per l\'account bloccato) e verde (per acount sbloccato). Seleziona uno o più account per sbloccare e utilizza il pulsante di sblocco progettato per questo scopo.';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Qui è possibile modificare il testo del messaggio visualizzato per l\'utente il cui account è stato bloccato. Per utilizzare più lingue, puoi utilizzare i plugin Extended Description tag se è attivo.';
$lang['PP_User_Account_Locked_Txt'] = 'Spiacente, per motivi di sicurezza l\'accesso alla galleria è stato bloccato a causa di troppi tentativi di accesso non riusciti. Questo può essere dovuto a un tentativo di attacco al tuo conto. Prego contatta l\'amministratore del sito per richiedere lo sblocco.';
$lang['PP_You need to confirm unlock'] = 'Devi confermare lo sblocco (seleziona casella)!';
$lang['PP_You cannot unlock your account'] = 'Non puoi sbloccare il tuo account';
$lang['PP_Webmaster is not unlockable'] = 'Gli utenti webmaster non possono essere bloccati e non possono essere sbloccati';
$lang['PP_UserLocked_Custom_Txt'] = 'Personalizzazione messaggio di informazione per l\'utente bloccato';
$lang['PP_Unlock selected users'] = 'Sblocca gli utenti selezionati';
$lang['PP_User Locked'] = 'Utenti bloccati';
$lang['PP_User Not Locked'] = 'Utenti non bloccati';
$lang['PP_Unlock'] = 'Sbloccato';
$lang['PP_Max number of failed attempts_d'] = 'Il numero 0 disabilita il conteggio tentativi.';
$lang['PP_Max number of failed attempts'] = 'Numero massimo di tentativi falliti:';
$lang['PP_LoginAttempts'] = 'Gestione tentativi di accesso non riusciti';
$lang['PP_LockedUsers'] = 'Stato blocco';
$lang['PP_Guest is not unlockable'] = 'Gli utenti ospiti non possono essere bloccati e non possono essere sbloccati';
$lang['PP_Generic is not unlockable'] = 'Gli utenti generici non possono essere bloccati e non possono essere sbloccati';
$lang['PP_Default user is not unlockable'] = 'L\'utente predefinito non può essere bloccato e non può essere sbloccato';
$lang['PP_Admins is not unlockable'] = 'Gli utenti amministratori non possono essere bloccati e non possono essere sbloccati';
$lang['PP %d users unlocked'] = '%d utenti sbloccati';
$lang['PP %d user unlocked'] = '%d utente sbloccato';
$lang['PP_Pwd_Actions_d'] = 'Richieste sblocco account e rinnovo password vanno impostate qui. <br/><br/>
Seleziona gli utenti prima di impostare un\'azione. Casella di controllo conferma è obbligatoria prima di applicare qualsiasi azione.<br/><br/>
<b style=&quot;color: red;&quot;>Importante:</b> Le azioni si applicano <u><b>SOLO</b> sugli account del visitatore</u> e non sugli amministratori, webmaster, predefinito e ospite.';
$lang['PP_Err_Userlist_Settings'] = 'Questa scheda è disponibile solo se è abilitato rinnovo password o sblocco account';
$lang['PP_Select page number'] = 'Seleziona il numero di pagina da visualizzare';
$lang['PP_Users_List_Tab'] = 'Gestione';
$lang['PP_config_tab'] = 'Configurazione';
$lang['PP_Select page size'] = 'Seleziona dimensione pagina';
$lang['PP_Pwd_Actions'] = 'Gestione utenti';
$lang['PP_No_Userlist'] = 'Nessun utente disponibile per la visualizzazione';
?>