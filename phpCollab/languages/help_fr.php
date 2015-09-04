<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../languages/help_fr.php

//translator(s): 
$help["setup_mkdirMethod"] = "Si le safe-mode est actif (on), vous avez besoin de d�finir un compte FTP pour pouvoir cr�er des dossiers avec le gestionnaire de fichiers.";
$help["setup_notifications"] = "Notification �lectronique aux utilisateurs (affectation de t�ches, nouvelle publication, changement de t�ches...)<br/>Un SMPT/SENDMAIL valide est n�cessaire.";
$help["setup_forcedlogin"] = "Si faux, n'autorise pas les liens externes avec l'identifiant et le mot de passe dans l'URL.";
$help["setup_langdefault"] = "D�finit le langage par d�faut du formulaire de connexion.";
$help["setup_myprefix"] = "D�finir cette valeur si vous avez des tables de m�me dans dans la base existante.<br/><br/>assignments<br/>bookmarks<br/>bookmarks_categories<br/>calendar<br/>files<br/>logs<br/>members<br/>notes<br/>notifications<br/>organizations<br/>phases<br/>posts<br/>projects<br/>reports<br/>sorting<br/>subtasks<br/>support_posts<br/>support_requests<br/>tasks<br/>teams<br/>topics<br/>updates<br/><br/>Laisser blanc pour ne pas utiliser de pr�fixe.";
$help["setup_loginmethod"] = "M�thode de sauvegarde des mots de passe dans la base de donn�es.<br/>Utilisez to &quot;Crypt&quot; pour faire fonctionner les authentifications CVS et htaccess (si le support CVS et/ou htaccess sont activ�s).";
$help["admin_update"] = "Respectez l'ordre des �tapes pour mettre � jour votre version.<br/>1. Editer le fichier de param�trage (pour compl�ter les nouveaux �l�ments)<br/>2. Editer la base de donn�e (mise � jour en fonction de votre version pr�c�dente)";
$help["task_scope_creep"] = "Diff�rence en jours entre la date due et la date d'ach�vement (en gras si positive)";
$help["max_file_size"] = "Taille maximale d'envoie d'un fichier";
$help["project_disk_space"] = "Taille totale des fichiers du projet";
$help["project_scope_creep"] = "Diff�rence en nombre de jours entre la date due et la date de fin effective (en gras si positif). Total pour toutes les t�ches";
$help["mycompany_logo"] = "Attach� un logo pour votre societ�. Appara�t dans l'en-t�te, � la place du titre du site";
$help["calendar_shortname"] = "Label visible dans la vue mensuelle du calendrier. Obligatoire";
$help["user_autologout"] = "Dur�e en secondes d'inactivit� permise avant d�connection automatique. 0 pour d�sactiv�";
$help["user_timezone"] = "D�finissez votre fuseau horaire";
//2.4
$help["setup_clientsfilter"] = "Filtre pour voir seulement les clients d'un utilisateur";
$help["setup_projectsfilter"] = "Filtre pour voir seulement les projets dont l'utilisateur fait parti";
//2.5
$help["setup_notificationMethod"] = "D�finissez la m�thode de notification �lectronique : avec les fonctions internes PHP (il est n�cessaire d'avoir un serveur SMTP configur� pour) ou avec un serveur SMTP sp�cifique.";
//2.5b3
$help["newsdesk_links"] = "Utiliser le point-virgule pour ajouter plusieurs liens";
?>