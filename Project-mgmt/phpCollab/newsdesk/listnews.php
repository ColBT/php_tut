<?php
#Application name: PhpCollab
#Status page: 1
#Path by root: ../newsdesk/listnews.php

$checkSession = "true"; 
include_once('../includes/library.php');

$setTitle .= " : News List";

include('../themes/'.THEME.'/header.php');

$blockPage = new block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../newsdesk/listnews.php?",$strings["newsdesk"],in));
$blockPage->itemBreadcrumbs($strings["newsdesk_list"]);
$blockPage->closeBreadcrumbs();

if ($msg != "") {
	include('../includes/messages.php');
	$blockPage->messagebox($msgLabel);
}

$blockPage->bornesNumber = "1";

$block1 = new block();

$block1->form = "newsdeskList";
$block1->openForm("../newsdesk/listnews.php?".session_name()."=".session_id()."#".$block1->form."Anchor");

if ($error != "") {            
	$block1->headingError($strings["errors"]);
	$block1->contentError($error);
}

$block1->heading($strings["newsdesk"]);

$block1->openPaletteIcon();

if ($profilSession == "0" || $profilSession == "1"  || $profilSession == "5") {
	$block1->paletteIcon(0,"add",$strings["add_newsdesk"]);
	$block1->paletteIcon(1,"remove",$strings["del_newsdesk"]);
	$block1->paletteIcon(2,"edit",$strings["edit_newsdesk"]);
}
	$block1->paletteIcon(3,"info",$strings["view_newsdesk"]);

$block1->closePaletteIcon(); 

$block1->borne = $blockPage->returnBorne("1");
$block1->rowsLimit = "40";

$block1->sorting("newsdesk",$sortingUser->sor_newsdesk[0],"news.pdate DESC",$sortingFields = array(0=>"news.title",1=>"news.pdate"));

$block1->openContent();

$tmpquery = "WHERE news.id != '0' ORDER BY $block1->sortingValue ";
$block1->recordsTotal = compt($initrequest["newsdeskposts"]." ".$tmpquery);

$listPosts = new request();
$listPosts->openNewsDesk($tmpquery,$block1->borne,$block1->rowsLimit);
$comptPosts = count($listPosts->news_id);

if ($comptPosts != "0") {
	$block1->openResults();
	$block1->labels($labels = array(0=>$strings["topic"],1=>$strings["date"],2=>$strings["author"],3=>$strings["newsdesk_related"]),"true");
	
	for ($i=0;$i<$comptPosts;$i++) {
		// take the news author
		$tmpquery_user = "WHERE mem.id = '".$listPosts->news_author[$i]."' ";
		$newsAuthor = new request();
		$newsAuthor->openMembers($tmpquery_user);

		// take the name of the related article
		if ($listPosts->news_related[$i]!='g') {
			$tmpquery = "WHERE pro.id = '".$listPosts->news_related[$i]."'";
			$projectDetail = new request();
			$projectDetail->openProjects($tmpquery);
			$article_related = "<a href='../projects/viewproject.php?id=".$projectDetail->pro_id[0]."' title='".$projectDetail->pro_name[0]."'>".$projectDetail->pro_name[0]."</a>";
		} else {
			$article_related = $strings["newsdesk_related_generic"];
		}


		$block1->openRow();
		$block1->checkboxRow($listPosts->news_id[$i]);
		$block1->cellRow($blockPage->buildLink("../newsdesk/viewnews.php?id=".$listPosts->news_id[$i],$listPosts->news_title[$i],in));
		$block1->cellRow($listPosts->news_date[$i]);
		$block1->cellRow($newsAuthor->mem_name[0]);
		$block1->cellRow($article_related);
		$block1->closeRow();
		}
	
	$block1->closeResults();
	
	$block1->bornesFooter("1",$blockPage->bornesNumber,"","");
} else {
	$block1->noresults();
}

$block1->closeFormResults();

$block1->openPaletteScript();
if ($profilSession == "0" || $profilSession == "1"  || $profilSession == "5") {
	$block1->paletteScript(0,"add","../newsdesk/editnews.php?","true,false,false",$strings["add_newsdesk"]);
	$block1->paletteScript(1,"remove","../newsdesk/editnews.php?action=remove&","false,true,true",$strings["del_newsdesk"]);
	$block1->paletteScript(2,"edit","../newsdesk/editnews.php?","false,true,false",$strings["edit_newsdesk"]);
}	
	$block1->paletteScript(3,"info","../newsdesk/viewnews.php?","false,true,false",$strings["view_newsdesk"]);

$block1->closePaletteScript($comptPosts,$listPosts->news_id);
include('../themes/'.THEME.'/footer.php');


?>