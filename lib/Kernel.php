<?php
/*
	Kernel.php

	|> What is called Kernel is the core of the application and aims at:
	|	- asking the router: Which controller do I have to call As I give thou this (URL) request ? (A kernel can be very polite :))
	|	- instantiating the appropriate controller and call the required method(Action)
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
			$securedRequest[$parameter] = htmlentities($value, ENT_QUOTES);
			echo "Secured GET parameter <em>".$parameter."</em> : ".$securedRequest[$parameter]."<br />"; //Insérer fichier log
		}
		return $securedRequest;
	}

	/* Kernel Loading means
	| - To Retrieve and Secure URL Request
	| - To ask the router the route
	| - To instantiate the controller and execute the action
	*/
	public function load() {

		$request = (!empty($_GET)) ? $this->secureRequestParameters($_GET) : array();
		
		// We expect a route <=> Array("controller" => , "action" => [, ...parameters])
		$route = Router::whichRouteToFollow($request);
		
		var_dump($route); //A route is basically the action that has to be triggered by a controller
		
		// Controller instantiation
		$route['controller'] = $route['controller'];
		$controller = New $route['controller']();
		$controller->$route['action']();
	
	}

}