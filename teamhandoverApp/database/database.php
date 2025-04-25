<?php



class db_connect extends mysqli
{
    protected $conn;
    private $password = "";
    private $username = "root";
    private $servername = "localhost";
    private $dbname = "handoverApp";

    public function __construct()
    {
        
        try
        {
            $this -> conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        } catch(mysqli_sql_exception $e)
        {
            if ($e == $this -> conn -> connect_error){
                $this->conn->close();
                exit();
            
            }
        }
        
    }
}