<?php

require_once dirname(dirname(__FILE__)).'/database/database.php';

// spl_autoload_register(function($class_name){
//     include $class_name.'.php';
//     //var_dump($class_name);
// });

class Sections extends db_connect
{
    public function getAllSections()
    {
        $stmt = "SELECT * FROM tblsections";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getSection($id)
    {
        $stmt = "SELECT * FROM tblsections WHERE ID=$id";

        $result = mysqli_query($this->conn, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function createSection($name)
    {
        $stmt = $this -> conn -> prepare("INSERT INTO tblsections (ID, name) VALUES (NULL, ?)");

        $stmt -> bind_param("s", $name);

        $stmt -> execute();

    }

    public function updateSection($id, $name)
    {
        $stmt = $this -> conn -> prepare("UPDATE tblsections SET name=? WHERE ID=$id");

        $stmt -> bind_param("s", $name);

        $stmt -> execute();

    }

    public function deleteSection($id)
    {
        $stmt = "DELETE FROM tblsections WHERE ID=$id";

        mysqli_query($this->conn, $stmt);
    }
}