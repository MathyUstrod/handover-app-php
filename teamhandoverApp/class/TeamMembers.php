<?php

require_once dirname(dirname(__FILE__)).'../database/database.php';

class TeamMembers extends db_connect
{
    public function getAllTeamMembers()
    {
        $stmt = "SELECT tblteammembers.name FROM tblteammembers";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllTeamMembersDetails()
    {
        $stmt = "SELECT * FROM tblteammembers";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getTeamMemberDetails($id)
    {
        $stmt = "SELECT * FROM tblteammembers WHERE ID=$id";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function createTeamMember($companyID, $name, $section, $email)
    {
        $stmt = $this -> conn -> prepare("INSERT INTO tblteammembers (ID, companyID, name, section, email) VALUES (NULL, ?, ?, ?, ?)");

        $stmt -> bind_param("ssss", $companyID, $name, $section, $email);

        $stmt -> execute();

    }

    public function updateTeamMember($id, $companyID, $name, $section, $email)
    {
        $stmt = $this -> conn -> prepare("UPDATE tblteammembers SET companyID=?, name=?, section=?, email=? WHERE ID=$id");

        $stmt -> bind_param("ssss", $companyID, $name, $section, $email);

        $stmt -> execute();

    }

    public function deleteTeamMember($id)
    {
        $stmt = "DELETE FROM tblteammembers WHERE ID=$id";

        mysqli_query($this->conn, $stmt);
    }
}