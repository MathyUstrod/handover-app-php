<?php

require_once '../class/Actions.php';
require_once '../class/FileHandler.php';

$actionID = $_GET["id"];
$attachment_name = $_GET["attachment_name"];

$delete_action = new Actions();
$delete_action -> deleteAction($actionID);

$delete_attachments = new FileHandler();
$delete_attachments -> delete($attachment_name);

header("location: ../action_items.php");