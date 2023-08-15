<?php

include("./connect_dp.php");


$id =           $_POST['id'];
$firstName =    $_POST['firstName'];
$middleName =    $_POST['middleName'];
$lastName =    $_POST['lastName'];
$Email =    $_POST['Email'];
$age = $_POST['age']; 
$PhoneNumber = $_POST['PhoneNumber'];
$textarea = $_POST['textarea'];

$sql = "UPDATE `users`
        SET `firstName` = '$firstName',
        `middleName` = '$middleName',
         `lastName` = '$lastName',
          `Email` = '$Email',
          `age` = '$age',
           `PhoneNumber` = '$PhoneNumber',
            `textarea` = '$textarea' 
        WHERE `id` = $id;";

        mysqli_query($conn, $sql);

        header("location: ./read.php");

?>