<?php

 include ("./functions.php");

 is_authorized(["admin", "root", "moderator"]);

 

?>


a-home
<?php
  var_dump($_SESSION);




  echo "Mijn gebruikersrol is: ". $_SESSION["userrole"];
  echo "<hr>";
  echo "Mijn id is: " . $_SESSION["id"];


  $mijnfruit = "peer";
  $fruitsoorten = array("banaan", "citroen", "appel");
  var_dump (in_array ($mijnfruit, $fruitsoorten));

  ?>