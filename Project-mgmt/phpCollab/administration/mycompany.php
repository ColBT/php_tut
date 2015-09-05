<?php
/*
** Application name: phpCollab
** Last Edit page: 06/09/2004 
** Path by root: ../administration/mycompany.php
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
** FILE: mycompany.php
**
** DESC: Screen: add/modify information on the main company
**
** HISTORY:
** 	2003-10-23	-	added new document info
**  2004-09-06  -   xhtml correction
** -----------------------------------------------------------------------------
** TO-DO:
** 
**
** =============================================================================
*/


$checkSession = "true";
include_once('../includes/library.php');

if ($profilSession != "0") 
{
	headerFunction('../general/permissiondenied.php?'.session_name().'='.session_id());
	exit;
}

$action = returnGlobal('action','GET');

if ($action == "update") 
{
	$extension = returnGlobal('extension','POST');
	$extensionOld = returnGlobal('extensionOld','POST');
	$cn = returnGlobal('cn','POST');
	$add = returnGlobal('add','POST');
	$wp = returnGlobal('wp','POST');
	$url = returnGlobal('url','POST');
	$email = returnGlobal('email','POST');
	$c = returnGlobal('c','POST');
	$logoDel = returnGlobal('logoDel','POST');

	if ($logoDel == "on") 
	{
		$tmpquery = "UPDATE ".$tableCollab["organizations"]." SET extension_logo='' WHERE id='1'";
		connectSql("$tmpquery");
		@unlink("../logos_clients/1.$extensionOld");
	}
	
	$extension = strtolower( substr( strrchr($_FILES['upload']['name'], ".") ,1) );
	if(@move_uploaded_file($_FILES['upload']['tmp_name'], "../logos_clients/1.$extension")) 
	{
		$tmpquery = "UPDATE ".$tableCollab["organizations"]." SET extension_logo='$extension' WHERE id='1'";
		connectSql("$tmpquery");
	}
	$cn = convertData($cn);
	$add = convertData($add);
	$c = convertData($c);
	$tmpquery = "UPDATE ".$tableCollab["organizations"]." SET name='$cn',address1='$add',phone='$wp',url='$url',email='$email',comments='$c' WHERE id = '1'";
	connectSql("$tmpquery");
	headerFunction("../administration/mycompany.php?".session_name()."=".session_id());
}
$tmpquery = "WHERE org.id = '1'";
$clientDetail = new request();
$clientDetail->openOrganizations($tmpquery);

$cn = $clientDetail->org_name[0];
$add = $clientDetail->org_address1[0];
$wp = $clientDetail->org_phone[0];
$url = $clientDetail->org_url[0];


$email = $clientDetail->org_email[0];
$c = $clientDetail->org_comments[0];

$setTitle .= " : Company Details";

$bodyCommand = "onLoad='document.adminDForm.cn.focus();'";
include('../themes/'.THEME.'/header.php');



$blockPage = new block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../administration/admin.php?",$strings["administration"],in));
$blockPage->itemBreadcrumbs($strings["company_details"]);
$blockPage->closeBreadcrumbs();

if ($msg != "") 
{
	include('../includes/messages.php');
	$blockPage->messagebox($msgLabel);
}

$block1 = new block();

echo "<a name='".$block1->form."Anchor'></a>\n
	<form accept-charset='UNKNOWN' method='POST' action='../administration/mycompany.php?action=update&".session_name()."=".session_id()."' name='adminDForm' enctype='multipart/form-data'>
	<input type='hidden' name='MAX_FILE_SIZE' value='100000000'>\n";

if ($error != "") 
{            
	$block1->headingError($strings["errors"]);
	$block1->contentError($error);
}

$block1->heading($strings["company_details"]);

$block1->openContent();

$block1->contentTitle($strings["company_info"]);
$block1->contentRow($strings["name"],"<input size='44' value='$cn' style='width: 400px' name='cn' maxlength='100' type='TEXT'>");
$block1->contentRow($strings["address"],"<textarea rows='3' style='width: 400px; height: 50px;' name='add' cols='43'>$add</textarea>");
$block1->contentRow($strings["phone"],"<input size='32' value='$wp' style='width: 250px' name='wp' maxlength='32' type='TEXT'>");
$block1->contentRow($strings["url"],"<input size='44' value='$url' style='width: 400px' name='url' maxlength='2000' type='TEXT'>");
$block1->contentRow($strings["email"],"<input size='44' value='$email' style='width: 400px' name='email' maxlength='2000' type='TEXT'>");
$block1->contentRow($strings["comments"],"<textarea rows='3' style='width: 400px; height: 50px;' name='c' cols='43'>$c</textarea>");
$block1->contentRow($strings["logo"].$blockPage->printHelp("mycompany_logo"),"<input size='44' style='width: 400px' name='upload' type='file'>");

if (file_exists("../logos_clients/1.".$clientDetail->org_extension_logo[0])) 
{
$block1->contentRow("","<img src='../logos_clients/1.".$clientDetail->org_extension_logo[0]."' border='0' alt='".$clientDetail->org_name[0]."'> <input name='extensionOld' type='hidden' value='".$clientDetail->org_extension_logo[0]."'><input name='logoDel' type='checkbox' value='on'> ".$strings["delete"]);
}

$block1->contentRow("","<input type='SUBMIT' value='".$strings["save"]."'>");

$block1->closeContent();
$block1->closeForm();

include('../themes/'.THEME.'/footer.php');
?>