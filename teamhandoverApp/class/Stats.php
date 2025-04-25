<?php

require_once dirname(dirname(__FILE__)).'/database/database.php';

class Stats extends db_connect
{
    //Create methods to retrieve stats from the database

    //Pending Actions
    public function getPendingActions_count()
    {
        $stmt = "SELECT COUNT(ID) AS 'count' FROM tblactions WHERE status='Pending'";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Complete Actions
    public function getCompleteActions_count()
    {
        $stmt = "SELECT COUNT(ID) AS 'count' FROM tblactions WHERE status='Complete'";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Due Actions
    public function getDueActions_count()
    {
        $stmt = "SELECT COUNT(ID) AS 'count' FROM tblactions WHERE status='Pending' OR status='Ongoing' AND dueDate = CURRENT_DATE()";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Upcoming Actions
    public function getUpcomingActions_count()
    {
        $stmt = "SELECT COUNT(ID) AS 'count' FROM tblactions WHERE status='Pending' OR status='Ongoing' AND dueDate > CURRENT_DATE()";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Cancelled Actions
    public function getCancelledActions_count()
    {
        $stmt = "SELECT COUNT(ID) AS 'count' FROM tblactions WHERE status='Cancelled'";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Complete Actions
    public function getAllHandover_count()
    {
        $stmt = "SELECT COUNT(ID) AS 'count' FROM tblhandovernotes";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Lists
    public function getAllPendingActions()
    {
        $stmt = "SELECT * FROM tblactions WHERE status='Pending'";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllCompleteActions()
    {
        $stmt = "SELECT * FROM tblactions WHERE status='Complete'";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllDueActions()
    {
        $stmt = "SELECT * FROM tblactions WHERE status='Pending' OR status='Ongoing' AND dueDate = CURRENT_DATE()";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllUpcomingActions()
    {
        $stmt = "SELECT * FROM tblactions WHERE status='Pending' OR status='Ongoing' AND dueDate > CURRENT_DATE()";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllCancelledActions()
    {
        $stmt = "SELECT * FROM tblactions WHERE status='Cancelled'";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getChartData()
    {
        $stmt = "SELECT COUNT(status) AS 'count', status FROM tblactions GROUP BY status";
        $result = mysqli_query($this->conn, $stmt);
        $chart_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $json = json_encode($chart_data);
        file_put_contents("chart_data.json", $json);
    }

    public function getActions_Report()
    {
        $stmt = "SELECT * FROM tblactions WHERE NOT status='Cancelled' OR NOT status='Completed'";
        $result = mysqli_query($this->conn, $stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}