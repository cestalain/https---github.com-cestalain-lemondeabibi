<?php
namespace App;
use \PDO;
class Database{
private $db_name;
private $db_user;
private $db_password;
private $db_host;
private $pdo;
public function __construct($db_name,$db_host,$db_user,$db_password)
{
    $this->db_name=$db_name;
    $this->db_user=$db_user;
    $this->db_host=$db_host;
    $this->db_password=$db_password;
}
private function getPDO()
{
    if ($this->pdo===null){
        $pdo = new PDO('mysql:dbname=lemon444_oeuvres;host=localhost','lemon444_alain','bibiweb1512');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;  
        }
    return $pdo; 
}
public function query($statement)
{
    if ($this->pdo===null)
        {
        $req=$this->getPDO()->query($statement);
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        }
        return $data;
}
}