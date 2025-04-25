<?php

require_once dirname(dirname(__FILE__)).'/database/database.php';

class Actions extends db_connect
{
    public function getAllActions()
    {
        $stmt = "SELECT * FROM tblactions";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAction($id)
    {
        $stmt = "SELECT * FROM tblactions WHERE ID=$id";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function createAction($title, $assocNoteID, $description, $actionOwner, $dueDate, $status, $attachments)
    {
        $stmt = $this -> conn -> prepare("INSERT INTO tblactions (ID, title, assocNoteID, description, actionOwner, dueDate, status, attachments) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");

        $stmt -> bind_param("sssssss", $title, $assocNoteID, $description, $actionOwner, $dueDate, $status, $attachments);

        $stmt -> execute();

    }

    public function updateAction($id, $title, $assocNoteID, $description, $actionOwner, $dueDate, $status, $attachments)
    {
        $stmt = $this -> conn -> prepare("UPDATE tblactions SET title=?, assocNoteID=?, description=?, actionOwner=?, dueDate=?, status=?, attachments=? WHERE ID=$id");

        $stmt -> bind_param("sssssss", $title, $assocNoteID, $description, $actionOwner, $dueDate, $status, $attachments);

        $stmt -> execute();

    }

    public function deleteAction($id)
    {
        $stmt = "DELETE FROM tblactions WHERE ID=$id";

        mysqli_query($this->conn, $stmt);
    }
}