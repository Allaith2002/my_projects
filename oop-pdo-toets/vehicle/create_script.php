<?php

require("../classes/functions.php");


if ($_SERVER["REQUEST_METHOD"] == "POST"){
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$db = new Database();

$db->query("INSERT INTO `vehicle` (   `id`,
                                      `brand`,
                                      `model`,
                                      `topspeed`,
                                      `price`)
                       VALUES         (:id,
                                      :brand,
                                      :model,
                                      :topspeed,
                                      :price)");
$db->bind(':id',NULL, PDO::PARAM_INT);
$db->bind(':brand', $_POST['brand'], PDO::PARAM_STR);
$db->bind(':model', $_POST['model'], PDO::PARAM_STR);
$db->bind(':topspeed', $_POST['topspeed'], PDO::PARAM_STR);
$db->bind(':price', $_POST['price'], PDO::PARAM_INT);

$db->execute();

header("Location: ./index.php");









}else{
    echo"dit is array wordt niet in behandeling genomen";
}