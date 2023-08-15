<?php

include("./connect_dp.php");

include("./functions.php");




 
$firstName =    $_POST['firstName'];
$middleName =    $_POST['middleName'];
$lastName = $_POST['lastName'];
$Email =    $_POST['Email'];
$age = $_POST['age'];   
$PhoneNumber = $_POST['PhoneNumber'];
$textarea = $_POST['textarea'];

if (isset($_POST['submit'])) {
$sql = "INSERT INTO users(firstName, middleName, lastName, Email, age, PhoneNumber, textarea) 
        VALUES  ('$firstName' , '$middleName', '$lastName' , '$Email' , '$age', '$PhoneNumber' , '$textarea')";
//        echo $sql; exit();
       if(mysqli_query($conn, $sql)){
               header("Refresh:3; url=./read.php");
       }else{
        echo 'Error ' . mysqli_error($conn);
       }
}
?>
  <link rel="stylesheet" href="css/style.css">


<h1 class="alert-contact" >Uw gegeven zijn verwerkt</h1>