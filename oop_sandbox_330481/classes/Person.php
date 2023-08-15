<?php

/**
 * Dit is een class person
 */

    class Person
    {
        //De properties, fields, instance variables
        protected $firstname = "";
        protected $infix = " ";
        protected $lastname = ""; 
        protected $bankaccountnumber;
        protected $phonenumber;


    // ik maak een get-funcatie voor het opgeven van een waarde voor een property
    public function __set($property, $value)
    {
        if(property_exists($this, $property))
        {
          $this->$property = $value;
        }
    }

    //DIt is een get-functie voor bankaccountnumber
    public function getBankaccountnumber()
    {
        return $this->bankaccountnumber;
    }

    public function __construct($firstname, $infix, $lastname, $bankaccountnumber, $phonenumber = null)
    {
        $this->firstname = $firstname;
        $this->infix = $infix;
        $this->lastname = $lastname;
        $this->bankaccountnumber = $bankaccountnumber;
        $this->phonenumber = $phonenumber;


        
    }


// Dit is de constructor
public function __get($property)
{
    if (property_exists($this, $property))
    {
     return $this->$property;
    }
}
 


// Dit is een method
    public function sayHello()
    {
     return "Groetjes van " . $this->firstname . " " . $this->infix . " " . $this->lastname . " en mijn Bankrekeningnummer " . $this->bankaccountnumber ;
    }
 }


