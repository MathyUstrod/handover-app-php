<?php
require_once '../class/Handover.php';
require_once '../class/FileHandler.php';
require_once '../class/Validate.php';

$newNote = $_POST;
$attachment = $_FILES;
$validate = new Validate();

// var_dump($newNote);
// var_dump($attachment);

$id = $_POST["id"];
$title = $validate -> validate($_POST["title"], "required");
$description = $validate -> validate($_POST["description"], "required");
$createDate = $validate -> validate($_POST["createDate"], "required");
$status = $validate -> validate($_POST["status"], "required");
$actions = $validate -> validate($_POST["actions"], "");
$actionOwner = $validate ->  validate($_POST["actionOwner"], "");
$oldattachment = $_POST["oldattachment"];

//attachment

$attachment_name = $_FILES['attachments']['name'];
$attachment_tmp = $_FILES['attachments']['tmp_name'];
//$attachment_size = $_FILES['attachments']['size'];

if($attachment_name){
    $attachment = new FileHandler();
    $attachment -> upload($attachment_name, $attachment_tmp);
}else{
    $attachment_name = $oldattachment;
}


$updateNote = new Handover();
$updateNote -> updateNote($id, $title, $description, $createDate, $status, $actions, $actionOwner,$attachment_name);

header("location: ../handoverNotes.php");