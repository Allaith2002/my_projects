<?php

// Dit is de Database class

require ('../Config/config.php');
class Database
{
/**
 * Properties
 */

 private $dbHost = DB_HOST;
 private $dbUser = DB_USER;
 private $dbPass = DB_PASS;
 private $dbName = DB_NAME;
 private $dbHandler;




 // Contructor 

 public function __construct()
 {
     
    $conn = "mysql:host=$this->dbHost;dbname=$this->dbName;charset=UTF8";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try
            {
        $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);

    }catch(PDOException $e){
        
        echo $e->getMessage();
    }

 }

 public function query($sql)
 {
     $this->statement = $this->dbHandler->prepare($sql);
    //  var_dump($this->statement);exit();
 }

 public function selectAll()
 {
     $this->statement->execute();
   return $this->statement->fetchAll(PDO::FETCH_OBJ);
 }

 public function bind($parameter, $value, $type)
 {
     $this->statement->bindValue($parameter, $value, $type);
 }

 public function execute()
 {
     return $this->statement->execute();
 }

}

