<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../logos_clients/index.php

$checkSession = "false";
include_once('../includes/library.php');
headerFunction('../index.php?'.session_name().'='.session_id());
exit;
?>