<?php
$mail = new notification();

$mail->getUserinfo($idSession,"from");

$tmpquery = "WHERE sp.id = '$num'";
$postDetail = new request();
$postDetail->openSupportPosts($tmpquery);

$tmpquery = "WHERE sr.id = '".$postDetail->sp_request_id[0]."'";
$requestDetail = new request();
$requestDetail->openSupportRequests($tmpquery);

$tmpquery = "WHERE mem.id = '".$requestDetail->sr_user[0]."'";
$userDetail = new request();
$userDetail->openMembers($tmpquery);

		$mail->partSubject = $strings["support"]." ".$strings["support_id"];
		$mail->partMessage = $strings["noti_support_post2"];
		$subject = $mail->partSubject.": ".$requestDetail->sr_id[0];
		$body = $mail->partMessage."";
	
		$body .= "\n\n".$strings["id"]." : ".$requestDetail->sr_id[0]."\n".$strings["subject"]." : ".$requestDetail->sr_subject[0]."\n".$strings["status"]." : ".$requestStatus[$requestDetail->sr_status[0]]."\n".$strings["details"]." : ";
		if ($listTeam->tea_mem_profil[$i] == 3){
			$body .= "$root/general/login.php?url=projects_site/home.php%3Fproject=".$requestDetail->sr_project[0]."\n\n";
		} else {
			$body .= "$root/general/login.php?url=support/viewrequest.php%3Fid=$num \n\n";
		}
		$body .= $strings["message"]." : ".$postDetail->sp_message[0]."";

		if ($userDetail->mem_email_work[0] != "") {
			$mail->Subject = $subject;
			$mail->Priority = "3";
			$mail->Body = $body;
			$mail->AddAddress($userDetail->mem_email_work[0], $userDetail->mem_name[0]);
			$mail->Send();
			$mail->ClearAddresses();
		}
?>