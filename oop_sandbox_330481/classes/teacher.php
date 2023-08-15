<?php

/**
 * dit is een teacher class
 */

 class teacher extends Person
 {
   //properties, fields

   private $salary; 
   private $yearsInService; 


   //getters and setter

   //constrctor

   public function __construct($firstname, $infix, $lastname, $bankaccountnumber, $salary, $yearsInService, $phonenumber)
    {
      parent::__construct($firstname, $infix, $lastname, $bankaccountnumber, $phonenumber);
        $this->salary = $salary;
        $this->yearsInService = $yearsInService;

        
    }

   //methods
   public function exposeMysalary()
   {
    return "||| Mijn naam is: " . $this->firstname . " " . $this->infix . " " . $this->lastname . " || Salairs gaat naar " . $this->bankaccountnumber . " || salaris is: $" . $this->salary . " Ik ben " . $this->yearsInService . " in dienst |||" . $this->phonenumber;
   }
 }
 