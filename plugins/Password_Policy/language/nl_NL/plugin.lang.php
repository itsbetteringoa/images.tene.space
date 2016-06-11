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
$lang['PP_Disable'] = 'Uitschakelen (standaard)';
$lang['PP_Enable'] = 'Inschakelen';
$lang['PP_Error_Password_Mandatory'] = 'Beveiliging: Wachtwoord is verplicht!';
$lang['PP_Admins is not unlockable'] = 'Beheerders kunnen niet vergrendeld en ontgrendeld worden ';
$lang['PP_Default user is not unlockable'] = 'Standaard gebruiker kan niet vergrendeld en ontgrendeld worden';
$lang['PP_Default user cannot be pwdreset'] = 'Wachtwoord vernieuwing kan niet worden ingesteld voor het standaard gebruikers account!';
$lang['PP_Admins cannot be pwdreset'] = 'Wachtwoord vernieuwing kan niet worden ingesteld voor beheerders account!';
$lang['PP_AdminPassword_Enforced'] = 'Toepassen bij beheerders';
$lang['PP %d users unlocked'] = '%d gebruikers ontgrendeld';
$lang['PP %d users pwdreseted'] = 'Wachtwoord vernieuwing nodig voor %d gebruikers';
$lang['PP %d user unlocked'] = '%d gebruiker ontgrendeld';
$lang['PP %d user pwdreseted'] = 'Wachtwoord vernieuwing nodig voor %d gebruiker';
$lang['PP_UserLocked_Custom_Txt'] = 'Aanpassen van de boodscap aan de vergrendelde gebruiker';
$lang['PP_Title'] = 'Wachtwoordbeleid - versie:';
$lang['PP_submit'] = 'Bevestig de nieuwe instellingen';
$lang['PP_save_config'] = 'Instellingen opgeslagen.';
$lang['PP_passwtestTitle_d'] = 'Voer het wachtwoord in om te testen en click op &quot;Bereken  Score&quot; om het resultaat vte zien.';
$lang['PP_passwtestTitle'] = 'Test de complexiteit van het wachtwoord';
$lang['PP_config_tab'] = 'Instellingen';
$lang['PP_You need to confirm unlock'] = 'Je moet de ontgrendeling bevestigen (check box)!';
$lang['PP_You need to confirm pwdreset'] = 'Je moet het nieuwe wachtwword bevestigen (check box)!';
$lang['PP_You cannot unlock your account'] = 'Je kunt niet je eigen account ontgrendelen';
$lang['PP_You cannot pwdreset your account'] = 'Wachtwoord vernieuwing kan niet worden ingesteld voor je eigen account!';
$lang['PP_Webmaster is not unlockable'] = 'Webbeheerder gebruikers kunnen niet worden vergrendeld of ontgrendeld';
$lang['PP_Unlock'] = 'Ontgrendeling';
$lang['PP_Webmaster cannot be pwdreset'] = 'Wachtwoord vernieuwing kan niet worden ingeschakelt voor het web beheerders account!';
$lang['PP_Users_List_Tab'] = 'Beheer';
$lang['PP_User Not Locked'] = 'Gebruiker niet vergrendeld';
$lang['PP_User Locked'] = 'Gebruiker vergrendeld';
$lang['PP_Unlock selected users'] = 'Ontgrendel geselecteerde gebruikers';
$lang['PP_SubTitle'] = 'Plugin instellingen';
$lang['PP_Select page size'] = 'Kies de pagina grootte';
$lang['PP_Select page number'] = 'Kies een pagina nummer om te tonen';
$lang['PP_ScoreTest'] = 'Resultaat:';
$lang['PP_Pwd_Actions'] = 'Gebruikers beheer';
$lang['PP_PwdReset_Todo'] = 'Nieuw wachtwoord';
$lang['PP_PwdReset_NA'] = 'Huidig wachtwoord';
$lang['PP_PwdReset_Done'] = 'Wachtwoord vernieuwd';
$lang['PP_Password_Enforced_true'] = 'Aanzetten. Minimum score:';
$lang['PP_PwdReset'] = 'wachtwoord vernieuwing';
$lang['PP_Password_Reset_Msg'] = 'Vernieuw a.u.b. uw wachtwoord!';
$lang['PP_Password_Enforced'] = 'Versterking van het veiligheids niveau van wachtwoorden';
$lang['PP_PasswordTest'] = 'score berekening';
$lang['PP_Password reset selected users'] = 'Verzoek wachtwoord vernieuwing voor geselecteerde gebruikers';
$lang['PP_No_Userlist'] = 'Geen gebruikers beschikbaar om te tonen';
$lang['PP_Max number of failed attempts_d'] = 'Indien 0: het tellen van mislukte pogingen wordt uitgeschakeld.';
$lang['PP_Max number of failed attempts'] = 'Maximaal aantal mislukte pogingen:';
$lang['PP_LoginAttempts_d'] = 'Deze optie zet de registratie aan van mislukte inlog pogingen in de galerij als gevolg van invoer van onjuist wachtwoord en blokkeert automatisch het betreffende gebruikers account.
Dit is ontworpen om mogelijke inbraak pogingen met gebruik van wachtwoord lijsten tegen te gaan.<br/><br/>
<b style=&quot;color: red;&quot;> Webbeheerder, algemene en gast accounts zijn uitgesloten van deze functie.</b><br/><br/>
Door deze optie aan te zetten kun je het maximaal toegestane aantal mislukte inlog pogingen opgeven voor dat het systeem wordt vergrendeld en kun je een standaard boodschap opgeven die wordt getoond aan de gebruiker. Dit bericht wordt alleen getoond nadat de gebruiker alsnog met success de identificatie voltooid.<br/><br/>
Om het account te ontgrendelen, ga je naar de beheerders tab, daar vind je een nieuwe kolom met indicatie over de status van het betreffende account, dmv een rood symbool (voor een vergrendeld account), of een groen symbool (voor een ontgrendeld account).
Selecteer een of meer accounts om te ontgrendelen, en gebruik de ontgrendel knop om de actie uit te voeren.';
$lang['PP_LockedUsers'] = 'Vergrendeling status';
$lang['PP_LoginAttempts'] = 'Beheer van mislukte inlog pogingen';
$lang['PP_Guest is not unlockable'] = 'Gast gebruikers kunnen niet worden vergrendeld of ontgrendeld';
$lang['PP_Generic is not unlockable'] = 'Algemene gebruikers kunnen niet worden vergrendeld of ontgrendeld';
$lang['PP_Guest cannot be pwdreset'] = 'Wachtwoord vernieuwing kan niet worden geselecteerd voor gast accounts!';
$lang['PP_Generic cannot be pwdreset'] = 'Wachtwoord vernieuwing kan niet worden geselecteerd voor algemene accounts!';
$lang['PP_Err_Userlist_Settings'] = 'Deze tab is alleen beschikbaar indien wachtwoord vernieuwing of ontgrendeling accounts is aangezet';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Beveiliging: Een controle systeem berekend een score voor de complexiteit van het gekozen wachtwoord. Het wachtwoord is te eenvoudig (score = %s).
Volg a.u.b. de volgende regels bij het kiezen van een wachtwoord:.<br/>
- Gebruik letters en cijfers<br/>
- Gebruik kleine letters en hoofdletters<br/>
- Maak het langer (gebruik meer tekens)<br/>
De minimaal vereiste wachtwoord score voor beheerders is:';
$lang['PP_passwadmTitle_d'] = 'Een beheerder kan een gebruikersaccount aanmaken met of zonder toepassing van de regel van het berekenen van complexiteit.<br/><br/> 
Opmerking: Als de gebruiker van het aangemaakte account daarna het wachtwoord wilt wijzigen en "het versterken van wachtwoorden voor gebruikers" actief is, wordt het account alsnog onderworpen aan de ingestelde regelset.';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Hier kunt u de tekst van het bericht aan de gebruiker wiens account is geblokkeerd veranderen. Om meerdere talen te gebruiken, kunt u labels van de "Uitgebreide beschrijving"-plugin gebruiken, als deze actief is.';
$lang['PP_User_Account_Locked_Txt'] = 'Sorry, in verband met veiligheidsredenen is uw toegang tot de galerie geblokkeerd, dit als gevolg van te veel mislukte inlogpogingen. Dit kan te wijten zijn aan een hack-poging op uw account. Neem contact op met de beheerder van deze site om de toegang te herstellen.';
$lang['PP_Support_txt'] = 'De officiële support voor deze plugin kunt u vinden op het volgende Piwigo forum onderwerp:<br/>
<a href="http://piwigo.org/forum/viewtopic.php?id=22863" onclick="window.open(this.href);return false;">Engels forum - http://piwigo.org/forum/viewtopic.php?id=22863</a>';
$lang['PP_passwTitle_d'] = 'Het inschakelen van deze optie verplicht het gebruik van een wachtwoord bij registratie, en vereist dat het door de bezoeker gekozen wachtwoord een ​zekere mate van complexiteit bezit. Als de drempel van complexiteit niet wordt gehaald, wordt de bereikte score en de minimaal te behalen score getoond, samen met aanbevelingen om deze score te bereiken.<br/><br/> 
Een testveld geeft u de mogelijkheid om de complexiteit van een wachtwoord te meten. Hierdoor krijgt u een idee hoe de score zich verhoudt tot de complexiteit. <br/><br/> 
Opmerking: De score van een wachtwoord wordt berekend op basis van verschillende parameters: lengte, type gebruikte tekens (letters, cijfers, hoofdletters, kleine letters, speciale tekens). Een score lager dan 100 wordt als laag beschouwd, van 100 tot 500, de complexiteit is gemiddeld, meer dan 500, de veiligheid is uitstekend.';
$lang['PP_Pwd_Actions_d'] = 'Ontgrendelen van accounts en verlenging aanvragen van wachtwoorden  worden hier ingesteld.<br/><br/>
Selecteer gebruikers voordat u actie onderneemt. Checkbox bevestiging is verplicht alvorens enige actie.<br/><br/>
<b style="color: red;"> Belangrijk: </ b> Acties toepassen <u> <b> ALLEEN </ b> op bezoeker accounts </ u> en niet de beheerders, webmaster, standaard en gast.';
$lang['PP_PwdResetTitle_d'] = 'Inschakelen van deze optie zal een nieuwe functie toevoegen aan het tabblad management, om het wachtwoord voor geselecteerde gebruikers te verlengen. Daarnaast wordt een nieuwe kolom toegevoegd om de status van wachtwoorden voor elk van hen te tonen met de volgende waarden:<br/>
<br/>
- Wachtwoord te verlengen: Een verzoek van wachtwoord verlenging is ingediend.
<br/>.
- Wachtwoord verlengd: Het wachtwoord is na een verzoek verlengd. <br/>
- Origineel wachtwoord: Het oorspronkelijke wachtwoord gekozen bij het aanmaken van een account, is nooit nodig voor een verlenging. br/><br/>
<b style="color: red;"> Webmaster, generiek en gast-accounts zijn uitgesloten van deze functie.</b><br/><br/>
Deze gebruikers worden automatisch doorgestuurd naar hun aangepaste pagina bij elk van hun connecties, totdat ze hun wachtwoord verandert hebben; een expliciete boodschap zal op deze pagina worden weergegeven.';