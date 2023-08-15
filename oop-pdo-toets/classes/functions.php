<?php




#Deze funcatie laadt automatich de classes die gebruikt gaat worden.
function load_class($classname)
{

    // Bouw het pad op naar het bestand war de class in zit 
   $pathToFile = '../classes/' . $classname . '.php';


   // Check of het bestadn waar de class in zit bestaan
if(file_exists($pathToFile))
{
    // Als het bestadn met class erin bestaat, laadt hem dan op de pagina
    require($pathToFile);
}else {
    // Als het bestand niet bestaan geef dan onderstaande melding.
    echo "Class is niet gevonden";
 }
}

spl_autoload_register('load_class');