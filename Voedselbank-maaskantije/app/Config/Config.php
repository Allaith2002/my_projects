<?php
// Database parameters of mysql
define('DB_HOST', 'localhost'); // Add your website host name.
define('DB_NAME', 'voedselbankDag3'); // Add your database name.
define('DB_USER', 'root'); // Add your database user name default is root.
define('DB_PASS', ''); // Add your database password.

// Database parameters of SqlServer
// define('DB_HOST', '5cg04629g7');
// define('DB_NAME', 'Sollicitatie');
// define('DB_USER', null);
// define('DB_PASS', null);

//APPROOT
define('APPROOT', dirname(dirname(__FILE__)));

//URLROOT (Dynamic links)
define('URLROOT', 'http://voedselbank-maaskantije.org/');

//Sitename
define('SITENAME', 'Mvc-2109a-P4 App');

define('SQLROOT', '../app/Sqlscripts/');