<?php

require_once dirname(dirname(__FILE__)).'/database/database.php';

class Handover extends db_connect
{
        

    public function getAllNotes()
    {
        $stmt = "SELECT * FROM tblHandoverNotes";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getNote($id)
    {
        $stmt = "SELECT * FROM tblHandoverNotes WHERE ID=$id";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function createNote($title, $note, $createDate, $status, $actions, $actionOwner, $attachments)
    {
        $stmt = $this -> conn -> prepare("INSERT INTO tblHandoverNotes (ID, title, note, createdate, status, actions, actionowner, attachments) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");

        $stmt -> bind_param("sssssss", $title, $note, $createDate, $status, $actions, $actionOwner, $attachments);

        $stmt -> execute();

    }

    public function updateNote($id, $title, $note, $createDate, $status, $actions, $actionOwner, $attachments)
    {
        $stmt = $this -> conn -> prepare("UPDATE tblHandoverNotes SET title=?, note=?, createdate=?, status=?, actions=?, actionowner=?, attachments=? WHERE ID=$id");

        $stmt -> bind_param("sssssss", $title, $note, $createDate, $status, $actions, $actionOwner, $attachments);

        $stmt -> execute();

    }

    public function deleteNote($id)
    {
        $stmt = "DELETE FROM tblHandoverNotes WHERE ID=$id";

        mysqli_query($this->conn, $stmt);
    }

    public function getReportNotes($start_date, $end_date)
    {
        $stmt = "SELECT * FROM tblHandoverNotes WHERE createDate BETWEEN '$start_date' AND '$end_date'";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}