<?php
/*
	Router.php
	|> According to a request expressed by the Kernel, the purpose of a router is to find the matching route.
	| Once returned to the Kernel, an appropriate controller can be called.
	|
	|> A route is an Array of information intended for the Kernel containing:
	|	- The controller class name.
	|	- The Action (method) that has to be executed as an answer to GET request
	|
	|> Comments:
	|	We are going to instantiate dynamically the controller class and since PHP resolves namespaces at compile time, 
	|	We need to use a constant (NAMESPACE_CONTROLLERS, defined within frontal controller: index.php) 
	|	Examples:
	|		use MVCandNamespaces\app\controllers;
	|		$controller = New controllers\$route['controller']() >> Syntax error
	|	or
	|		use MVCandNamespaces\app\controllers\ControllerBananas as controllerBananas; $route['controller'] = "ControllerBananas";
	|		$controller = New $route['controller'](); >> looks for __NAMESPACE__\controllerBananas class without considering aliasing!
*/


namespace MVCandNamespaces\lib;

class Router 
{
	public static function whichRoutetoFollow(array $request)
	{
		//Default route: controller:initAction
		$route['controller'] 	= "controller";
		$route['action'] 		= "initAction";		//Warning: Same default method name for every controller. ControllerInterface is taking care of this.
		
		// Let me see if I have a route for such a controller!
		if(isset($request['controller']) && class_exists(NAMESPACE_CONTROLLERS.$request['controller']))
		{
			echo "<br>Controller <em>".$request['controller']."</em> found!";
			$route['controller'] = $request['controller'];
			// Does this controller know how to proceed such action ?
			if(isset($request['action']) && in_array($request['action']."Action", get_class_methods(NAMESPACE_CONTROLLERS.$request['controller']), true))
			{
				
				echo "<br>Method <em>".$request['action']."</em> found!";
				$route['action'] = $request['action']."Action";
				//potential method parameters. (Editor's Note: Has to be implemented)
			}
		}

		$route['controller'] = NAMESPACE_CONTROLLERS.$route['controller'];
		return $route;
	}

}