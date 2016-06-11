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
$lang['PP %d user pwdreseted'] = 'Passord fornyelse er nødvendig for %d bruker';
$lang['PP %d user unlocked'] = '%d bruker koblet fra';
$lang['PP %d users pwdreseted'] = 'Passord fornyelse er nødvendig for %d brukere';
$lang['PP %d users unlocked'] = '%d brukere koblet fra';
$lang['PP_AdminPassword_Enforced'] = 'Søknad til administratorer';
$lang['PP_Admins cannot be pwdreset'] = 'Passord fornyelse kan ikke lagres for admins konto!';
$lang['PP_Admins is not unlockable'] = 'Admin-brukere kan ikke låses og kan ikke låses opp';
$lang['PP_Default user cannot be pwdreset'] = 'Passord fornyelse kan ikke lagres for standard brukerkonto!';
$lang['PP_Default user is not unlockable'] = 'Standard bruker kan ikke låses og kan ikke låses opp';
$lang['PP_Disable'] = 'Deaktiver (standard)';
$lang['PP_Enable'] = 'Aktivert';
$lang['PP_Err_Userlist_Settings'] = 'Denne kategorien er bare tilgjengelig hvis passord fornyelse eller låse opp kontoer er aktivert';
$lang['PP_Error_Password_Mandatory'] = 'Sikkerhet: Passord er obligatorisk!';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Sikkerhet: Et kontrollsystem beregner en poengsum på valgt passord kompleksitet. Kompleksiteten i passordet ditt er for lavt (poengsum =%s). Vennligst, velg et sikrere passord  ved å følge disse reglene:<br/>
- Bruk bokstaver og tall<br/>
- Bruk små og store bokstaver<br/>
- Øk lengden (antall tegn)<br/>
Minste passord scorer påkrevd av administrator er:';
$lang['PP_Generic cannot be pwdreset'] = 'Passord fornyelse kan ikke lagres for generiske kontoer!';
$lang['PP_Generic is not unlockable'] = 'Generiske brukere kan ikke låses og kan ikke låses opp';
$lang['PP_Guest cannot be pwdreset'] = 'Passord fornyelse kan ikke lagres for gjeste konto!';
$lang['PP_Guest is not unlockable'] = 'Gjestebrukere kan ikke låses og kan ikke låses opp';
$lang['PP_LockedUsers'] = 'Låse bekreftelse';
$lang['PP_LoginAttempts'] = 'Forvaltningen av mislykkede innloggingsforsøk';
$lang['PP_passwtestTitle_d'] = 'Skriv inn passord for å teste og klikk på &quot; Resultat beregning &quot; for å se resultatet.';
$lang['PP_save_config'] = 'Innstillingene lagret.';
$lang['PP_submit'] = 'Send inn innstillinger';
$lang['PP_Support_txt'] = 'Den offisielle supporten for dette programtillegget finnes kun på disse Piwigo forumemnene:<br/>
<a href="http://piwigo.org/forum/viewtopic.php?id=22863" onclick="window.open(this.href);return false;"> Engelsk forum - http://piwigo.org /forum/viewtopic.php?id=22863</a>';
$lang['PP_Title'] = 'Password Policy - Versjon: ';
$lang['PP_Unlock'] = 'Opplåsing';
$lang['PP_Unlock selected users'] = 'Låse opp valgte brukere';
$lang['PP_User Locked'] = 'Bruker låst';
$lang['PP_User Not Locked'] = 'Bruker ikke låst';
$lang['PP_UserLocked_Custom_Txt'] = 'Tilpasse informasjonsmeldingen til låst brukeren';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Her kan du endre teksten i meldingen som vises til brukeren som har fått kontoen låst. For å bruke flere språk, kan du bruke det utvidede beskrivelse programtilleggets tagg hvis det er aktiv.';
$lang['PP_User_Account_Locked_Txt'] = 'Beklager, av sikkerhetsmessige årsaker er tilgangen til ditt galleriet låst, dette på grunn av for mange mislykkede innloggingsforsøk. Dette kan skyldes et hackerangrep på kontoen din. Ta kontakt med nettstedets administrator for å be om opplåsing.';
$lang['PP_Users_List_Tab'] = 'Administrasjon';
$lang['PP_Webmaster cannot be pwdreset'] = 'Passord fornyelse kan ikke settes for webmaster konto!';
$lang['PP_Webmaster is not unlockable'] = 'Webmaster brukere kan ikke låses og kan ikke låses opp';
$lang['PP_You cannot pwdreset your account'] = 'Passord fornyelse kan ikke settes for din egen konto!';
$lang['PP_You cannot unlock your account'] = 'Du kan ikke låse opp din egen konto';
$lang['PP_You need to confirm pwdreset'] = 'Du må bekrefte fornyelse av passord i(avkryssnings boksen)!';
$lang['PP_You need to confirm unlock'] = 'Du må bekrefte opplåsing i(avkrysnings boksen)!';
$lang['PP_config_tab'] = 'Innstillinger';
$lang['PP_passwTitle_d'] = 'Aktivering av dette alternativet gjør obligatorisk beslagleggelse av et passord ved registrering, og krever at passordet som velges av besøkende har et minimumskår på sikkerhetsnivået. Dersom terskelen ikke er nådd, og poengsummen ikke oppnådd vil minimum score som skal oppnås vises, sammen med anbefalinger for å øke verdien av denne poengsummen.<br/><br/>
Dette er en test for å måle kompleksiteten av et passordet, og kan gi brukeren en ide om sikkerhetsnivået for å velge et kompleks passord.<br/>
Merk: Poengsummen til et passord er beregnet og basert på flere parametere: lengde, type tegn som er brukt (bokstaver, tall, store bokstaver, små bokstaver, spesialtegn). En score under 100 anses som lavt, 100-500, er gjennomsnittet; over 500, er sikkerheten utmerket.';
$lang['PP_passwadmTitle_d'] = 'En administrator kan opprette en brukerkonto med eller uten bruk av regelen for kompleks databehandling.<br/><br/>
Merk: Hvis en brukerkonto som er opprettet ønsker å endre passord og styrke passord for brukere er aktivert, vil det være gjenstand for regelsettet.';
$lang['PP_passwtestTitle'] = 'Testing av kompleksiteten av et passord';
$lang['PP_LoginAttempts_d'] = 'Dette alternativet gjør at registrering av mislykkede påloggingsforsøk til galleriet på grunn av feil passord vil automatisk låse hans/hennes brukerkonto. Det er designet for å møte mulige hacking forsøk med bruk av passord løse programmer. <br/><br/>
<B style=&quot;color:red;&quot;> Webmaster, generiske og gjestekontoer er ekskludert fra denne funksjonen </b><br/>.
Ved å aktivere, vil du være i stand til å angi maksimalt antall mislykkede forsøk tillatt før låsing og definere en egendefinert melding til brukeren som har låst kontoen. Denne meldingen vises bare hvis brukeren lykkes i å legimitere seg  etter å ha blitt låst.<br/><br/>
For å låse opp brukerkontoen, gå til fanen administrasjon. Der vil du finne en ny kolonne som viser status for kontoen symbolisert ved et rødt symbol (for låst konto) og grønn (for ulåst konto). Velg en eller flere kontoer for å låse opp og bruke utløserknappen til å utføre handlingen.';
$lang['PP_Max number of failed attempts'] = 'Maksimum antall mislykkede forsøk: ';
$lang['PP_Max number of failed attempts_d'] = 'Tallet 0 deaktiverer telle forsøk.';
$lang['PP_No_Userlist'] = 'Ingen brukere tilgjengelig kan ikke vises';
$lang['PP_Password reset selected users'] = 'Glemt passord fornyelse for utvalgte brukere';
$lang['PP_PasswordTest'] = 'Resultat beregning';
$lang['PP_Password_Enforced'] = 'Styrking av sikkerhetsnivået for passord';
$lang['PP_Password_Enforced_true'] = 'Aktiver. Minimum Resultat:';
$lang['PP_Password_Reset_Msg'] = 'Vennligst, endre passord!';
$lang['PP_PwdReset'] = 'Passord fornyelse';
$lang['PP_PwdResetTitle_d'] = 'Aktivering av dette alternativet vil legge til en ny funksjon i fanen administrasjon for å fornye passordet for utvalgte brukere. I tillegg er en ny kolonne lagt til å vise status for passord for hver av dem med følgende verdier:<br/><br/>
- Passord som skal fornyes: En fornyelse av passord er planlagt.<br/>
- Passord fornyet: Passordet er fornyet etter en forespørsel. <br/>
- Originalt Passord: Det opprinnelige passordet valgt ved opprettelse av konto, har aldri vært nødvendig å fornye.<br/>
<B style=&quot;color: red;&quot;> Webmaster, generiske og gjestekontoer er ekskludert fra denne funksjonen.</b><br/>
Disse brukerne vil automatisk bli omdirigert til deres innstillingsider for hver av sine pålogginger inntil de endrer passordet sitt, og en klar beskjed vil bli vist på denne siden.';
$lang['PP_PwdReset_Done'] = 'Passord fornyet';
$lang['PP_PwdReset_NA'] = 'Opprinnelige passordet';
$lang['PP_PwdReset_Todo'] = 'Passord skal fornyes';
$lang['PP_Pwd_Actions'] = 'Bruker innstillinger';
$lang['PP_Pwd_Actions_d'] = 'Låser opp konto og fornyelses passord utføres her.<br/><br/>
Velg brukere først. Avkrysnings bekreftelse er obligatorisk før du velger en handling.<br/><br/>
<B style=&quot; color: red;&quot;> Viktig:</b> Handling utført <u> <b> KUN </ b> på besøks kontoer </u>, og ikke administratorer, webmaster, standard og gjester.';
$lang['PP_ScoreTest'] = 'Resultat: ';
$lang['PP_Select page number'] = 'Velg sidetall som skal vises';
$lang['PP_Select page size'] = 'Velg side størrelse';
$lang['PP_SubTitle'] = 'Innstillinger for programtillegget';