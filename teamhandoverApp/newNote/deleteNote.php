<?php

require_once '../class/Handover.php';
require_once '../class/FileHandler.php';

$id = $_GET["id"];
$attachment_name = $_GET["attachment_name"];

//delete note for handover notes table
if(isset($id)){
    $note_to_delete = new Handover();

    $note_to_delete -> deleteNote($id);
}


//delete attachment from uploads folder
if(isset($attachment_name)){
    $delete_attach = new FileHandler();

    $delete_attach -> delete($attachment_name); 
}

header("location: ../handoverNotes.php");