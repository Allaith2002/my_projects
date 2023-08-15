<?php

$servername = "localhost";
$username =    "Allaith_2002";
$password = "Shasho99s@";
$databasename ="amg";

$conn = mysqli_connect($servername, $username, $password, $databasename);

$sql = "SELECT * FROM register";

$result = mysqli_query($conn, $sql);

$row = "";

while($record = mysqli_fetch_assoc($result)){


    $row .= "<tr>
               <td>{$record["id"]}</td>
               <td>{$record["email"]}</td>
               <td>{$record["password"]}</td>
               <td>{$record["userrole"]}</td>

 
               <td>
            
               <a href='./update.php?id="  . $record["id"]  ."'>
               <img src='./img/icons/pen.png' alt='pencil'>
               </a>
               </td>

               <td>
               <a href='./delete.php?id="  . $record["id"]  ."'>
               <img src='./img/icons/edit.png' alt='pencil'>
               </a>
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


 

<div class="container">
    <div class="row">
        <div class="col-12">
        <table class="table table-primary table-striped table-hover">
<thead>
    <tr>
<th class="">KlantNummer</th>
<th>email</th>
<th>password</th>
<th>userrole</th>
<th>Bijwerken</th>
<th>verwijderen</th>
<th></th>
<th></th>


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