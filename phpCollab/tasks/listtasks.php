<?php
/*
** Application name: phpCollab
** Last Edit page: 05/11/2004
** Path by root:  ../tasks/listtasks.php
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
** FILE: listtasks.php
**
** DESC: Screen:  view  task information
**
** HISTORY:
**	19/05/2005	-	fixed and &amp; in link
**  10/02/2007  -   Changed JPGraph implementation 
** -----------------------------------------------------------------------------
** TO-DO:
** clean code
** =============================================================================
*/


$checkSession = "true";
include_once('../includes/library.php');

if ($action == "publish") {
if ($addToSite == "true") {
$multi = strstr($id,"**");
if ($multi != "") {
$id = str_replace("**",",",$id);
$tmpquery1 = "UPDATE ".$tableCollab["tasks"]." SET published='0' WHERE id IN($id)";
} else {
$tmpquery1 = "UPDATE ".$tableCollab["tasks"]." SET published='0' WHERE id = '$id'";
}
connectSql("$tmpquery1");
$msg = "addToSite";
$id = $project;
}

if ($removeToSite == "true") {
$multi = strstr($id,"**");
if ($multi != "") {
$id = str_replace("**",",",$id);
$tmpquery1 = "UPDATE ".$tableCollab["tasks"]." SET published='1' WHERE id IN($id)";
} else {
$tmpquery1 = "UPDATE ".$tableCollab["tasks"]." SET published='1' WHERE id = '$id'";
}
connectSql("$tmpquery1");
$msg = "removeToSite";
$id = $project;
}
}

$tmpquery = "WHERE pro.id = '$project'";
$projectDetail = new request();
$projectDetail->openProjects($tmpquery);

$teamMember = "false";
$tmpquery = "WHERE tea.project = '$project' AND tea.member = '$idSession'";
$memberTest = new request();
$memberTest->openTeams($tmpquery);
$comptMemberTest = count($memberTest->tea_id);
	if ($comptMemberTest == "0") {
		$teamMember = "false";
	} else {
		$teamMember = "true";
	}
if ($teamMember == "false" && $projectsFilter == "true") { 
	header("Location:../general/permissiondenied.php?".session_name()."=".session_id()); 
	exit; 
} 

include('../themes/'.THEME.'/header.php');

$blockPage = new block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../projects/listprojects.php?",$strings["projects"],in));
$blockPage->itemBreadcrumbs($blockPage->buildLink("../projects/viewproject.php?id=".$projectDetail->pro_id[0],$projectDetail->pro_name[0],in));
$blockPage->itemBreadcrumbs($strings["tasks"]);
$blockPage->closeBreadcrumbs();

if ($msg != "") {
	include('../includes/messages.php');
	$blockPage->messagebox($msgLabel);
}

$blockPage->bornesNumber = "1";

$block1 = new block();

$block1->form = "saT";
$block1->openForm("../tasks/listtasks.php?".session_name()."=".session_id()."&project=$project#".$block1->form."Anchor");

$block1->heading($strings["tasks"]);

$block1->openPaletteIcon();
if ($teamMember == "true") {
	$block1->paletteIcon(0,"add",$strings["add"]);
	$block1->paletteIcon(1,"remove",$strings["delete"]);
	$block1->paletteIcon(2,"copy",$strings["copy"]);
	//$block1->paletteIcon(3,"export",$strings["export"]);
	if ($sitePublish == "true") {
		$block1->paletteIcon(4,"add_projectsite",$strings["add_project_site"]);
		$block1->paletteIcon(5,"remove_projectsite",$strings["remove_project_site"]);
	}
}
$block1->paletteIcon(6,"info",$strings["view"]);
if ($teamMember == "true") {
	$block1->paletteIcon(7,"edit",$strings["edit"]);
}
$block1->closePaletteIcon();

$block1->borne = $blockPage->returnBorne("1");
$block1->rowsLimit = "20";

$block1->sorting("tasks",$sortingUser->sor_tasks[0],"tas.name ASC",$sortingFields = array(0=>"tas.name",1=>"tas.priority",2=>"tas.status",3=>"tas.completion",4=>"tas.due_date",5=>"mem.login",6=>"tas.published"));

$tmpquery = "WHERE tas.project = '$project' ORDER BY $block1->sortingValue";

$block1->recordsTotal = compt($initrequest["tasks"]." ".$tmpquery);

$listTasks = new request();
$listTasks->openTasks($tmpquery,$block1->borne,$block1->rowsLimit);
$comptListTasks = count($listTasks->tas_id);

if ($comptListTasks != "0") {
	$block1->openResults();

	$block1->labels($labels = array(0=>$strings["task"],1=>$strings["priority"],2=>$strings["status"],3=>$strings["completion"],4=>$strings["due_date"],5=>$strings["assigned_to"],6=>$strings["published"]),"true");

for ($i=0;$i<$comptListTasks;$i++) {
if ($listTasks->tas_due_date[$i] == "") {
	$listTasks->tas_due_date[$i] = $strings["none"];
}
$idStatus = $listTasks->tas_status[$i];
$idPriority = $listTasks->tas_priority[$i];

$idPublish = $listTasks->tas_published[$i];
$complValue = ($listTasks->tas_completion[$i]>0) ? $listTasks->tas_completion[$i]."0 %": $listTasks->tas_completion[$i]." %"; 
$block1->openRow();
$block1->checkboxRow($listTasks->tas_id[$i]);
$block1->cellRow($blockPage->buildLink("../tasks/viewtask.php?id=".$listTasks->tas_id[$i],$listTasks->tas_name[$i],in));
$block1->cellRow("<img src=\"../themes/".THEME."/gfx_priority/".$idPriority.".gif\" alt='".$strings["priority"].": ".$priority[$idPriority]."' /> ".$priority[$idPriority]);
$block1->cellRow($status[$idStatus]);
$block1->cellRow($complValue);
if ($listTasks->tas_due_date[$i] <= $date && $listTasks->tas_completion[$i] != "10") {
	$block1->cellRow("<b>".$listTasks->tas_due_date[$i]."</b>");
} else {
	$block1->cellRow($listTasks->tas_due_date[$i]);
}
if ($listTasks->tas_start_date[$i] != "--" && $listTasks->tas_due_date[$i] != "--") {
$gantt = "true";
}
if ($listTasks->tas_assigned_to[$i] == "0") {
$block1->cellRow($strings["unassigned"]);
} else {
$block1->cellRow($blockPage->buildLink($listTasks->tas_mem_email_work[$i],$listTasks->tas_mem_login[$i],mail));
}
if ($sitePublish == "true") {
$block1->cellRow($statusPublish[$idPublish]);
}
$block1->closeRow();
}
$block1->closeResults();

$block1->bornesFooter("1",$blockPage->bornesNumber,"","project=$project");

	if ($activeJpgraph == "true" && $gantt == "true") {
	echo "
		<div id='ganttChart_taskList' class='ganttChart'>
			<img src='graphtasks.php?".session_name()."=".session_id()."&project=".$projectDetail->pro_id[0]."' alt=''><br/>
			<span class='listEvenBold''>".$blockPage->buildLink("http://www.aditus.nu/jpgraph/","JpGraph",powered)."</span>	
		</div>
	";
	}
} else {
$block1->noresults();
}
$block1->closeFormResults();

$block1->openPaletteScript();
if ($teamMember == "true") {
$block1->paletteScript(0,"add","../tasks/edittask.php?project=$project","true,false,false",$strings["add"]);
$block1->paletteScript(1,"remove","../tasks/deletetasks.php?project=$project","false,true,true",$strings["delete"]);
$block1->paletteScript(2,"copy","../tasks/edittask.php?project=$project&docopy=true","false,true,false",$strings["copy"]);
//$block1->paletteScript(3,"export","export.php?","false,true,true",$strings["export"]);
if ($sitePublish == "true") {
$block1->paletteScript(4,"add_projectsite","../tasks/listtasks.php?addToSite=true&project=".$projectDetail->pro_id[0]."&action=publish","false,true,true",$strings["add_project_site"]);
$block1->paletteScript(5,"remove_projectsite","../tasks/listtasks.php?removeToSite=true&project=".$projectDetail->pro_id[0]."&action=publish","false,true,true",$strings["remove_project_site"]);
}
}
$block1->paletteScript(6,"info","../tasks/viewtask.php?","false,true,false",$strings["view"]);
if ($teamMember == "true") {
$block1->paletteScript(7,"edit","../tasks/edittask.php?project=$project","false,true,true",$strings["edit"]);
}
$block1->closePaletteScript($comptListTasks,$listTasks->tas_id);

include('../themes/'.THEME.'/footer.php');
?>