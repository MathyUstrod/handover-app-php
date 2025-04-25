<?php

require_once '../class/TeamMembers.php';
require_once '../class/Validate.php';

$validate = new Validate();

$id = $validate -> validate($_POST["id"], "");
$companyID = $validate -> validate($_POST["companyID"], "required");
$name = $validate -> validate($_POST["name"], "required");
$section = $validate -> validate($_POST["section"], "required");
$email = $validate -> validate($_POST["email"], "required");

$edit_member = new TeamMembers();
$edit_member -> updateTeamMember($id, $companyID, $name, $section, $email);

// header("location: {$_SERVER['HTTP_REFERER']}");

header("location: ../teams_sections.php");
