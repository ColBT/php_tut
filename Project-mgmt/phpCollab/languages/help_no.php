<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../languages/help_no.php

//translator(s): Wiggo Eriksen <Prosjektledelse.no>
$help["setup_mkdirMethod"] = "Om safe-mode er p�=On, du m� sette en Ftp konto for � kunne lage en mappe med file management.";
$help["setup_notifications"] = "Bruker e-mail melding (oppgave tildeling, nytt innlegg, oppgave endring...)<br>Validert smtp/sendmail beh�ves.";
$help["setup_forcedlogin"] = "Om false, ikke tillat med ekstern link med login/password i url";
$help["setup_langdefault"] = "Velg spr�k som vil bli valgt ved login som standard eller la den v�re blank for � bruke auto_detect browser spr�k.";
$help["setup_myprefix"] = "Definer denne verdien om du har tabeller med samme navn i eksisterende database.<br><br>oppgaver<br>bokmerke<br>bokmerke_kategorier<br>kalendar<br>filer<br>logs<br>medlemer<br>notat<br>notifikasjon<br>organisasjon<br>faser<br>posteringer<br>prosjekt<br>rapporter<br>sortering<br>suboppgave<br>suport_postering<br>suport_�nske<br>oppgaver<br>grupper<br>emner<br>updates<br><br>La v�re blank for ikke � bruke tabel prefix.";
$help["setup_loginmethod"] = "Metode for � lagre passord i database.<br>Sett til &quot;Crypt&quot; for at CVS autentikasjon og htaccess autentikasjon skal virke (om CVS support og/eller htaccess autentikasjon er sl�tt p�).";
$help["admin_update"] = "F�lg bestemt den rekkef�lge indikert for � oppdatere din version<br>1. Endre settings (legg inn nye parameter)<br>2. Endre database (oppdater i samhandel med din tidliger version)";
$help["task_scope_creep"] = "Differanse i dager mellom slutt dato og ferdig dato (fet tekst om positiv)";
$help["max_file_size"] = "Maksimal fil st�rrelse p� fil som skal lastes opp";
$help["project_disk_space"] = "Total fil st�rrelse for prosjektet";
$help["project_scope_creep"] = "Differanse i dager mellom slutt dato og ferdig dato (fet tekst om positiv). Total for alle oppgaver";
$help["mycompany_logo"] = "Last opp vilken som helst logo for ditt selskap. Vil komme i header, istedenfor i tittel side";
$help["calendar_shortname"] = "Tekst som vil komme p� m�nedlig kalender view. P�krevd";
$help["user_autologout"] = "Tid i sek. f�r frakobling etter ingen aktivitet. 0 for � disable";
$help["user_timezone"] = "Sett din GMT tidssone";
//2.4
$help["setup_clientsfilter"] = "Filter for � bare � se loggede bruker klienter";
$help["setup_projectsfilter"] = "Filter for � bare se prosjektet n�r brukeren er i gruppen";
//2.5
$help["setup_notificationMethod"] = "Sett metode for � sende e-mail notifikasjon: med intern php mail funksjon (trenger en smtp server eller sendmail konfigurert i php parameterene) eller med en personlig smtp server";
//2.5 fullo
$help["newsdesk_links"] = "for � legge til flere linker bruk semikolon";
?>