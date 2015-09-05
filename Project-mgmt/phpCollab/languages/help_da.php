<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../languages/help_da.php

//translator(s): mahuni (Pandaen)
$help["setup_mkdirMethod"] = "Hvis safe-mode er sat til, bliver du n�dt til at konfigurere en ftp-adgang, for at kunne oprette mapper med fil-redigeringen.";
$help["setup_notifications"] = "E-mail p�mindelser (Opgaver, nye beskeder, opgave�ndringer og s� videre.)<br />Godkendt smtp/sendmail er n�dvendig.";
$help["setup_forcedlogin"] = "Ved fejl, n�gt eksternt link med login og password i adresse(url)";
$help["setup_langdefault"] = "V�lg sprog som skal bruges ved login, eller lad den forblive blank, og sprog vil blive valgt ud fra browserindstillinger.";
$help["setup_myprefix"] = "Ret denne v�rdi, hvis du har tabeller med samme navn i din database.<br><br>assignments<br>bookmarks<br>bookmarks_categories<br>calendar<br>files<br>logs<br>members<br>notes<br>notifications<br>organizations<br>phases<br>posts<br>projects<br>reports<br>sorting<br>subtasks<br>support_posts<br>support_requests<br>tasks<br>teams<br>topics<br>updates<br><br>Efterlad blank, hvis du ikke �nsker at bruge et pr�fix.";
$help["setup_loginmethod"] = "Metode til at gemme kodeord i database.<br>&quot;Krypt�r&quot; for at CVS autentifikation og htaccess autentifikation skal virke (Hvis CVS support og/eller htaccess autentifikation er tilladt).";
$help["admin_update"] = "F�lg pr�cist den rigtige r�kkef�lge, for at opdatere din udgave<br>1. �ndre ops�tning (Supplement til nye parametre)<br>2. �ndre database (Opdat�r som f�lge af din nye udgave)";
$help["task_scope_creep"] = "Forskel i dage mellem planlagt dato og f�rdig dato (Fed, hvis positiv v�rdi)";
$help["max_file_size"] = "Maksimum st�rrelse p� fil-upload";
$help["project_disk_space"] = "Total st�rrelse af filer i dette projekt";
$help["project_scope_creep"] = "Forskel i dage mellem planlagt dato og f�rdig dato (Fed, hvis positiv v�rdi). Totalt for alle opgaver.";
$help["mycompany_logo"] = "Upload dit firmas logo, dette vil blive vist i stedet for navn, i header";
$help["calendar_shortname"] = "V�rdi ved m�nedlig visning i kalender. Tvungen";
$help["user_autologout"] = "Tid i sekunder, f�r man bliver logget af p� grund af manglende aktivitet. 0 for at deaktivere.";
$help["user_timezone"] = "V�lg din GMT tidszone";
//2.4
$help["setup_clientsfilter"] = "Filtr�r for kun at se logf�rte brugere";
$help["setup_projectsfilter"] = "Filtr�r for kun at se projekt, hvis brugere er en del af en gruppe.";
//2.5
$help["setup_notificationMethod"] = "S�t metode for at sende email notifikationer: med intern php mail funktion (kr�ver en smtp server eller sendmail konfigureret i phps parametre) eller med en personlig smtp server";
?>
