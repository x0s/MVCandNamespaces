<?php
namespace MVCandNamespaces;

//MVC Configuration
//Constants written in Capital letters (PSR-1(4.1))

define('PATH_VIEWS','app/views/');
define('PATH_LIB','lib/');
define('ROOT', realpath(__DIR__."/..")."\\"); //Path to the Vendor directory MVCandNamespaces
define('NAMESPACE_CONTROLLERS',"MVCandNamespaces\app\controllers\\");

use MVCandNamespaces\lib\Kernel;

//Autoloader Inclusion
require_once(PATH_LIB.'bootstrap.php'); 

$kernel = new Kernel();
$kernel->load();
