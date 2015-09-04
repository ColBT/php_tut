<?php
#Application name: PhpCollab
#Status page: 1
#Path by root: ../projects/listprojects.php

$checkSession = "true";
include_once('../includes/library.php');

if ($typeInvoices == "") {
	$typeInvoices = "open";
}

if ($clientsFilter == "true" && $profilSession == "2") {
$teamMember = "false";
$tmpquery = "WHERE tea.member = '$idSession' AND org2.id = '$client'";
$memberTest = new request();
$memberTest->openTeams($tmpquery);
$comptMemberTest = count($memberTest->tea_id);
	if ($comptMemberTest == "0") {
		headerFunction("../clients/listclients.php?msg=blankClient&".session_name()."=".session_id());
	} else {
		$tmpquery = "WHERE org.id = '$client'";
	}
} else if ($clientsFilter == "true" && $profilSession == "1") {
	$tmpquery = "WHERE org.owner = '$idSession' AND org.id = '$client'";
} else {
	$tmpquery = "WHERE org.id = '$client'";
}

$clientDetail = new request();
$clientDetail->openOrganizations($tmpquery);
$comptClientDetail = count($clientDetail->org_id);

if ($comptClientDetail == "0") {
	headerFunction("../clients/listclients.php?msg=blankClient&".session_name()."=".session_id());
}

include('../themes/'.THEME.'/header.php');

$blockPage = new block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../clients/listclients.php?",$strings["clients"],in));
$blockPage->itemBreadcrumbs($blockPage->buildLink("../clients/viewclient.php?id=".$clientDetail->org_id[0],$clientDetail->org_name[0],in));
$blockPage->itemBreadcrumbs($strings["invoices"]);
if ($typeInvoices == "open") {
	$blockPage->itemBreadcrumbs($invoiceStatus[0]." | ".$blockPage->buildLink("../invoicing/listinvoices.php?client=$client&typeInvoices=sent",$invoiceStatus[1],in)." | ".$blockPage->buildLink("../invoicing/listinvoices.php?client=$client&typeInvoices=paid",$invoiceStatus[2],in));
} else if ($typeInvoices == "sent") {
	$blockPage->itemBreadcrumbs($blockPage->buildLink("../invoicing/listinvoices.php?client=$client&typeInvoices=open",$invoiceStatus[0],in)." | ".$invoiceStatus[1]." | ".$blockPage->buildLink("../invoicing/listinvoices.php?client=$client&typeInvoices=paid",$invoiceStatus[2],in));
} else if ($typeInvoices == "paid") {
	$blockPage->itemBreadcrumbs($blockPage->buildLink("../invoicing/listinvoices.php?client=$client&typeInvoices=open",$invoiceStatus[0],in)." | ".$blockPage->buildLink("../invoicing/listinvoices.php?client=$client&typeInvoices=sent",$invoiceStatus[1],in)." | ".$invoiceStatus[2]);
}
$blockPage->closeBreadcrumbs();

if ($msg != "") {
	include('../includes/messages.php');
	$blockPage->messagebox($msgLabel);
}

$blockPage->bornesNumber = "1";

$block1 = new block();

$block1->form = "saP";
$block1->openForm("../invoicing/listinvoices.php?client=$client&typeInvoices=$typeInvoices&".session_name()."=".session_id()."#".$block1->form."Anchor");

if ($typeInvoices == "open") {
	$status = "0";
} else if ($typeInvoices == "sent") {
	$status = "1";
} else if ($typeInvoices == "paid") {
	$status = "2";
}
$block1->heading($strings["invoices"]." : ".$invoiceStatus[$status]);

$block1->openPaletteIcon();
if ($profilSession == "0" || $profilSession == "1" || $profilSession == "5") {
	//$block1->paletteIcon(0,"add",$strings["add"]);
	$block1->paletteIcon(1,"remove",$strings["delete"]);
}
$block1->paletteIcon(2,"info",$strings["view"]);
if ($profilSession == "0" || $profilSession == "1" || $profilSession == "5") {
	$block1->paletteIcon(3,"edit",$strings["edit"]);
}
$block1->closePaletteIcon();

$block1->borne = $blockPage->returnBorne("1");
$block1->rowsLimit = "20";

$block1->sorting("invoices",$sortingUser->sor_invoices[0],"inv.id ASC",$sortingFields = array(0=>"inv.id",1=>"pro.name",2=>"inv.total_inc_tax",3=>"inv.date_sent",4=>"inv.published"));

$tmpquery = "WHERE pro.owner = '$idSession' ORDER BY pro.id";
$projectsTest = new request();
$projectsTest->openProjects($tmpquery);
$comptProjectsTest = count($projectsTest->pro_id);

	if ($comptProjectsTest == "0") {
		$listProjects = "false";
	} else {
		for ($i=0;$i<$comptProjectsTest;$i++) {
			$projectsOk .= $projectsTest->pro_id[$i];
			if ($comptProjectsTest-1 != $i) {
				$projectsOk .= ",";
			}
		}
		if ($projectsOk == "") {
			$listProjects = "false";
		} else {
			$tmpquery = "WHERE inv.project IN($projectsOk) AND inv.active = '1' AND inv.status = '$status' ORDER BY $block1->sortingValue";
		}
	}

$block1->recordsTotal = compt($initrequest["invoices"]." ".$tmpquery);

$listInvoices = new request();
$listInvoices->openInvoices($tmpquery,$block1->borne,$block1->rowsLimit);
$comptListInvoices = count($listInvoices->inv_id);

if ($comptListInvoices != "0") {
	$block1->openResults();
	$block1->labels($labels = array(0=>$strings["id"],1=>$strings["project"],2=>$strings["total_inc_tax"],3=>$strings["date_invoice"],4=>$strings["published"]),"true");

for ($i=0;$i<$comptListInvoices;$i++) {
$idPublish = $listInvoices->inv_published[$i];
$block1->openRow();
$block1->checkboxRow($listInvoices->inv_id[$i]);
$block1->cellRow($blockPage->buildLink("../invoicing/viewinvoice.php?id=".$listInvoices->inv_id[$i],$listInvoices->inv_id[$i],in));
$block1->cellRow($blockPage->buildLink("../projects/viewproject.php?id=".$listInvoices->inv_project[$i],$listInvoices->inv_pro_name[$i],in));
$block1->cellRow($listInvoices->inv_total_inc_tax[$i]);
$block1->cellRow($listInvoices->inv_date_sent[$i]);
if ($sitePublish == "true") {
	$block1->cellRow($statusPublish[$idPublish]);
}
$block1->closeRow();
}
$block1->closeResults();

$block1->bornesFooter("1",$blockPage->bornesNumber,"","typeProjects=$typeProjects");

} else {
$block1->noresults();

}
$block1->closeFormResults();

$block1->openPaletteScript();
if ($profilSession == "0" || $profilSession == "1" || $profilSession == "5") {
	//$block1->paletteScript(0,"add","../projects/editproject.php?","true,false,false",$strings["add"]);
	$block1->paletteScript(1,"remove","../invoicing/deleteinvoices.php?","false,true,false",$strings["delete"]);
}
$block1->paletteScript(2,"info","../invoicing/viewinvoice.php?","false,true,false",$strings["view"]);
if ($profilSession == "0" || $profilSession == "1" || $profilSession == "5") {
	$block1->paletteScript(3,"edit","../invoicing/editinvoice.php?","false,true,false",$strings["edit"]);
}

$block1->closePaletteScript($comptListInvoices,$listInvoices->inv_id);

include('../themes/'.THEME.'/footer.php');
?>
