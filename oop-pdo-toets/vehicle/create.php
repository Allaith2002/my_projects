
<head>
  <link rel="stylesheet" href="../css/style.css">
</head>
<div class="container">

  <div class="row ">
 

  
    <form id="contact-form" action="./create_script.php" method="POST">
     
    <h1>Voeg een nieuwe auto toe</h1>
     <label for="name">Merk:
        <input type="text" class="form-control" name="brand" id="brand" placeholder="brand"></label> 
        <br>
        <label for="name">Model
        <input type="text" class="form-control" name="model" id="model" placeholder="model">
        </label> 
        <br>
        <label for="name">Topsnelhied:
        <input type="text" class="form-control" name="topspeed" id="topspeed" placeholder="topspeed">
        </label> 
        <br>
        <label for="name">Prijs:
        <input type="number" class="form-control" name="price" id="price" placeholder="price">
        </label> 
        <br>
        <input type="submit" class="form-control submit" name="submit" value="Verzenden">
    </form>
</div>

