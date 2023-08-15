<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP Essentials</title>
  </head>
  <body>
    <h1>PHP Essentials</h1>

    <p>Mijn naam is:    <?php   echo "allaith chachou"; ?><p>
    <p>MIjn aders is:   <?php   echo  "IJsslestein"     ?><p>
     <?php echo "<p>dit is mijn php</p>"; ?>

     <?php
    //  dit is php text die niet word uitgevoerd. Dit noem je commentaar //
    /*  dit is php text die niet word uitgevoerd. Dit noem je commentaar */
    # zo kun je commentaar geven in php.
    // tussenvoegsl
    $insertion = "geen";
    // achternaam
    $lastname = "chachou";
    // 
     $Postal_Code = "3422EM";
    // hier onder staat varibale met daarin stukje tekst.//
      $firstname = "Allaith";
      #dit is variable getal met daarin een getal. dit noem je een integer-variable.
      $age = 18;
    // maak hier onder een variable met daarin het aders
      $address = "ijsslestein";
    // mijn schoonmaat
      $shoe_size = 41;
    //  telefoonnummer
    $phone_number = "0623432544";

    $person = array("Allaith", "de", "Chachou", 18, "monitorplein 57", "Utrecht", "3402EM", 41);

    var_dump($person);

    echo "Ik woon in de stad: " .$person[5];   

    
    $person1 = array("voornaam"=>"Allaith", "achternaam"=>"Chachou", "leeftijd"=>"18");
     ?>
<hr>



<div class="card" style="width: 18rem;">
  <div class="card-header">
    Mijn gegevens
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><p>mijn voor naam is nog steeds: <?php echo $firstname, " ", $lastname; ?></p>
</li>
    <li class="list-group-item"><p>mijn leefttijd is: <?php echo $age; ?></p>
</li>
    <li class="list-group-item"><p>mijn adres is: <?php echo $address; ?></p>
</li>
<li class="list-group-item"><p>mijn tussenvoegsl is: <?php echo $insertion; ?></p>

</li>
<li class="list-group-item"><p>mijn achternaam is: <?php echo $lastname; ?></p>

</li>
<li class="list-group-item"><p>mijn postcode is: <?php echo $Postal_Code; ?></p>

</li>
<li class="list-group-item"><p>mijn schoonmaat is: <?php echo $shoe_size; ?></p>
</li>
<li class="list-group-item"><p>mijn telefoonnummer is: <?php echo $phone_number; ?></p>
</li>
  </ul>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-header">
    <strong>Mijn gegevens uit array</strong>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>mijn voor naam is:</strong> <?php echo $person[0]?>
</li>
    <li class="list-group-item"><p>mijn leefttijd is: <?php echo $person[3]?></p>
</li>
    <li class="list-group-item"><p>mijn adres is: <?php echo $person[4]?></p>

</li>
<li class="list-group-item"><p>mijn achternaam is: <?php echo $person[2]?></p>

</li>
<li class="list-group-item"><p>mijn postcode is: <?php echo $person[6]?></p>

  </ul>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-header">
    <strong>Mijn gegevens uit array</strong>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>mijn voor naam is:</strong> <?php echo $person1['voornaam'];?>
</li>

<li class="list-group-item"><strong>mijn achter naam is:</strong> <?php echo $person1['achternaam'];?>
</li>

  </ul>
</div>





<?php
$allaith = array("allaith ", "18 ", "3420em"); 
echo "mijn naam is  " . $allaith[0] . "mijn leeft tijd is " . $allaith[1] . " mijn postcode is " . $allaith[2] . ".";
?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
  </body>
</html>


<?php

?>