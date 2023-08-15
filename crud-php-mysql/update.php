<?php

$id = $_GET["id"];

include("./connect_dp.php");

$sql = "SELECT * FROM `users` WHERE `id` = $id";

$result = mysqli_query($conn, $sql);

$record =  mysqli_fetch_assoc($result);

// echo "<pre>"; var_dump($record); echo "</pre>";

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

<div class="container-fluid mb-7">
  <header>
          <a href="#" class="brand">𝑴𝑬𝑹𝑪𝑬𝑫𝑬𝑺-𝑩𝑬𝑵𝒁</a>
         
          <div class="navigation">
              <div class="navigation-items">
                  <a class="active" href="index.php">Home</a>
                  <a href="read.php">read</a>
      
              </div>
          </div>
      </header>

</div>


<div class="container">

  <div class="row ">
    <div class="col-6">
      <img src="img/amg.jpg" alt="foto"class="img-fluid">
    </div>

    <div class="col-6" id="formid">
    <form id="contact-form" action="update_script.php" method="POST">
      <div class="contact-text">
      <h1 class="say-text">Zeg hallo</h1>
      </div>
        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="FirstName" value="<?php echo $record["firstName"] ?>">
        <br>
        <input type="text" class="form-control" name="middleName" id="middleName" placeholder="middleName" value="<?php echo $record["middleName"] ?>">
        <br>
        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="LastName" value="<?php echo $record["lastName"] ?>">
        <br>
        <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="Phone Number" value="<?php echo $record["PhoneNumber"] ?>">
        <br>
        <input type="text" class="form-control" name="Email" id="Email" placeholder="Email" value="<?php echo $record["Email"] ?>">
        <br>
        <input type="text" class="form-control" name="age" id="age" placeholder="age" value="<?php echo $record["age"] ?>">
        <br>
        <textarea class="form-control" name="textarea"  id="textarea"  placeholder="Message" value="<?php echo $record["textarea"] ?>"></textarea>
        <br>
        <input type="hidden"  value="<?php echo $id; ?>" name="id">
        <br>
        <input type="submit" class="form-control submit" name="submit" value="send">
    </form>
</div>





  </div>
  </div>
  </div>




  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="./js/app.js"></script>

</body>

</html>