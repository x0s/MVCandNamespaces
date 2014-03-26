<?php
namespace MVCandNamespaces\lib;
/*
	Fonction d'autoload spl_autoload_register (Standard Php Library)
	-> Permet de charger automatiquement les classes requises quand celles-ci ne sont pas trouv�es.
	-> Ajoute sur une pile (register) une fonction magique __autoload() 
	
	On charge les classes en fonction de leurs namespaces.
	L'application est organis�e telle que Namespaces <=> Arborescence fichiers
	EX: 
		'MVCandNamespaces\app\controllers\Controleur' => 'C:\wamp\www\MVCandNamespaces\app\controllers\Controleur.php' 
		'MVCandNamespaces\ClassRacine' => 'C:\wamp\www\MVCandNamespaces\ClassRacine.php'
		'MVCandNamespaces\Class_Racine' => 'C:\wamp\www\MVCandNamespaces\Class\Racine.php'
		'MVCandNamespaces\name_Space\Class_Racine' => 'C:\wamp\www\MVCandNamespaces\name_Space\Class\Racine.php'
	
	Toutes les classes sont situ�es en dessous du vendor name "MVCandNamespaces"
	ROOT est une constante d�finie dans index.php (point d'entr�e de l'app) contenant le chemin absolu du dossier contenant le vendor!
	
	
	Note:
		Si la classe recherch�e est � la racine (dans le dossier vendor), l'autoload ne trouve pas de position de "dernier s�parateur" et saute directement
*/



spl_autoload_register(
	function($nameSpace) {
		$nameSpace = ltrim($nameSpace); // on supprime les �ventuels '\' en d�but de chemin
		$pathToFileName = '';
		$lastNsPos = strrpos($nameSpace, '\\'); // position du dernier s�parateur de namespace '\'
		if($lastNsPos !== false) //Si le dernier s�parateur a �t� trouv� <=> s'il y a une arborescence
		{
			$pathToFileName = substr($nameSpace, 0, $lastNsPos + 1); // On isole la premi�re partie du chemin [[0 , lastNsPos]]
			$nameSpace 		= substr($nameSpace, $lastNsPos + 1); 	 // On r�cup�re le dernier segment (nom de la classe) [[lastNsPos , ... ]]
			$pathToFileName = str_replace('\\', DIRECTORY_SEPARATOR, $pathToFileName);
		}
		$pathToFileName .= str_replace('_', DIRECTORY_SEPARATOR, $nameSpace); //On ajoute le nom de la classe suivant PSR-0 (compatible normes PHP <= 5.2.x)
		
		$finalPath = ROOT . $pathToFileName . '.php';
		var_dump($finalPath);
		if (file_exists($finalPath)) {
			require_once($finalPath);
		}
		else 
		{ 
			echo "on passe le relai au prochain autoloader! gl ;"; 
		}

	}
);