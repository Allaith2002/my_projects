<?php

include("./connect_dp.php");


$id  = $_GET["id"];

$sql = "DELETE FROM `users` WHERE `id` = $id";


mysqli_query($conn, $sql);


header("location: ./read.php");




?>