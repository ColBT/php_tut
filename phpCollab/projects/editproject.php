<?php
/*
** Application name: phpCollab
** Last Edit page: 2005-03-08 
** Path by root: ../projects/editproject.php
** Authors: Ceam / Fullo / dracono
**
** =============================================================================
**
**               phpCollab - Project Managment 
**
** -----------------------------------------------------------------------------
** Please refer to license, copyright, and credits in README.TXT
**
** -----------------------------------------------------------------------------
** FILE: editproject.php
**
** DESC: Screen: Create or edit a project
**
** HISTORY:
**  2005-03-08	-	fixed null value for hourly rate
**	19/05/2005	-	fixed and &amp; in link
**	22/05/2005	-	added subtask copy
** -----------------------------------------------------------------------------
** TO-DO:
** =============================================================================
*/

$checkSession = "true";
include_once('../includes/library.php');
include("../includes/customvalues.php");

$id = returnGlobal('id','REQUEST');
$docopy = returnGlobal('docopy','REQUEST');

if ($htaccessAuth == "true") 
{
	include("../includes/htpasswd.class.php");
	$Htpasswd = new Htpasswd;
}

if ($enable_cvs == "true") 
{
	include("../includes/cvslib.php");
}

//case update or copy project
if ($id != "") 
{
	if ($profilSession != "0" && $profilSession != "1" && $profilSession != "5") 
	{
		headerFunction("../projects/viewproject.php?id=$id&".session_name()."=".session_id());
		exit;
	}

//test exists selected project, redirect to list if not
	$tmpquery = "WHERE pro.id = '$id'";
	$projectDetail = new request();
	$projectDetail->openProjects($tmpquery);
	$comptProjectDetail = count($projectDetail->pro_id);

    if ($docopy == "true") $setTitle .= " : Copy Project (" . $projectDetail->pro_name[0] . ")";
    else $setTitle .= " : Edit Project (" . $projectDetail->pro_name[0] . ")";


	if ($comptProjectDetail == "0") 
	{
		headerFunction("../projects/listprojects.php?msg=blankProject&".session_name()."=".session_id());
		exit;
	}
	
	if ($idSession != $projectDetail->pro_owner[0] && $profilSession != "0" && $profilSession != "5") 
	{
		headerFunction("../projects/listprojects.php?msg=projectOwner&".session_name()."=".session_id());
		exit;
	}

	//case update or copy project
	if ($action == "update") 
	{

		//replace quotes by html code in name and description
		$pn = convertData($pn);
		$d = convertData($d);

		//case copy project
		if ($docopy == "true") 
		{

			if ($invoicing == "" || $clod == "1") 
			{
				$invoicing = "0";
			}

			if ($hourly_rate == "")
			{
				$hourly_rate = "0.00";
			}

			//insert into projects and teams (with last id project)
			$tmpquery1 = "INSERT INTO ".$tableCollab["projects"]."(name,priority,description,owner,organization,status,created,published,upload_max,url_dev,url_prod,phase_set,invoicing,hourly_rate) VALUES('$pn','$pr','$d','$pown','$clod','$st','$dateheure','$projectPublished','$up','$url_dev','$url_prod','$thisPhase','$invoicing','$hourly_rate')";
			connectSql("$tmpquery1");
			$tmpquery = $tableCollab["projects"];
			last_id($tmpquery);
			$projectNew = $lastId[0];
			unset($lastId);

			$tmpquery2 = "INSERT INTO ".$tableCollab["teams"]."(project,member,published,authorized) VALUES('$projectNew','$pown','1','0')";
			connectSql("$tmpquery2");

			if ($enableInvoicing == "true") 
			{
					// This doesn't work with postgresql, does it need to be database dependant?
					//$tmpquery3 = "INSERT INTO ".$tableCollab["invoices"]." SET project='$projectNew',created='$dateheure',status='0',active='$invoicing',published='1'";
					$tmpquery3 = "INSERT INTO ".$tableCollab["invoices"]."(project,created,status,active,published) VALUES ('$projectNew','$dateheure','0','$invoicing','1')";
					
					connectSql($tmpquery3);
			}

			//create project folder if filemanagement = true
			if ($fileManagement == "true") 
			{
				createDir("files/$projectNew");
			}
		
			if ($htaccessAuth == "true") 
			{

$content = <<<STAMP
AuthName "$setTitle"
AuthType Basic
Require valid-user
AuthUserFile $fullPath/files/$projectNew/.htpasswd
STAMP;
				$fp = @fopen("../files/$projectNew/.htaccess",'wb+');
				$fw = fwrite($fp,$content);
				$fp = @fopen("../files/$projectNew/.htpasswd",'wb+');

				$tmpquery = "WHERE mem.id = '$pown'";
				$detailMember = new request();
				$detailMember->openMembers($tmpquery);

				$Htpasswd = new Htpasswd;
				$Htpasswd->initialize("../files/".$projectNew."/.htpasswd");
				$Htpasswd->addUser($detailMember->mem_login[0],$detailMember->mem_password[0]);
			}

			$tmpquery = "WHERE tas.project = '$id'";
			$listTasks = new request();
			$listTasks->openTasks($tmpquery);
			$comptListTasks = count($listTasks->tas_id);

			for ($i=0;$i<$comptListTasks;$i++) 
			{
				$assigned = "";
				$at = "";
				$tn = convertData($listTasks->tas_name[$i]);
				$d = convertData($listTasks->tas_description[$i]);
				$ow = $listTasks->tas_owner[$i];
				$at = $listTasks->tas_assigned_to[$i];
				$st = $listTasks->tas_status[$i];
				$pr = $listTasks->tas_priority[$i];
				$sd = $listTasks->tas_start_date[$i];
				$dd = $listTasks->tas_due_date[$i];
				$cd = $listTasks->tas_complete_date[$i];
				$etm = $listTasks->tas_estimated_time[$i];
				$atm = $listTasks->tas_actual_time[$i];
				$c = convertData($listTasks->tas_comments[$i]);
				$pha = $listTasks->tas_parent_phase[$i];
				$published = $listTasks->tas_published[$i];
				$compl = $listTasks->tas_completion[$i];
								
				if ($at != "0") 
				{
					$assigned = $dateheure;
				}
						
				$tmpquery1 = "INSERT INTO ".$tableCollab["tasks"]."(project,name,description,owner,assigned_to,status,priority,start_date,due_date,complete_date,estimated_time,actual_time,comments,created,assigned,published,completion,parent_phase) VALUES('$projectNew','$tn','$d','$ow','$at','$st','$pr','$sd','$dd','$cd','$etm','$atm','$c','$dateheure','$assigned','$published','$compl','$pha')";
				connectSql("$tmpquery1");
				$tmpquery = $tableCollab["tasks"];
				last_id($tmpquery);
				$num = $lastId[0];
				unset($lastId);

				$tmpquery2 = "INSERT INTO ".$tableCollab["assignments"]."(task,owner,assigned_to,assigned) VALUES('$num','$ow','$at','$dateheure')";
				connectSql("$tmpquery2");
				
				//start the subtask copy
				$T_id=$listTasks->tas_id[$i];
				
				$tmpquery1 = "WHERE task = '$T_id'";
				$subtaskDetail = new request();
				$subtaskDetail->openSubtasks($tmpquery1);
				$comptListSubtasks = count($subtaskDetail->subtas_id);
				
				for ($j=0;$j<$comptListSubtasks;$j++) 
				{
					$s_tn = convertData($subtaskDetail->subtas_name[$j]);
					$s_d = convertData($subtaskDetail->subtas_description[$j]);
					$s_ow = $subtaskDetail->subtas_owner[$j];
					$s_at = $subtaskDetail->subtas_assigned_to[$j];
					$s_st = $subtaskDetail->subtas_status[$j];
					$s_pr = $subtaskDetail->subtas_priority[$j];
					$s_sd = $subtaskDetail->subtas_start_date[$j];
					$s_dd = $subtaskDetail->subtas_due_date[$j];
					$s_cd = $subtaskDetail->subtas_complete_date[$j];
					$s_etm = $subtaskDetail->subtas_estimated_time[$j];
					$s_atm = $subtaskDetail->subtas_actual_time[$j];
					$s_c = convertData($subtaskDetail->subtas_comments[$j]);
					$s_published = $subtaskDetail->subtas_published[$j];
					$s_compl = $subtaskDetail->subtas_completion[$j];
						
					$tmpquery1 = "INSERT INTO ".$tableCollab["subtasks"]."(task,name,description,owner,assigned_to,status,priority,start_date,due_date,complete_date,estimated_time,actual_time,comments,created,assigned,published,completion) VALUES('$num','$s_tn','$s_d','$s_ow','$s_at','$s_st','$s_pr','$s_sd','$s_dd','$s_cd','$s_etm','$s_atm','$s_c','$dateheure','$dateheure','$s_published','$s_compl')";
					connectSql("$tmpquery1");
				
					$tmpquery = $tableCollab["subtasks"];
					last_id($tmpquery);
					$s_num = $lastId[0];
					unset($lastId);
		
					$tmpquery2 = "INSERT INTO ".$tableCollab["assignments"]."(subtask,owner,assigned_to,assigned) VALUES('$s_num','$s_ow','$s_at','$dateheure')";
					connectSql("$tmpquery2");
				}	
			
				
				if ($at != "0") 
				{
					$tmpquery = "WHERE tea.project = '$projectNew' AND tea.member = '$at'";
					$testinTeam = new request();
					$testinTeam->openTeams($tmpquery);
					$comptTestinTeam = count($testinTeam->tea_id);
					
					if ($comptTestinTeam == "0") 
					{
						$tmpquery3 = "INSERT INTO ".$tableCollab["teams"]."(project,member,published,authorized) VALUES('$projectNew','$at','1','0')";
						connectSql("$tmpquery3");
					
						if ($htaccessAuth == "true") 
						{
							$tmpquery = "WHERE mem.id = '$at'";
							$detailMember = new request();
							$detailMember->openMembers($tmpquery);

							$Htpasswd->initialize("../files/".$projectNew."/.htpasswd");
							$Htpasswd->addUser($detailMember->mem_login[0],$detailMember->mem_password[0]);
						}
					}
				}

			//create task sub-folder if filemanagement = true
				if ($fileManagement == "true") 
				{
					createDir("files/$projectNew/$num");
				}
			}
	
			//if mantis bug tracker enabled
			if ($enableMantis == "true") 
			{
				// call mantis function to copy project
				include("$pathMantis/proj_add.php");
			}

			//if CVS repository enabled
			if ($enable_cvs == "true") 
			{
				$user_query = "WHERE mem.id = '$pown'";
				$cvsUser = new request();
				$cvsUser->openMembers($user_query);
				cvs_add_repository($cvsUser->mem_login[0], $cvsUser->mem_password[0], $projectNew);
			}

			//create phase structure if enable phase was selected as true
			if ($thisPhase != "0") 
			{
				$comptThisPhase = count($phaseArraySets[$thisPhase]);
			
				for($i=0;$i<$comptThisPhase;$i++)
				{
					$tmpquery = "INSERT INTO ".$tableCollab["phases"]."(project_id,order_num,status,name) VALUES('$projectNew','$i','0','".$phaseArraySets[$thisPhase][$i]."')";
					connectSql("$tmpquery");
				}
			}

			headerFunction("../projects/viewproject.php?id=$projectNew&msg=add&".session_name()."=".session_id());

		} 
		else
		{

			//if project owner change, add new to team members (only if doesn't already exist)
			if ($pown != $projectDetail->pro_owner[0]) 
			{
				$tmpquery = "WHERE tea.project = '$id' AND tea.member = '$pown'";
				$testinTeam = new request();
				$testinTeam->openTeams($tmpquery);
				$comptTestinTeam = count($testinTeam->tea_id);
						
				if ($comptTestinTeam == "0") 
				{
					$tmpquery2 = "INSERT INTO ".$tableCollab["teams"]."(project,member,published,authorized) VALUES('$id','$pown','1','0')";
					connectSql("$tmpquery2");

					if ($htaccessAuth == "true") 
					{
						$tmpquery = "WHERE mem.id = '$pown'";
						$detailMember = new request();
						$detailMember->openMembers($tmpquery);

						$Htpasswd->initialize("../files/".$id."/.htpasswd");
						$Htpasswd->addUser($detailMember->mem_login[0],$detailMember->mem_password[0]);
					}
				}
			}

		//if organization change, delete old organization permitted users from teams
		if ($clod != $projectDetail->pro_organization[0]) 
		{
			$tmpquery = "WHERE tea.project = '$id' AND mem.profil = '3'";
			$suppTeamClient = new request();
			$suppTeamClient->openTeams($tmpquery);
			$comptSuppTeamClient = count($suppTeamClient->tea_id);
				
				if ($comptSuppTeamClient == "0") 
				{
					for ($i=0;$i<$comptSuppTeamClient;$i++)
					{
						$membersTeam .= $suppTeamClient->tea_mem_id[$i];
						if ($i < $comptSuppTeamClient-1) 
						{
							$membersTeam .= ",";
						} 

						if ($htaccessAuth == "true")
						{
							$Htpasswd->initialize("../files/".$id."/.htpasswd");
							$Htpasswd->deleteUser($suppTeamClient->mem_login[$i]);
						}
					}

					$tmpquery4 = "DELETE FROM ".$tableCollab["teams"]." WHERE project = '$id' AND member IN($membersTeam)";
					connectSql("$tmpquery4");
				}
		}

//-------------------------------------------------------------------------------------------------		
		$tmpquery = "WHERE pro.id = '$id'";
		$targetProject = new request();
		$targetProject->openProjects($tmpquery);

		//Delete old or unused phases
		if ($targetProject->pro_phase_set[0] != $thisPhase)
		{
			$tmpquery = "DELETE FROM ".$tableCollab["phases"]." WHERE project_id = $id";
			connectSql("$tmpquery");
		}
		
		//Create new Phases
		if($targetProject->pro_phase_set[0] != $thisPhase)
		{
			$comptThisPhase = count($phaseArraySets[$thisPhase]);
		
			for($i=0;$i<$comptThisPhase;$i++)
			{
				$tmpquery = "INSERT INTO ".$tableCollab["phases"]."(project_id,order_num,status,name) VALUES('$id','$i','0','".$phaseArraySets[$thisPhase][$i]."')";
				connectSql("$tmpquery");
			}
			
			//Get a listing of project tasks and files and re-assign them to new phases if the phase set of a project is changed.
			$tmpquery = "WHERE tas.project = '".$targetProject->pro_id[0]."'";
			$listTasks = new request();
			$listTasks->openTasks($tmpquery);
			$comptListTasks = count($listTasks->tas_id);
			
			$tmpquery = "WHERE fil.project = '".$targetProject->pro_id[0]."' AND fil.phase !='0'";
			$listFiles = new request();
			$listFiles->openFiles($tmpquery);
			$comptListFiles = count($listFiles->fil_id);
			
			$tmpquery = "WHERE pha.project_id = '".$targetProject->pro_id[0]."' AND pha.order_num ='0'";
			$targetPhase = new request();
			$targetPhase->openPhases($tmpquery);
			$comptTargetPhase = count($targetPhase->pha_id);			
			
			for($i=0;$i<$comptListTasks;$i++)
			{
				$tmpquery = "UPDATE ".$tableCollab["tasks"]." SET parent_phase='0' WHERE id = '".$listTasks->tas_id[$i]."'";
				connectSql("$tmpquery");
				$tmpquery = "UPDATE ".$tableCollab["files"]." SET phase='".$targetPhase->pha_id[0]."' WHERE id = '".$listFiles->fil_id[$i]."'";
				connectSql("$tmpquery");
			}
			
		}

		//update project
		if ($invoicing == "" || $clod == "1") 
		{
			//nb if the project has not client than the invocing will be deactivated
			$invoicing = "0";
		}
		$tmpquery = "UPDATE ".$tableCollab["projects"]." SET name='$pn',priority='$pr',description='$d',url_dev='$url_dev',url_prod='$url_prod',owner='$pown',organization='$clod',status='$st',modified='$dateheure',upload_max='$up',phase_set='$thisPhase',invoicing='$invoicing',hourly_rate='$hourly_rate' WHERE id = '$id'";
		connectSql("$tmpquery");

		if ($enableInvoicing == "true") 
		{
			$tmpquery3 = "UPDATE ".$tableCollab["invoices"]." SET active='$invoicing' WHERE project = '$id'";
			connectSql($tmpquery3);
		}

		//if mantis bug tracker enabled
		if ($enableMantis == "true") 
		{
			// call mantis function to copy project
			include("../mantis/proj_update.php");
		}
			headerFunction("../projects/viewproject.php?id=$id&msg=update&".session_name()."=".session_id());
		}
	}


	//set value in form
	$pn = $projectDetail->pro_name[0];
	$d = $projectDetail->pro_description[0];
	$url_dev = $projectDetail->pro_url_dev[0];
	$url_prod = $projectDetail->pro_url_prod[0];
	$hourly_rate = $projectDetail->pro_hourly_rate[0]; 
	$invoicing = $projectDetail->pro_invoicing[0];
}

//case add project
if ($id == "") 
{
    $setTitle .= " : Add Project";

	if ($profilSession != "0" && $profilSession != "1" && $profilSession != "5") 
	{
		headerFunction("../projects/listprojects.php?".session_name()."=".session_id());
		exit;
	}

	//set organization if add project action done from clientdetail
	if ($organization != "") 
	{
		$projectDetail->pro_org_id[0] = "$organization";
	}

	//set default values
	$projectDetail->pro_mem_id[0] = "$idSession";
	$projectDetail->pro_priority[0] = "3";

	$projectDetail->pro_status[0] = "2";
	$projectDetail->pro_upload_max[0] = $maxFileSize;

	//case add project
	if ($action == "add") 
	{
		//replace quotes by html code in name and description
		$pn = convertData($pn);
		$d = convertData($d);

		if ($invoicing == "" || $clod == "1") 
		{
			$invoicing = "0";
		}

		if ($hourly_rate == "")
		{
			$hourly_rate = "0.00";
		}

		//insert into projects and teams (with last id project)
		$tmpquery1 = "INSERT INTO ".$tableCollab["projects"]."(name,priority,description,owner,organization,status,created,published,upload_max,url_dev,url_prod,phase_set,invoicing,hourly_rate) VALUES('$pn','$pr','$d','$pown','$clod','$st','$dateheure','1','$up','$url_dev','$url_prod','$thisPhase','$invoicing','$hourly_rate')";
		connectSql("$tmpquery1");
		$tmpquery = $tableCollab["projects"];
		last_id($tmpquery);
		$num = $lastId[0];
		unset($lastId);

		if ($enableInvoicing == "true") 
		{
			//$tmpquery3 = "INSERT INTO ".$tableCollab["invoices"]." SET project='$num',status='0',created='$dateheure',active='$invoicing',published='1'";
			$tmpquery3 = "INSERT INTO ".$tableCollab["invoices"]." (project,status,created,active,published) VALUES ('$num','0','$dateheure','$invoicing','1')";
			connectSql($tmpquery3);
		}

		$tmpquery2 = "INSERT INTO ".$tableCollab["teams"]."(project,member,published,authorized) VALUES('$num','$pown','1','0')";
		connectSql("$tmpquery2");

		//if CVS repository enabled
		if ($enable_cvs == "true") 
		{
			$user_query = "WHERE mem.id = '$pown'";
			$cvsUser = new request();
			$cvsUser->openMembers($user_query);
			cvs_add_repository($cvsUser->mem_login[0], $cvsUser->mem_password[0], $num);
		}

		//create project folder if filemanagement = true
		if ($fileManagement == "true") 
		{
			createDir("files/$num");
		}
	
		if ($htaccessAuth == "true") 
		{
$content = <<<STAMP
AuthName "$setTitle"
AuthType Basic
Require valid-user
AuthUserFile $fullPath/files/$num/.htpasswd
STAMP;
			
				$fp = @fopen("../files/$num/.htaccess",'wb+');
				$fw = fwrite($fp,$content);
				$fp = @fopen("../files/$num/.htpasswd",'wb+');

				$tmpquery = "WHERE mem.id = '$pown'";
				$detailMember = new request();
				$detailMember->openMembers($tmpquery);

				$Htpasswd = new Htpasswd;
				$Htpasswd->initialize("../files/".$num."/.htpasswd");
				$Htpasswd->addUser($detailMember->mem_login[0],$detailMember->mem_password[0]);
		}

		//if mantis bug tracker enabled
		if ($enableMantis == "true") 
		{
			// call mantis function to copy project
			include("../mantis/proj_add.php");
		}
		
		//create phase structure if enable phase was selected as true
		if($thisPhase != "0")
		{
			$comptThisPhase = count($phaseArraySets[$thisPhase]);
		
			for($i=0;$i<$comptThisPhase;$i++)
			{
				$tmpquery = "INSERT INTO ".$tableCollab["phases"]."(project_id,order_num,status,name) VALUES('$num','$i','0','".$phaseArraySets[$thisPhase][$i]."')";
				connectSql("$tmpquery");
			}
		}

		headerFunction("../projects/viewproject.php?id=$num&msg=add&".session_name()."=".session_id());
	}
}

$bodyCommand = "onLoad='document.epDForm.pn.focus();'";


include('../themes/'.THEME.'/header.php');

$blockPage = new block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../projects/listprojects.php?",$strings["projects"],in));

//case add project

if ($id == "") 
{
	$blockPage->itemBreadcrumbs($strings["add_project"]);
}

//case update or copy project
if ($id != "") 
{
	$blockPage->itemBreadcrumbs($blockPage->buildLink("../projects/viewproject.php?id=".$projectDetail->pro_id[0],$projectDetail->pro_name[0],in));
	
	if ($docopy == "true") 
	{
		$blockPage->itemBreadcrumbs($strings["copy_project"]);
	} 
	else 
	{
		$blockPage->itemBreadcrumbs($strings["edit_project"]);
	}
}
$blockPage->closeBreadcrumbs();

if ($msg != "") 
{
	include('../includes/messages.php');
	$blockPage->messagebox($msgLabel);
}

$block1 = new block();

//case add project
if ($id == "") 
{
	$block1->form = "epD";
	$block1->openForm("../projects/editproject.php?action=add&".session_name()."=".session_id()."#".$block1->form."Anchor");
}

//case update or copy project
if ($id != "") 
{
	$block1->form = "epD";
	$block1->openForm('../projects/editproject.php?id='.$id.'&action=update&docopy='.$docopy.'&'.session_name()."=".session_id()."#".$block1->form."Anchor");
	echo "<input type='hidden' value='".$projectDetail->pro_published[0]."' name='projectPublished'>";
}

if ($error != "") 
{            
	$block1->headingError($strings["errors"]);
	$block1->contentError($error);
}

//case add project
if ($id == "") 
{
	$block1->heading($strings["add_project"]);
}

//case update or copy project
if ($id != "") 
{
	if ($docopy == "true") 
	{
		$block1->heading($strings["copy_project"]." : ".$projectDetail->pro_name[0]);
	} 
	else 
	{
		$block1->heading($strings["edit_project"]." : ".$projectDetail->pro_name[0]);
	}
}

$block1->openContent();
$block1->contentTitle($strings["details"]);

echo "<tr class='odd'><td valign='top' class='leftvalue'>".$strings["name"]." :</td><td><input size='44' value='";

//case copy project
if ($docopy == "true") 
{
	echo $strings["copy_of"];
}

echo "$pn' style='width: 400px' name='pn' maxlength='100' type='text'></td></tr>

<tr class='odd'><td valign='top' class='leftvalue'>".$strings["priority"]." :</td><td><select name='pr'>";

$comptPri = count($priority);

for ($i=0;$i<$comptPri;$i++) 
{
	if ($projectDetail->pro_priority[0] == $i) 
	{
		echo "<option value='$i' selected>$priority[$i]</option>";
	} 
	else 
	{
		echo "<option value='$i'>$priority[$i]</option>";
	}
}

echo "</select></td></tr>
<tr class='odd'><td valign='top' class='leftvalue'>".$strings["description"]." :</td><td><textarea rows='10' style='width: 400px; height: 160px;' name='d' cols='47'>$d</textarea></td></tr>
<tr class='odd'><td valign='top' class='leftvalue'>".$strings["url_dev"]." :</td><td><input size='44' value='$url_dev' style='width: 400px' name='url_dev' maxlength='100' type='text'></td></tr>
<tr class='odd'><td valign='top' class='leftvalue'>".$strings["url_prod"]." :</td><td><input size='44' value='$url_prod' style='width: 400px' name='url_prod' maxlength='100' type='text'></td></tr>
<tr class='odd'><td valign='top' class='leftvalue'>".$strings["owner"]." :</td><td><select name='pown'>";

if ($demoMode == "true") 
{
	$tmpquery = "WHERE (mem.profil = '1' OR mem.profil = '0' OR mem.profil = '5') ORDER BY mem.name";
} 
else 
{
	$tmpquery = "WHERE (mem.profil = '1' OR mem.profil = '0' OR mem.profil = '5') AND mem.id != '2' ORDER BY mem.name";
}
$assignOwner = new request();

$assignOwner->openMembers($tmpquery);
$comptAssignOwner = count($assignOwner->mem_id);

for ($i=0;$i<$comptAssignOwner;$i++) 
{
	if ($projectDetail->pro_mem_id[0] == $assignOwner->mem_id[$i]) 
	{
		echo "<option value='".$assignOwner->mem_id[$i]."' selected>".$assignOwner->mem_login[$i]." / ".$assignOwner->mem_name[$i]."</option>";
	} 
	else 
	{
		echo "<option value='".$assignOwner->mem_id[$i]."'>".$assignOwner->mem_login[$i]." / ".$assignOwner->mem_name[$i]."</option>";
	}
}

echo "</select></td></tr>
<tr class='odd'><td valign='top' class='leftvalue'>".$strings["organization"]." :</td><td><select name='clod'>";

if ($clientsFilter == "true" && $profilSession == "1") 
{
	$tmpquery = "WHERE org.owner = '$idSession' AND org.id != '1' ORDER BY org.name";
} 
else 
{
	$tmpquery = "WHERE org.id != '1' ORDER BY org.name";
}

$listClients = new request();
$listClients->openOrganizations($tmpquery);
$comptListClients = count($listClients->org_id);

if ($projectDetail->pro_org_id[0] == "1") 
{
	echo "<option value='1' selected>".$strings["none"]."</option>";
} 
else 
{
	echo "<option value='1'>".$strings["none"]."</option>";
}


for ($i=0;$i<$comptListClients;$i++) 
{
	if ($projectDetail->pro_org_id[0] == $listClients->org_id[$i]) 
	{
		echo "<option value='".$listClients->org_id[$i]."' selected>".$listClients->org_name[$i]."</option>";
	}
	else 
	{
		echo "<option value='".$listClients->org_id[$i]."'>".$listClients->org_name[$i]."</option>";
	}
}

echo "</select></td></tr>
<tr class='odd'><td valign='top' class='leftvalue'>".$strings["enable_phases"]." :</td><td>

<select name='thisPhase'>";

$compSets = count($phaseArraySets["sets"]);

if($projectDetail->pro_phase_set[0] == "0") 
{
	echo "<option value='0' selected>".$strings["none"]."</option>";
}
else
{
	echo "<option value='0'>".$strings["none"]."</option>";
}

for($i=1;$i<=$compSets;$i++)
{
	if($projectDetail->pro_phase_set[0] == "$i") 
	{
		echo "<option value='$i' selected>".$phaseArraySets["sets"][$i]."</option>";
	}
	else
	{
		echo "<option value='$i'>".$phaseArraySets["sets"][$i]."</option>";
	}
}


echo"</select></td></tr><tr class='odd'><td valign='top' class='leftvalue'>".$strings["status"]." :</td><td><select name='st'>";

$comptSta = count($status);

for ($i=0;$i<$comptSta;$i++) 

{
	if ($projectDetail->pro_status[0] == $i)
	 {
		echo "<option value='$i' selected>$status[$i]</option>";
	} 
	else 
	{
		echo "<option value='$i'>$status[$i]</option>";
	}
}

echo "</select></td></tr>";
if ($fileManagement == "true") 
{
echo "<tr class='odd'><td valign='top' class='leftvalue'>".$strings["max_upload"]." :</td><td><input size='20' value='".$projectDetail->pro_upload_max[0]."' style='width: 150px' name='up' maxlength='100' type='TEXT'> $byteUnits[0]</td></tr>";
}

if ($enableInvoicing == "true")
{
	if ($projectDetail->pro_invoicing[0] == "1") 
	{
		$ckeckedInvoicing = "checked";
	}
	$block1->contentRow($strings["invoicing"],"<input size='32' value='1' name='invoicing' type='checkbox' $ckeckedInvoicing>");
$block1->contentRow($strings["hourly_rate"],"<input size='25' value='$hourly_rate' style='width: 200px' name='hourly_rate' maxlength='50' type='TEXT'>");
}

echo "<tr class='odd'><td valign='top' class='leftvalue'>&nbsp;</td><td><input type='SUBMIT' value='".$strings["save"]."'></td></tr>";

$block1->closeContent();
$block1->closeForm();

include('../themes/'.THEME.'/footer.php');
?>