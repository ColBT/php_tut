<?php
/*
** Application name: phpCollab
** Last Edit page: 2003-10-23 
** Path by root: ../clients/index.php
** Authors: Ceam / Fullo 
** =============================================================================
**
**               phpCollab - Project Managment 
**
** -----------------------------------------------------------------------------
** Please refer to license, copyright, and credits in README.TXT
**
** -----------------------------------------------------------------------------
** FILE: index.php
**
** DESC: screen: index dummy page
**
** HISTORY:
** 	2003-10-23	-	main page for client module
** -----------------------------------------------------------------------------
** TO-DO:
**	
** =============================================================================
*/


$checkSession = "false";
include_once('../includes/library.php');
headerFunction('../index.php?'.session_name().'='.session_id());
exit;
?>