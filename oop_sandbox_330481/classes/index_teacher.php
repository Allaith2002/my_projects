<?php
require("./functions.php");



// we maken een nieuw object van class teacher
$teacher = new teacher( "Allaith", " ", "Chachou", "NL64INF3423253", 4535 , "5 jaar" ,"06-2131210");
echo $teacher-> exposeMysalary();


echo "<hr>";

$teacher1 = new teacher( "Jan", " ", "Man", "NL64INF3423253", 34234,  "1 jaar", "06-32446210");
echo $teacher1-> exposeMysalary();


echo "<hr>";

$teacher2 = new teacher( "Alex", " ", "Flex", "NL64INF3423423423553", 32235 , "10 jaar", "06-3236210");
echo $teacher2-> exposeMysalary();



