<?php
/*
** Application name: phpCollab
** Last Edit page: 2003-10-23 
** Path by root: ../preferences/updatepassword.php
** Authors: Ceam / Fullo 
**
** =============================================================================
**
**               phpCollab - Project Managment 
**
** -----------------------------------------------------------------------------
** Please refer to license, copyright, and credits in README.TXT
**
** -----------------------------------------------------------------------------
** FILE: updatepassword.php
**
** DESC: Screen: 
**
** HISTORY:
** 	2003-10-23	-	added new document info
**	2003-10-27	-	session problem fixed
**  2004-08-23  -   session check for older php
** -----------------------------------------------------------------------------
** TO-DO:
** move to a better login system and authentication (try to db session)
**
** =============================================================================
*/


$checkSession = "true";
include_once('../includes/library.php');

if ($enable_cvs == "true") {
include("../includes/cvslib.php");
}

if ($action == "update") {
$r = substr($opw, 0, 2); 
$opw = crypt($opw, $r);
if ($opw != $passwordSession) {
	$error = $strings["old_password_error"];
} else {
	if ($npw != $pwa || $npw == "") {
		$error = $strings["new_password_error"];
	} else {
		$cnpw = get_password($npw);

if ($htaccessAuth == "true") {
	include("../includes/htpasswd.class.php");
	$Htpasswd = new Htpasswd;
	$tmpquery = "WHERE tea.member = '$idSession'";
	$listProjects = new request();
	$listProjects->openTeams($tmpquery);
	$comptListProjects = count($listProjects->tea_id);

	if ($comptListProjects != "0") {
		for ($i=0;$i<$comptListProjects;$i++) {
			$Htpasswd->initialize("../files/".$listProjects->tea_pro_id[$i]."/.htpasswd");
			$Htpasswd->changePass($loginSession,$cnpw);
		}
	}
}

		$tmpquery = "UPDATE ".$tableCollab["members"]." SET password='$cnpw' WHERE id = '$idSession'";
		connectSql("$tmpquery");

//if mantis bug tracker enabled
		if ($enableMantis == "true") {
// call mantis function to reset user password
			include ("../mantis/user_reset_pwd.php");				
		}

//if CVS repository enabled
		if ($enable_cvs == "true") {
			$query = "WHERE tea.member = '$idSession'";
			$cvsMembers = new request();
			$cvsMembers->openTeams($query);

//change the password in every repository
			for ($i=0;$i<(count($cvsMembers->tea_id));$i++) {
				cvs_change_password($cvsMembers->tea_mem_login[$i], $cnpw, $cvsMembers->tea_pro_id[$i]);
			}
		}
		$r = substr($npw, 0, 2); 
		$npw = crypt($npw, $r);
		$passwordSession = $npw;

		$_SESSION['passwordSession'] = $passwordSession;

		headerFunction("../preferences/updateuser.php?msg=update&".session_name()."=".session_id());
		exit;
	}
}
}

$tmpquery = "WHERE mem.id = '$idSession'";
$userDetail = new request();
$userDetail->openMembers($tmpquery);
$comptUserDetail = count($userDetail->mem_id);

if ($comptUserDetail == "0") {
	headerFunction("../users/listusers.php?msg=blankUser&".session_name()."=".session_id());
	exit;
}

$bodyCommand = "onLoad=\"document.change_passwordForm.opw.focus();\"";
include('../themes/'.THEME.'/header.php');


$blockPage = new block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($strings["preferences"]);
if ($notifications == "true") {
$blockPage->itemBreadcrumbs($blockPage->buildLink("../preferences/updateuser.php?",$strings["user_profile"],in)." | ".$strings["change_password"]." | ".$blockPage->buildLink("../preferences/updatenotifications.php?",$strings["notifications"],in));
} else {
$blockPage->itemBreadcrumbs($blockPage->buildLink("../preferences/updateuser.php?",$strings["user_profile"],in)." | ".$strings["change_password"]);
}
$blockPage->closeBreadcrumbs();

if ($msg != "") {
	include('../includes/messages.php');
	$blockPage->messagebox($msgLabel);
}

$block1 = new block();

$block1->form = "change_password";
$block1->openForm("../preferences/updatepassword.php?action=update&".session_name()."=".session_id());

if ($error != "") {            
	$block1->headingError($strings["errors"]);
	$block1->contentError($error);
}

$block1->heading($strings["change_password"]." : ".$userDetail->mem_login[0]);

$block1->openContent();
$block1->contentTitle($strings["change_password_intro"]);

$block1->contentRow("* ".$strings["old_password"],"<input style=\"width: 150px;\" type=\"password\" name=\"opw\" value=\"\">");
$block1->contentRow("* ".$strings["new_password"],"<input style=\"width: 150px;\" type=\"password\" name=\"npw\" value=\"\">");
$block1->contentRow("* ".$strings["confirm_password"],"<input style=\"width: 150px;\" type=\"password\" name=\"pwa\" value=\"\">");
$block1->contentRow("","<input type=\"submit\" name=\"Save\" value=\"".$strings["save"]."\">");

$block1->closeContent();
$block1->closeForm();

include('../themes/'.THEME.'/footer.php');
?>