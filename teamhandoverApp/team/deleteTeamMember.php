<?php

require_once '../class/TeamMembers.php';

$id = $_GET["id"];

$delete_member = new TeamMembers();

$delete_member -> deleteTeamMember($id);

header("location: {$_SERVER['HTTP_REFERER']}");
