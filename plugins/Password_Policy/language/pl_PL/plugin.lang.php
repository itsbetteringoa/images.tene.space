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
$lang['PP_LoginAttempts_d'] = 'Ta opcja włącza zliczanie nieudanych prób logowania w wyniku wpisania złego hasła oraz automatycznie blokuje użytkownika.
<b style=&quot;color: red;&quot;>Konta Webmastera, standardowe i gościa są wyłączone z tej funkcji.</b><br/><br/>
Włączając ją będziesz mógł ustalić maksymalną liczbą nieudanych prób przed zablokowaniem oraz zdefiniować własną wiadomość wyświetlaną dla użytkownika, którego konto zostało zablokowane. Wiadomość ta jest wyświetlana tylko w przypadku powodzenia w identyfikacji zablokowanego użytkownika.<br/><br/> Aby odblokować konta, przejdź do interfejsu zarządzania użytkownikami galerii. Znajdziesz tam nową kolumnę pokazującą stan blokady wyświetlany jako czerwony symbol (dla konta zablokowanego) i zielony (dla konta odblokowanego). Wybierz jedno lub więcej kont do odblokowania i użyj przycisku do tego stworzonego.';
$lang['PP_Support_txt'] = 'Oficjalne wsparcie dla tej wtyczki znajduje się tylko w tych tematach na forum Piwigo:<br/>
<a href="http://piwigo.org/forum/viewtopic.php?id=22863" onclick="window.open(this.href);return false;">English forum - http://piwigo.org/forum/viewtopic.php?id=22863</a>';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Tutaj możesz zmienić tekst informacji wyświetlanej dla użytkownika, którego konto zostało zablokowane. Aby użyć wielu języków możesz użyć tagów wtyczki Extended description jeśli jest aktywna.';
$lang['PP_User_Account_Locked_Txt'] = 'Przepraszamy, dla bezpieczeństwa Twoje konto zostało zablokowane, z powodu zbyt wielu nieudanych prób logowania. Mogło to być spowodowane próbą shackowania Twojego konta. Skontaktuj się proszę z administratorem strony w celu odblokowania konta.';
$lang['PP_User Not Locked'] = 'Użytkownik nie zablokowany';
$lang['PP_UserLocked_Custom_Txt'] = 'Ustaw informację dla zablokowanego użytkownika';
$lang['PP_Webmaster cannot be pwdreset'] = 'Odnowienie hasła nie może zostać ustawione dla konta webmastera!';
$lang['PP_Webmaster is not unlockable'] = 'Webmaster nie może zostać zablokowany ani odblokwany';
$lang['PP_You cannot pwdreset your account'] = 'Odnownie hasła nie może zostać ustawione dla własnego konta!';
$lang['PP_You cannot unlock your account'] = 'Nie możesz odblokować własnego konta';
$lang['PP_You need to confirm pwdreset'] = 'Musisz potwierdzić odnowienie hasła (check box)!';
$lang['PP_You need to confirm unlock'] = 'Musisz potwierdzić odblokowanie (check box)!';
$lang['PP_passwtestTitle'] = 'Testowanie złożoności hasła';
$lang['PP_passwtestTitle_d'] = 'Wpisz hasło do sprawdzenia i kliknij w &quot;Kalkulacja poziomu&quot; aby zobaczyć wynik';
$lang['PP_save_config'] = 'Ustawienia zapisane.';
$lang['PP_submit'] = 'Zapisz ustawienia.';
$lang['PP_Max number of failed attempts'] = 'Maksymalna liczba nieudanych prób:';
$lang['PP_Max number of failed attempts_d'] = 'Liczba 0 wyłącza liczenie prób.';
$lang['PP_Password reset selected users'] = 'Zarządzaj odnowienia hasła dla wybranych użytkowników';
$lang['PP_PasswordTest'] = 'Kalkulacja poziomu';
$lang['PP_Password_Enforced'] = 'Wzmocnienie poziomu bezpieczeństwa haseł';
$lang['PP_Password_Enforced_true'] = 'Włącz. Minimalny poziom:';
$lang['PP_Password_Reset_Msg'] = 'Proszę, zmień swoje hasło!';
$lang['PP_PwdReset'] = 'Odnownienie hasła';
$lang['PP_PwdReset_Done'] = 'Hasło odnowione';
$lang['PP_PwdReset_NA'] = 'Oryginalne hasło';
$lang['PP_PwdReset_Todo'] = 'Hasło które ma zostać odnowione';
$lang['PP_ScoreTest'] = 'Wynik:';
$lang['PP_SubTitle'] = 'Konfiguracja wtyczki';
$lang['PP_Title'] = 'Poityka Haseł - wersja:';
$lang['PP_Unlock'] = 'Odblokowanie';
$lang['PP_Unlock selected users'] = 'Odblokuj wybranych użytkowników';
$lang['PP_User Locked'] = 'Użytkownik zablokowany';
$lang['PP %d user pwdreseted'] = 'Odnowienie hasła wymagane dla %d użytkownika';
$lang['PP %d user unlocked'] = '%d użytkownik odblokowany';
$lang['PP %d users pwdreseted'] = 'Odnowienie haseł wymagane dla %d użytkowników';
$lang['PP %d users unlocked'] = '%d użytkowników odblokowanych';
$lang['PP_AdminPassword_Enforced'] = 'Zastosuj dla administratorów';
$lang['PP_Admins cannot be pwdreset'] = 'Odnowienie hasła nie może zostać ustawione dla konta administratora';
$lang['PP_Admins is not unlockable'] = 'Administratorzy nie mogą zostać zablokowani ani odblokowani';
$lang['PP_Default user cannot be pwdreset'] = 'Odnowienie hasła nie może zostać ustawione dla konta domyślnego użytkownika';
$lang['PP_Default user is not unlockable'] = 'Domyślny użytkownik nie może zostać zablokowany ani odblokowany';
$lang['PP_Disable'] = 'Wyłącz (domyślnie)';
$lang['PP_Enable'] = 'Włącz';
$lang['PP_Error_Password_Mandatory'] = 'Bezpieczeństwo: Hasło jest wymagane!';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Bezpieczeństwo: System kalkuluje poziom skomplikowania hasła. Twoje hasło jest zbyt łatwe (poziom=%s). Wybierz nowe hasło stosując się do poniższych reguł:<br/>
- Użyj liter i liczb<br/>
- Użyj dużych i małych liter<br/>
- Zwiększ jego dlugość (liczbę znaków)<br/>
Minimalny poziom hasła wymaganego dla administratora wynosi:';
$lang['PP_Generic cannot be pwdreset'] = 'Odnowienie hasła nie może zostać ustawione dla standardowego konta';
$lang['PP_Generic is not unlockable'] = 'Standardowe konto nie może zostać zablokowane ani odblokowane';
$lang['PP_Guest cannot be pwdreset'] = 'Odnowienie hasła nie może zostać ustawione dla konta gościa';
$lang['PP_Guest is not unlockable'] = 'Konto gościa nie może zostać zablokowane ani odblokowane';
$lang['PP_LockedUsers'] = 'Stan blokady';
$lang['PP_LoginAttempts'] = 'Zarządzanie nieudanymi próbami logowania';
?>