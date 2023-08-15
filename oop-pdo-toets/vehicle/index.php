<?php
/**
 * We gaan een verbinding maken met de database d.m.v. PDO
 */
require '../classes/Database.php';


 $db = new Database();

 $db-> query("SELECT `id`, `brand`, `model`, `topspeed`, `price` FROM `vehicle`");

 /// var_dump($db->selectAll());

 $vehicles = $db->selectAll();


 $row = "";

 foreach($vehicles as $key => $value){
 
 
     $row .= "<tr>
                <td>{$value->brand}</td>
                <td>{$value->model}</td>
                <td>{$value->topspeed}</td>
                <td>{$value->price}</td>

                <t
                </td>
 
               </tr>";
 }
 
 ?>
 
 
 <!doctype html>
 <html lang="en">
 
 <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 
   <!-- Bootstrap CSS -->
 
   <link rel="stylesheet" href="css/style.css">
 
 
   <title>vehile</title>
 </head>
 
 <body>
 

 
         
    
 
 <div class="container">
     <div class="row">
         <div class="col-12">
         <table class="table table-primary table-striped table-hover">

         <h1>De vijf duurste auto's ter wereld</h1>
         <a href="../vehicle/create.php">Nieuwe record</a>

 <thead>
     <tr>
 <th>Merk</th>
 <th>Model</th>
 <th>Topsnelhied</th>
 <th>Prijs</th>



 
 
 </tr>
 </thead>
 <tbody>
 <?php echo $row; ?>
 
 </tbody>
 </table>
         </div>
     </div>
 </div>
 
 
   <!-- Option 1: Bootstrap Bundle with Popper -->

 
 </body>
 
 </html>