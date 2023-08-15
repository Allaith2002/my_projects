<?php

$id = $_GET["id"];

include("./connect_dp.php");

$sql = "SELECT * FROM `register` WHERE `id` = $id";

$result = mysqli_query($conn, $sql);

$record =  mysqli_fetch_assoc($result);

?>


  <link rel="stylesheet" href="css/style.css">





<div class="container">

  <div class="row ">

    <div class="col-6" id="formid">
    <form id="contact-form" action="update_script.php" method="POST">
      <div class="contact-text">
      <h1 class="say-text">Update</h1>
      </div>
        <input type="text" class="form-control" name="email" id="firstName" placeholder="email" value="<?php echo $record["email"] ?>">
        <br>
        <input type="text" class="form-control" name="password" id="middleName" placeholder="password" value="<?php echo $record["password"] ?>">
        <br>
        <input type="text" class="form-control" name="userrole" id="lastName" placeholder="userrole" value="<?php echo $record["userrole"] ?>">
        <br>
        <input type="hidden"  value="<?php echo $id; ?>" name="id">
        <br>
        <input type="submit" class="form-control submit" name="submit" value="send">
    </form>
</div>

  </div>
  </div>
  </div>
