<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class config{
public $db="mysql:host=localhost;dbname=task2";

public $user="root";
public $pass="Gaurav1234";
public $conn;
public function __construct()
{
try{
$this->conn=new PDO($this->db,$this->user,$this->pass);
// echo "connection sucessfully";
}
catch(PDOException $e){
echo "error". $e->getMessage();
}
}

}
// $conn= new config();

?>