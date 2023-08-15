<?php

require("../classes/functions.php");


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // maak je input clean
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
// Maak een nieuwe object van de class Database
$db = new Database();

$db->query("INSERT INTO `country` (   `id`,
                                      `country`,
                                      `capital`,
                                      `continent`,
                                      `population`)
                       VALUES         (:id,
                                      :country,
                                      :capital,
                                      :continent,
                                      :population)");
$db->bind(':id',NULL, PDO::PARAM_INT);
$db->bind(':country', $_POST['country'], PDO::PARAM_STR);
$db->bind(':capital', $_POST['capital'], PDO::PARAM_STR);
$db->bind(':continent', $_POST['continent'], PDO::PARAM_STR);
$db->bind(':population', $_POST['population'], PDO::PARAM_INT);

$db->execute();

header("Location: ./index.php");









}else{
    echo"dit is array wordt niet in behandeling genomen";
}