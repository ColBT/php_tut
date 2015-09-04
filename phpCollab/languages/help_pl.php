<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../languages/help_pl.php

//translator(s): Marcin Kawalerowicz (mkawalerowicz@poczta.onet.pl)

$help["setup_mkdirMethod"] = "Je�li serwer dzia�a w trybie safe-moed, musisz zdefiniowa� konto ftp do zarz�dzania plikami w phpCollab.";
$help["setup_notifications"] = "Powiadamiania za pomoc� poczty elektronicznej (zmiana w zadaniach, nowa wiadomo��, ...)<br/>Smtp/sendmail konieczny";
$help["setup_forcedlogin"] = "Je�li False, nie zezwalaj na zdalne logowanie przez login i has�o zapisane w URL";
$help["setup_langdefault"] = "Wybierz j�zyk, kt�ry ma by� domy�lnie wybierany podczas logowania lub pozostaw je�li chcesz. by aktualny j�zyk by� rozpoznawany automatycznie.";
$help["setup_myprefix"] = "Ustaw t� zmienn� je�li chcesz by nazwy tabel w bazie danych zosta�y poprzedzone prefiksem. <br/><br/>assignments<br/>bookmarks<br/>bookmarks_categories<br/>calendar<br/>files<br/>logs<br/>members<br/>notes<br/>notifications<br/>organizations<br/>phases<br/>posts<br/>projects<br/>reports<br/>sorting<br/>subtasks<br/>support_posts<br/>support_requests<br/>tasks<br/>teams<br/>topics<br/>updates<br/><br/>Pozostaw to pole puste je�li nie chcesz u�ywa� prefiksu.";
$help["setup_loginmethod"] = "Metoda zapisu hase� w bazie danych.<br/>Ustaw &quot;Crypt&quot; je�lic chesz by dzia�a�a autentykacja w CVS i za pomoc� htaccess (w przypadku gdy w��czone jest u�ywanie CVS i/lub htaccess).";
$help["admin_update"] = "W przypadku aktualizowania wersji post�puj dok�adnie w tej kolejno�ci:<br/>1. Ustawienia (wprowad� nowe parametry)<br/>2. Ustawienia bazy danych (uaktualnij zgodnie z now� wersj�)";
$help["task_scope_creep"] = "R�nica dni pomi�dzy planowana dat� zako�czenia i rzeczywist� dat� zako�czenia (pogrubione dodatnia).";
$help["max_file_size"] = "Maksymalna wielko�� pliku.";
$help["project_disk_space"] = "Sumaryczna maksymalna wielko�� foldera z plikami.";
$help["project_scope_creep"] = "R�nica dni pomi�dzy planowana dat� zako�czenia i rzeczywist� dat� zako�czenia (pogrubione dodatnia). Dla wszystkich zada�.";
$help["mycompany_logo"] = "Za�aduj logo swojej firmy. Logo poka�e si� w lewym g�rnym rogu okna.";
$help["calendar_shortname"] = "Etykieta, kt�ra poka�e si� w kalendarzu. Wymagane.";
$help["user_autologout"] = "Czas w sekundach do automatycznego wylogowania w przypadku braku aktywno�ci, 0 = wy��czone.";
$help["user_timezone"] = "Ustaw stref�  GMT.";
//2.4
$help["setup_clientsfilter"] = "Filtruj tylko zalogowanych u�ytkownik�w klienta.";
$help["setup_projectsfilter"] = "Filtruj, by pokazywa� jedynie projekty, do kt�rych u�ytkownik zosta� przypisany.";
//2.5
$help["setup_notificationMethod"] = "Ustal metod� dla wysy�ania poczty elektronicznej: za pomoc� funkcji mail j�zyka php (konieczny w�asny serwer smtp lub sendmail i skonfigurowany php) lub za pomoc� innego serwera smtp.";
?>