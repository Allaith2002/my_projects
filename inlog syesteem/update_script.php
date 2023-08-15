<?php

include("./connect_dp.php");


$id =           $_POST['id'];
$email =    $_POST['email'];
$password =    $_POST['password'];
$userrole =    $_POST['userrole'];


$sql = "UPDATE `register`
        SET `email` = '$email',
        `password` = '$password',
         `userrole` = '$userrole', 
        WHERE `id` = $id;";

        mysqli_query($conn, $sql);

        header ("location:  ./index.php?content=admin_panel");

?>