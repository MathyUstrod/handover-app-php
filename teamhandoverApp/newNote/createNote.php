<?php
require_once '../class/Handover.php';
require_once '../class/FileHandler.php';
require_once '../class/Validate.php';

//$newNote = $_POST;
//$attachment = $_FILES;

//var_dump($newNote);
//var_dump($attachment);

$validate = new Validate();

$title = $validate -> validate($_POST["title"], "required");
$description = $validate -> validate($_POST["description"], "required");
$createDate = $validate -> validate($_POST["createDate"], "required");
$status = $validate -> validate($_POST["status"], "required");
$actions = $validate -> validate($_POST["actions"], "");
$actionOwner = $validate -> validate($_POST["actionOwner"], "");

//attachment
$attachment_name = $_FILES['attachments']['name'];
$attachment_tmp = $_FILES['attachments']['tmp_name'];
//$attachment_size = $_FILES['attachments']['size'];


$attachment = new FileHandler();
$attachment -> upload($attachment_name, $attachment_tmp);

$newNote = new Handover();
$newNote -> createNote($title, $description, $createDate, $status, $actions, $actionOwner,$attachment_name);

header("location: newHandoverNote.php");