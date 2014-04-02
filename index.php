<?php
namespace MVCandNamespaces;

# MVC Configuration
#	(Constants written in Capital letters (PSR-1(4.1)) 
#	To improve readability and to lessen tracing issues, files requiring constants are specified in comments.

#	PATH_VIEWS: Path to the directory containing the Views
#		@Controllers/*.php
define('PATH_VIEWS','app/views/');

#	PATH_LIB: Path to the MVC brain
#		@index.php
define('PATH_LIB','lib/'); 

#	ROOT: Absolute path to the Vendor directory MVCandNamespaces (excluding itself)
#		@bootstrap.php
define('ROOT', realpath(__DIR__."/..")."\\");

#	NAMESPACE_CONTROLLERS: Namespace of the controllers. Should match with autoload
#		@lib/Routeur.php
define('NAMESPACE_CONTROLLERS',"MVCandNamespaces\app\controllers\\");

use MVCandNamespaces\lib\Kernel;

//Autoloader Inclusion
require_once(PATH_LIB.'bootstrap.php'); 

$kernel = new Kernel();
$kernel->load();
