<?php

require_once '../class/Validate.php';

require_once '../class/Actions.php';
require_once '../class/FileHandler.php';

$validate = new Validate();

$id = $_POST["id"];
$title = $validate ->validate ($_POST["title"], "required");
$NoteID = $validate -> validate($_POST["assocNoteID"],"required");
$assocNoteID = trim(explode(" - ", $NoteID)[0]);
$description = $validate -> validate($_POST["description"], "required");
$actionOwner = $validate -> validate($_POST["actionOwner"], "required");
$dueDate = $validate -> validate($_POST["dueDate"], "required");
$status = $validate -> validate($_POST["status"], "required");
$oldattachment = $_POST["oldattachment"];

//attachments
$attachment_name = $_FILES["attachments"]["name"];
$attachment_tmp = $_FILES["attachments"]["tmp_name"]; 

if($attachment_name){
    $attachment = new FileHandler();
    $attachment -> upload($attachment_name, $attachment_tmp);
}else{
    $attachment_name = $oldattachment;
}

//save action
$new_action = new Actions();

$new_action -> updateAction($id, $title, $assocNoteID, $description, $actionOwner, $dueDate, $status, $attachment_name);

header("location: ../action_items.php");

