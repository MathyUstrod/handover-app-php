<?php

require_once '../class/Sections.php';
require_once '../class/Validate.php';

$validate = new Validate();

$section = $validate -> validate($_POST["section"], "required");

$new_section = new Sections();

$new_section -> createSection($section);

header("location: ../teams_sections.php");