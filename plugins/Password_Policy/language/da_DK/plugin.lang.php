<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2012 Piwigo Team                  http://piwigo.org |
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
$lang['PP_Title'] = 'Password Policy - Version: ';
$lang['PP_SubTitle'] = 'Opsætning af plugin';
$lang['PP_submit'] = 'Gem indstillinger';
$lang['PP_save_config'] = 'Opsætning er gemt.';
$lang['PP_Disable'] = ' Deaktiver (standard)';
$lang['PP_Enable'] = ' Aktiver';
$lang['PP_Support_txt'] = 'Officiel support af denne plugin er kun tilgængelig i disse Piwigo-forumemner:<br>
<a href="http://piwigo.org/forum/viewtopic.php?id=22863" onclick="window.open(this.href);return false;">Engelsk forum - http://piwigo.org/forum/viewtopic.php?id=22863</a>';
$lang['PP_PasswordTest'] = 'Beregn værdi';
$lang['PP_ScoreTest'] = 'Resultat:';
$lang['PP_Error_Password_Mandatory'] = 'Sikkerhed: En adgangskode er påkrævet!';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Sikkerhed: Et kontrolsystem beregner en værdi for den valgte adgangskodes kompleksitet. Din adgangskodes kompleksitet er for lav (værdi = %s). Vær venlig at vælge en ny og mere sikker adgangskode ved at følge disse regler:<br>
- Brug bogstaver og tal<br>
- Brug små og store bogstaver<br>
- Forøg længden (antal tegn)<br>
Administratoren kræver følgende minimale adgangskodescore:';
$lang['PP_Password_Enforced'] = 'Stærkere sikkerhedsniveau på adgangkoder';
$lang['PP_Password_Enforced_true'] = ' Aktiver. Minimal værdi:';
$lang['PP_AdminPassword_Enforced'] = 'Gældende for administratorer';
$lang['PP_Password_Reset_Msg'] = 'Vær venlig at ændre din adgangskode!';
$lang['PP_PwdReset'] = 'Fornyelse af adgangskode';
$lang['PP_Password reset selected users'] = 'Bed om at udvalgte brugere fornyer deres adgangskode';
$lang['PP_Guest cannot be pwdreset'] = 'Fornyelse af adgangskode kan ikke opsættes for gæstekonto!';
$lang['PP_Default user cannot be pwdreset'] = 'Fornyelse af adgangskode kan ikke opsættes for standardbrugerkontoen!';
$lang['PP_Webmaster cannot be pwdreset'] = 'Fornyelse af adgangskode kan ikke opsættes på webmasterkontoen!';
$lang['PP_Generic cannot be pwdreset'] = 'Fornyelse af adgangskode kan ikke opsættes for generiske konti!';
$lang['PP_Admins cannot be pwdreset'] = 'Adgangskodefornyelse kan ikke opsættes på administratorkonto!';
$lang['PP_You cannot pwdreset your account'] = 'Fornyelse af adgangskode kan ikke opsættes på din egen konto!';
$lang['PP_You need to confirm pwdreset'] = 'Du skal bekræfte fornyelse af adgangskode (checkboks)!';
$lang['PP_PwdReset_Todo'] = 'Adgangskoden fornyes';
$lang['PP_PwdReset_Done'] = 'Adgangskoden er fornyet';
$lang['PP_PwdReset_NA'] = 'Oprindelig adgangskode';
$lang['PP %d user pwdreseted'] = 'Fornyelse af adgangskode krævet for brugeren %d';
$lang['PP %d users pwdreseted'] = 'Fornyelse af adgangskode krævet for brugerne %d';
$lang['PP_passwtestTitle'] = 'Tester adgangskodens kompleksitet';
$lang['PP_passwtestTitle_d'] = 'Skriv adgangskoden, der skal testes, og klik dernæst på &quot;Beregn værdi&quot; for at se resultatet.';
$lang['PP_passwTitle_d'] = 'Aktivering af denne valgmulighed gør det til at krav at have en adgangskode ved registreringen, og kræver at den valgte adgangskode opfylder et minimalt kompleksitetsniveau.  Hvis tærsklen ikke opfyldes, vil den opnåede værdi og den minimale værdi, der skal opfyldes, blive vist, sammen med anbefalinger til forbedring af værdien.<br /><br />
Der er et testfelt til måling af adgangskodens kompleksitet, og som giver en idé om hvordan man definerer en sådan.<br><br>
Bemærk: Adgangskodens værdi beregnes ud fra flere parametre: længde, typen af benyttede tegn (bogstaver, tal, store bogstaver, små bogstaver, særlige tegn). En værdi på under 100 betragtes som lav, fra 100 til 500 er kompleksiteten gennemsnitlig og over 500 er sikkerheden fremragende.';
$lang['PP_passwadmTitle_d'] = 'En administrator kan oprette en brugerkonto med eller uden krav om kompleksitetsberegning.<br><br>
Bemærk: Hvis en brugeren senere ønsker at ændre adgangskode og der er krav om at brugerne har stærke adgangskoder, vil adgangskoden blive udsat for kravet.';
$lang['PP_PwdResetTitle_d'] = 'Aktivering af denne valgmulighed tilføjer en ny funktion til håndteringsfanen vedrørende fornyelse af udvalgte brugeres adgangskoder. Desuden tilføjes en ny kolonne, som viser adgangskodestatus for hver af dem, med følgende værdier:<br /><br />
- Adgangskode skal fornyes: Der er planlagt at bede om fornyelse af adgangskoden.<br />
- Adgangskode fornyet: Adgangskoden er blevet fornyet, efter der er bedt om det.<br />
- Oprindelig adgangskode: Den oprindelige adgangskode valgt ved kontooprettelsen, og som aldrig har været krævet fornyet.<br /><br />
<b style=&quot;color: red;&quot;>Funktionen gælder ikke webmaster, generiske og gæstekonti..</b><br/><br/>
Disse brugere vil automatisk blive omdirigeret til deres opsætningsside, hver gang de logger på, indtil adgangskoden er blevet ændret, og der vil eksplicit blive givet besked om det på den side.';
$lang['PP_Unlock'] = 'Lås op';
$lang['PP_User_Account_Locked_Txt'] = 'Beklager, af sikkerhedsårsager er din adgang til galleriet blevet låst, på grund af for mange mislykkede logonforsøg. Det kan skyldes et forsøg på at bryde ind i din konto. Kontakt galleriets administrator for at bede om at få kontoen låst op.';
$lang['PP_Webmaster is not unlockable'] = 'Webmasterbrugere kan ikke låses og kan ikke låses op';
$lang['PP_You cannot unlock your account'] = 'Du kan ikke låse din egen konto op';
$lang['PP_You need to confirm unlock'] = 'Du skal bekræfte oplåsningen (checkboks)!';
$lang['PP_Unlock selected users'] = 'Lås valgte brugerkonti op';
$lang['PP_User Locked'] = 'Bruger låst';
$lang['PP_User Not Locked'] = 'Bruger ikke låst';
$lang['PP_UserLocked_Custom_Txt'] = 'Skræddersy den informative besked til den låste bruger';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Her kan man ændre teksten på den besked, som vises for brugere, hvis konto er blevet låst. For at benytte flere sprog, kan man benytte tags fra plugin\'en Extended Description, hvis denne er aktiv.';
$lang['PP_Admins is not unlockable'] = 'Administrative brugere kan ikke låses og kan ikke låses op';
$lang['PP_Default user is not unlockable'] = 'Standardbrugeren kan ikke låses og kan ikke låses op';
$lang['PP_Generic is not unlockable'] = 'Generiske brugere kan ikke låses og kan ikke låses op';
$lang['PP_Guest is not unlockable'] = 'Gæstebrugere kan ikke låses og kan ikke låses op';
$lang['PP_LockedUsers'] = 'Låsningstilstand';
$lang['PP_LoginAttempts'] = 'Håndtering af mislykkede logonforsøg';
$lang['PP_LoginAttempts_d'] = 'Valgmuligheden aktiverer registrering af mislykkede logonforsøg til galleriet på grund af forkert adgangskode, og låser automatisk den pågældende brugers konto. Det har til formål at misvirke mulige hackingforsøg ved hjælp af adgangskodelister.<br/><br/>
<b style=&quot;color: red;&quot;>Webmaster, generiske og gæstekonti er ikke medtaget i funktionen.</b><br /><br />
Ved aktivering af funktionen, får man mulighed for at angive det maksimalt tilladte antal mislykkede forsøg, før låsning, samt man kan definere en skræddersyet besked til brugeren, hvis konto er blevet låst. Beskeden vises hvis det lykkes brugeren at angive de korrekte oplysninger efter en låsning.<br /><br />
For at låse konti op, går man til sit galleris brugerhåndteringsgrænseflade.  Dér er der en ny kolonne, som angiver kontostatus markeret med et rødt symbol (for låste konti) og et grønt (for ulåste konti). Vælg en eller flere konti, der skal låses op, og benyt oplåsningsknappen beregnet dertil.';
$lang['PP_Max number of failed attempts'] = 'Maksimalt antal mislykkede logonforsøg:';
$lang['PP_Max number of failed attempts_d'] = 'Tallet 0 deaktiverer optælling af logonforsøg.';
$lang['PP %d user unlocked'] = '%d bruger oplåst';
$lang['PP %d users unlocked'] = '%d brugere oplåst';
$lang['PP_Pwd_Actions_d'] = 'Oplåsning af konti og anmodninger om fornyelse af adgangskode opsættes her.<br /><br />
Vælg brugere før en handling opsættes. Bekræftelse i afkrydsningsfelt er obligatorisk, før en handling udføres.<br /><br />
<b style=&quot;color: red;&quot;>Vigtigt</b>:<br /><br /> Handlinger udføres <u><b>KUN</b> på besøgendes konti</u>, og ikke administratorer, webmaster, standard eller gæst.';
$lang['PP_No_Userlist'] = 'Ingen brugere tilgængelige for visning';
$lang['PP_Err_Userlist_Settings'] = 'Denne fane er kun tilgængelig, hvis fornyelse af adgangskode eller oplåsning af konti er aktiveret';
$lang['PP_Pwd_Actions'] = 'Brugerhåndtering';
$lang['PP_Select page number'] = 'Vælg sidenummer for at vise';
$lang['PP_Select page size'] = 'Vælg sidestørrelse';
$lang['PP_Users_List_Tab'] = 'Håndtering';
$lang['PP_config_tab'] = 'Opsætning';
?>