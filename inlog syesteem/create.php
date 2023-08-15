<?php

include("./connect_dp.php");

include("./functions.php");




 
$email  =    $_POST['email'];
$password =    $_POST['password'];
$userrole = $_POST['userrole'];


if (isset($_POST['submit'])) {
$sql = "INSERT INTO register(email, password, userrole) 
        VALUES  ('$email' , '$password', '$userrole')";
       if(mysqli_query($conn, $sql)){
        header ("location:  ./index.php?content=admin_panel");
       }else{
        echo 'Error ' . mysqli_error($conn);
       }
}
?>
  <link rel="stylesheet" href="css/style.css">
