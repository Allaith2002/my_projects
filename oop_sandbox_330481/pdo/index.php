<?php
/**
 * We gaan een verbinding maken met de database d.m.v. PDO
 */
require '../classes/Database.php';


 $db = new Database();

 $db-> query("SELECT `id`, `country`, `capital`, `continent`, `population` FROM `country`");

 /// var_dump($db->selectAll());

 $conuntries = $db->selectAll();


 echo "country is " . $conuntries[0]->country;
 echo "<br>";
 echo "capital is " . $conuntries[0]->capital;
 echo "<br>";
 echo "continent is " . $conuntries[0]->continent;
 echo "<br>";
 echo "population is " . $conuntries[0]->population;

 $row = "";

 foreach($conuntries as $key => $value){
 
 
     $row .= "<tr>
                <td>{$value->country}</td>
                <td>{$value->capital}</td>
                <td>{$value->continent}</td>
                <td>{$value->population}</td>

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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
   <link rel="stylesheet" href="css/style.css">
 
 
   <title>Contact</title>
 </head>
 
 <body>
 

 <li>
         <a href="../pdo/create.php">LES 3: Werken met PDO</a>
         
     </li>
 
 <div class="container">
     <div class="row">
         <div class="col-12">
         <table class="table table-primary table-striped table-hover">
 <thead>
     <tr>
 <th>country</th>
 <th>capital</th>
 <th>continent</th>
 <th>population</th>



 
 
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
   <script src="./js/app.js"></script>
 
 </body>
 
 </html>