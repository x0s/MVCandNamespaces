<?php
namespace MVCandNamespaces\lib;
/*
	bootstrap.php
	|>This file aims at dynamically loading classes when needed in respect of PSR-0 Autoloading Standard.
	|
	|>spl_autoload_register Autoload function(Standard Php Library)
	|	- Allows dynamic class loading
	|	- Consists of pushing(registering) magical autoload functions on a stack 
	|
	|>Since this application invokes namespaces feature to organise classes,
	|We include required classes according to a correspondence between their Namespace and the folder structure.
	|Examples: 
	|	'MVCandNamespaces\app\controllers\Controller' => 'C:\path\to\project\www\MVCandNamespaces\app\controllers\Controller.php' 
	|	'MVCandNamespaces\ClassRacine' => 'path/to/project/MVCandNamespaces/ClassRacine.php'
	|	'MVCandNamespaces\Class_Racine' => 'path/to/project/MVCandNamespaces/Class/Racine.php'
	|	'MVCandNamespaces\name_Space\Class_Racine' => 'C:\path\to\project\www\MVCandNamespaces\name_Space\Class\Racine.php'
	|
	|>Comments:
	|	- Every class is located under top-level namespace (or vendor name) "MVCandNamespaces"
	|	- ROOT constant is defined in the front controller(index.php) and contains vendor base_directory
	|	- @bout Algo: When a class is referenced in top-level namespace, $lastNsPos === false.
*/

spl_autoload_register(
	function($nameSpace) {
		$nameSpace 		= ltrim($nameSpace); 		// Delete possible '\' at the beginning
		$pathToFileName = '';
		$lastNsPos 		= strrpos($nameSpace, '\\');// Last namespace separator('\') position 
		if($lastNsPos !== false) 					// If there is at least one separator, there is a folder structure to unmask
		{
			$pathToFileName = substr($nameSpace, 0, $lastNsPos + 1); // Truncation of first path segment [[0 , lastNsPos]]
			$nameSpace 		= substr($nameSpace, $lastNsPos + 1); 	 // Truncation of the last segment(class name) [[lastNsPos , ... ]]
			$pathToFileName = str_replace('\\', DIRECTORY_SEPARATOR, $pathToFileName);
		}
		$pathToFileName .= str_replace('_', DIRECTORY_SEPARATOR, $nameSpace); // Add Class name according to PSR-0 (PHP <= 5.2.x compatible )
		
		$finalPath = ROOT . $pathToFileName . '.php';
		var_dump($finalPath);
		if (file_exists($finalPath)) {
			require_once($finalPath);
		}
		else 
		{ 
			echo "We hand over the baton to the next autoloader! gl !"; 
		}

	}
);