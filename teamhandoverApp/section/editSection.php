<?php

require_once '../class/Sections.php';
require_once '../class/Validate.php';

$validate = new Validate();

$section = $validate -> validate($_POST["section"], "required");
$id = $_POST["id"];

$edit_section = new Sections();

$edit_section -> updateSection($id, $section);

header("location: ../teams_sections.php");
