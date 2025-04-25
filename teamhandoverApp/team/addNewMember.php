<?php

require_once '../class/TeamMembers.php';
require_once '../class/Validate.php';

$validate = new Validate();

$companyID = $validate -> validate($_POST["companyID"], "required");
$name = $validate -> validate($_POST["name"], "required");
$section = $validate -> validate($_POST["section"], "required");
$email = $validate -> validate($_POST["email"], "required");



$new_member = new TeamMembers();
$new_member -> createTeamMember($companyID, $name, $section, $email);

header("location: newTeamMemberform.php");
