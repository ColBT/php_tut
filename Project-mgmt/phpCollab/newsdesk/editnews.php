<?php
/*
** Application name: phpCollab
** Last Edit page: 23/03/2004
** Path by root: ../newsdesk/editnews.php
** Authors: Fullo
**
** =============================================================================
**
**               phpCollab - Project Managment 
**
** -----------------------------------------------------------------------------
** Please refer to license, copyright, and credits in README.TXT
**
** -----------------------------------------------------------------------------
** FILE: editnews.php
**
** DESC: 
**
** HISTORY:
** 	23/03/2004	-	added new document info
**  23/03/2004  -	fixed multi delete 
**	23/03/2004	-	xhtml code
**  23/08/2004  -   fix error "Using $this when not in object context"
**  17/04/2005	-	fix the duplication of the projects name in the prj related select box
**  13/07/2008  -   fix for bug 1802203
** -----------------------------------------------------------------------------
** TO-DO:
** 
**
** =============================================================================
*/


$checkSession = "true";
include_once('../includes/library.php');

if ($profilSession != "0" && $profilSession != "1" && $profilSession != "5" ) {
	headerFunction("../newsdesk/viewnews.php?id=$postid&msg=permissionNews&".session_name()."=".session_id());
	exit;
}	

//case edit news
if ($id != "") 
{

	//test exists selected client organization, redirect to list if not
	$tmpquery = "WHERE news.id = '$id'";
	$newsDetail = new request();
	$newsDetail->openNewsDesk($tmpquery);
	$comptnewsDetail = count($newsDetail->news_id);

	//only author and admin can change an article
	if ($profilSession != "0" && $idSession != $newsDetail->news_author[0] ) 
	{
		headerFunction("../newsdesk/viewnews.php?id=$postid&msg=permissionNews&".session_name()."=".session_id());
		exit;
	}

	if ($comptnewsDetail == "0") 
	{
		headerFunction("../newsdesk/listnews.php?msg=blankNews&".session_name()."=".session_id());
		exit;
	}

	if ($action == "update") 
	{
		$title = convertData($title);
		if (get_magic_quotes_gpc() != 1) {$content = addslashes($content);}
		$tmpquery = "UPDATE ".$tableCollab["newsdeskposts"]." SET title = '$title', author = '$author', related = '$related', content = '$content', links = '$links', rss = '$rss' WHERE id = '$id'";
		connectSql("$tmpquery");
		headerFunction("../newsdesk/viewnews.php?id=$id&msg=update&".session_name()."=".session_id());
	}
	elseif ($action == "delete") 
	{
		$id = str_replace("**",",",$id);
		$tmpquery = "DELETE FROM ".$tableCollab["newsdeskposts"]." WHERE id = $id";
		connectSql("$tmpquery");
		$tmpquery = "DELETE FROM ".$tableCollab["newsdeskcomments"]." WHERE post_id = $id";
		connectSql("$tmpquery");
		headerFunction("../newsdesk/listnews.php?msg=removeNews&".session_name()."=".session_id());
	}	
	else 
	{
		//set value in form
		$title = $newsDetail->news_title[0];
		$content = $newsDetail->news_content[0];
		$author = $newsDetail->news_author[0];
		$links = $newsDetail->news_links[0];
		$rss  = $newsDetail->news_rss[0];
	}

}
else 
{ // case of adding news
	
	if ($action == "add") 
	{

		//test if name blank
		if ($title == "") 
		{
			$error = $strings["blank_newsdesk_title"];
		} 
		else 
		{

			//replace quotes by html code in name and address
			$title = convertData($title);
			if (get_magic_quotes_gpc() != 1) {$content = addslashes($content);}
			$author = convertData($author);

			//insert into organizations and redirect to new client organization detail (last id)

			$tmpquery1 = "INSERT INTO ".$tableCollab["newsdeskposts"]."(title,author,related,content,links,rss,pdate) VALUES ('$title', '$author', '$related', '".addslashes($content)."', '$links', '$rss', NOW())";
			connectSql("$tmpquery1");
			$tmpquery = $tableCollab["newsdeskposts"];
			last_id($tmpquery);
			$num = $lastId[0];
			unset($lastId);
	
			headerFunction("../newsdesk/viewnews.php?id=$num&msg=add&".session_name()."=".session_id());
			

		}
	}
}

// htmlArea 3.0 initialization
$headBonus = "	
			<script type='text/javascript'> 
			  _editor_url = '../includes/htmlarea/'; 
			</script> 

			<script type='text/javascript' src='../includes/htmlarea/htmlarea.js'></script>
			<script type='text/javascript' src='../includes/htmlarea/lang/$lang.js'></script>
			<script type='text/javascript' src='../includes/htmlarea/dialog.js'></script>
			<script type='text/javascript' src='../includes/htmlarea/popupdiv.js'></script>
			<script type='text/javascript' src='../includes/htmlarea/popupwin.js'></script> 
			
			<style type='text/css'>@import url(../includes/htmlarea/htmlarea.css)</style>


			 
			 
			<script type='text/javascript'>

				HTMLArea.loadPlugin('TableOperations'); 
				
				var editor = null;
				
				function initEditor() {
				  editor = new HTMLArea('content');
  			      editor.registerPlugin('TableOperations');
				  editor.generate();
				}

			</script>
			";

$bodyCommand = "onload='initEditor();'";
// end

//** Titel stuff here.. **
if ($id != '' && empty($action)) {
    $setTitle .= " : Edit News Item (" . $newsDetail->news_title[0] . ")";
} else if ($id != '' && $action == "remove") {
    if (strpos($id, "**") !== false)
        $setTitle .= " : Remove News Items";
    else
        $setTitle .= " : Remove News Item"; 
} else {
    $setTitle .= " : Add News Item";
}
include('../themes/'.THEME.'/header.php');

$blockPage = new block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../newsdesk/listnews.php?",$strings["newsdesk"],in));

if ($id == "") 
{
	$blockPage->itemBreadcrumbs($strings["add_newsdesk"]);
} 
else 
{
	$blockPage->itemBreadcrumbs($blockPage->buildLink("../newsdesk/viewnews.php?id=".$newsDetail->news_id[0],$newsDetail->news_title[0],in));
	$blockPage->itemBreadcrumbs($strings["edit_newsdesk"]);
}

$blockPage->closeBreadcrumbs();

if ($msg != "") 
{
	include('../includes/messages.php');
	$blockPage->messagebox($msgLabel);
}

$block1 = new block();

if ($error != "") 
{            
	$block1->headingError($strings["errors"]);
	$block1->contentError($error);
}

if ($action!='remove') 
{
	if ($id == "") 
	{		
		echo "	<a name='".$block1->form."Anchor'></a>\n <form accept-charset='UNKNOWN' method='POST' action='../newsdesk/editnews.php?action=add&".session_name()."=".session_id()."' name='ecDForm'>\n";
		$block1->heading($strings["add_newsdesk"]);
	} 
	else 
	{		
		echo "	<a name='".$block1->form."Anchor'></a>\n <form accept-charset='UNKNOWN' method='POST' action='../newsdesk/editnews.php?id=$id&action=update&".session_name()."=".session_id()."' name='ecDForm'>\n";
		$block1->heading($strings["edit_newsdesk"]." : ".$newsDetail->news_title[0]);
	}


	$block1->openContent();
	$block1->contentTitle($strings["details"]);

	// add
	if ($id == "") 
	{ 
		$block1->contentRow($strings["author"],"<input type='hidden' name='author' value='$idSession'><b>$nameSession</b>");
	} 
	// edit
	else 
	{ 
		$tmpquery_user = "WHERE mem.id = '".$newsDetail->news_author[0]."' ";
		$newsAuthor = new request();
		$newsAuthor->openMembers($tmpquery_user);
		$block1->contentRow($strings["author"],"<input type='hidden' name='author' value='".$newsDetail->news_author[0]."'><b>".$newsAuthor->mem_name[0]."</b>");	
	}

	$block1->contentRow($strings["title"],"<input type='text' name='title' value='$title' style='width: 300px;'>");

	// 04/11/2003 related news by fullo
	// admin can post news on all projects
	if ($profilSession == "0") 
	{	
		if ($databaseType == "postgresql") {
			$tmpquery = " GROUP BY pro.id, pro.name, tea.id";
		} else {
			$tmpquery = "  GROUP BY pro.id ";
		}
	} 
	// only team members can add news on a project
	else 
	{	
		if ($databaseType == "postgresql") {
			$tmpquery = "AND tea.member = '$idSession' OR pro.id = '0' GROUP BY pro.id, pro.name, tea.id";
		} else {
			$tmpquery = "AND tea.member = '$idSession' OR pro.id = '0'  GROUP BY pro.id";
		}					
		
	}
	$listProjects = new request();
	$listProjects->openNewsDeskRelated($tmpquery);
	$comptListProjects = count($listProjects->tea_id);

	$option = '<option value="g">'.$strings['newsdesk_related_generic'].'</option>\n';	
	
	if ($comptListProjects > 0) 
	{
		for ($i=0;$i<$comptListProjects;$i++) 
		{
			if ($newsDetail->news_related[0] == $listProjects->tea_pro_id[$i]) 
			{
				$selected = 'selected';
			} 
			else 
			{ 
				$selected = ''; 
			}
			$option .= '<option value="'.$listProjects->tea_pro_id[$i].'" '.$selected.' >'.$listProjects->tea_pro_name[$i].'</option>\n';	
		
		}
	}
	
	$block1->contentRow($strings["newsdesk_related"],"<select name='related' style='width: 300px;'>$option</select>");
// end

	$block1->contentRow($strings["comments"],"<textarea rows='30' name='content' id='content' style='width: 400px;'>$content</textarea>");
	
// 14/06/2003 related links & rss enabled by fullo
	$block1->contentRow($strings["newsdesk_related_links"].$block1->printHelp("newsdesk_links"),"<input type='text' name='links' value='$links' style='width: 300px;'>");

	

	if ($id != "")
	{
		if ($rss == '1') 
		{
			$ckeckedrss = 'checked';
		}
		else 
		{
			$ckeckedrss = '';
		}
	}
	else 
	{
		$ckeckedrss = 'checked';
	}

	$block1->contentRow($strings["newsdesk_rss"],"<input size='32' value='1' name='rss' type='checkbox' $ckeckedrss>");
	
// end
	
	$block1->contentRow($strings[""],"<input type='submit' name='submit' value='".$strings["save"]."'> <input type='button' name='cancel' value='".$strings["cancel"]."' onClick='history.back();'>");

	$block1->closeContent();
	$block1->closeForm();

} 
else 
{ 
	//remove

	$block1->form = "saP";
	$block1->openForm("../newsdesk/editnews.php?action=delete&id=$id&".session_name()."=".session_id());

	$block1->heading($strings["del_newsdesk"]);

	$block1->openContent();
	$block1->contentTitle($strings["delete_following"]);

	$id = str_replace("**",",",$id);
	$tmpquery = "WHERE news.id IN($id) ORDER BY news.pdate";
	$listNews = new request();
	$listNews->openNewsDesk($tmpquery);
	$comptListNews = count($listNews->news_id);

	for ($i=0;$i<$comptListNews;$i++) 
	{
		$block1->contentRow("#".$listNews->news_id[$i],$listNews->news_title[$i]);
	}

	$block1->contentRow("","<input type='submit' name='delete' value='".$strings["delete"]."'> <input type='button' name='cancel' value='".$strings["cancel"]."' onClick='history.back();'>");

	$block1->closeContent();
	$block1->closeForm();

	$block1->note($strings["delete_news_note"]);

}


include('../themes/'.THEME.'/footer.php');

?>