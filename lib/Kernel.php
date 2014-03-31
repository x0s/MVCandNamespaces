<?php
/*
	|> What is called Kernel is the core of the application and aims at:
	|	- asking the router: Which controller do I have to call As I give thou this (URL) request ? (A kernel can be very polite :))
	|	- d'Instancier le routeur et appeller la méthode (action) requise.
	|
	|> Comments:
	|	We are going to instantiate dynamically the controller class and since PHP resolves namespaces at compile time, 
	|	We need to use a constant (NAMESPACE_CONTROLLERS, defined within frontal controller: index.php) 
	|	Examples:
	|		use MVCandNamespaces\app\controllers;
	|		$controleur = New controllers\$route['controleur']() >> error
	|	or
	|		use MVCandNamespaces\app\controllers\ControleurBananes as ControleurBananes;
	|		$controleur = New $route['controleur'](); >> Cherche la classe __NAMESPACE__\ControleurBananes sans prendre en compte l'aliasing!
*/
namespace MVCandNamespaces\lib;

use MVCandNamespaces\lib\Routeur;

class Kernel 
{
	//To avoid any injection, We secure all parameters of the GET request
	private function secureRequestParameters(array $request)
	{
		foreach($request as $parameter => $value)
		{
			$request[$parameter] = htmlentities($value, ENT_QUOTES);
			echo $parameter." : ".$request[$parameter]."<br />"; //Insérer fichier log
		}
		return $request;
	}

	/* Kernel Loading means
	| - To Retrieve and Secure URL Request
	| - 
	*/
	public function load() {

		// On récupère et sécurise la requête 
		$request = (!empty($_GET)) ? $this->secureRequestParameters($_GET) : array();
		
		//On demande au routeur la bonne route(contrôleur, action, paramètres)
		$route = Routeur::whichRouteToFollow($request);
		
		var_dump($route); //Une route contient l'Action à déclencher par un Contrôleur
		
		//Instanciation du contrôleur
		$route['controleur'] = $route['controleur'];
		$controleur = New $route['controleur']();
		$controleur->$route['action']();
	
	}

}