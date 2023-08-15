<?php

include("./connect_dp.php");


$id  = $_GET["id"];

$sql = "DELETE FROM `register` WHERE `id` = $id";


mysqli_query($conn, $sql);


header ("location: ./index.php?content=admin_panel");




?>