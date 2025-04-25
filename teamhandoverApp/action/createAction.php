<?php

require_once '../class/Validate.php';

require_once '../class/Actions.php';
require_once '../class/FileHandler.php';

$validate = new Validate();

$title = $validate ->validate ($_POST["title"], "required");
$NoteID = $validate -> validate($_POST["assocNoteID"],"required");
$assocNoteID = trim(explode(" - ", $NoteID)[0]);
$description = $validate -> validate($_POST["description"], "required");
$actionOwner = $validate -> validate($_POST["actionOwner"], "required");
$dueDate = $validate -> validate($_POST["dueDate"], "required");
$status = $validate -> validate($_POST["status"], "required");
$attachment_name = $_FILES["attachments"]["name"];
$attachment_tmp = $_FILES["attachments"]["tmp_name"];

//save action
$new_action = new Actions();

$new_action -> createAction($title, $assocNoteID, $description, $actionOwner, $dueDate, $status, $attachment_name);

//save attachment
$file = new FileHandler();
$file -> upload($attachment_name, $attachment_tmp);

header("location: ../action_items.php");

