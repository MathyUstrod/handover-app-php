<?php

require_once '../class/Sections.php';

$id = $_GET["id"];

$delete_section = new Sections();

$delete_section -> deleteSection($id);

header("location: ../teams_sections.php");
