<?php ob_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/me.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>𝑴𝑬𝑹𝑪𝑬𝑫𝑬𝑺-𝑩𝑬𝑵𝒁</title>
  </head>
  <body>

  <main>
 <div class="container-fluid ">
     <div class="row">
         <div class="col-12 px-0">
           <?php  include("./banner.php"); ?>
         </div>
     </div>
 </div>

 <div class="container-fluid">
     <div class="row">
         <div class="col-12  px-0">
           <?php  include("./nevbar.php"); ?>
         </div>
     </div>
 </div>


 <div class="container-fluid">
     <div class="row">
         <div class="col-12 px-0">

         <?php
           include ("./content.php");
         ?>


         </div>
     </div>
 </div>

 <div class="container-fluid px-0 fixed-bottom">
     <div class="row">
         <div class="col-12">
           <?php  include("./footer.php"); ?>
         </div>
     </div>
 </div>
</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>