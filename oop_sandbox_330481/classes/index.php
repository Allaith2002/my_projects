<?php

require("./functions.php");

$person = new Person("Allaith", " ", "Chachou", "NL72INGB3242342" , "06-2423235");

$person->__set("firstname", "Al-laith");
echo $person-> sayHello();
// ik will allaith zijn bankrekeningnummer toevoegen
echo "<hr>";
// echo $person->firstname . " " .$person->lastname;

$person1 = new Person("Jon", "de", "Berg",  "NL342INGB3242342",  "06-2423235");
echo$person1->sayHello();
echo "<hr>";

$person2 = new Person("Jan", "de", "avond", "NL22INGB32423342342" , "06-2423235");
echo$person2->sayHello();
echo "<hr>";

$person3 = new Person("Boo", " ", "Cj ", "NL83INGB3242342",  "06-2423235");
echo $person3->sayHello();

?>