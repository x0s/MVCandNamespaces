<?php
namespace MVCandNamespaces\lib;
//use MVCandNamespaces\app\controllers\Controleur;

class Routeur 
{
	public static function whichRoutetoFollow(array $requete)
	{
		//route par défaut: Controleur:initAction
		$route['controleur'] 	= "Controleur";
		$route['action'] 		= "initAction";		//attention même nom de methode par défaut pour TOUS les controleurs
		
		//Test si un controleur est défini suivant format .htaccess et existant!
		if(isset($requete['controleur']) && class_exists(NAMESPACE_CONTROLLERS.$requete['controleur']))
		{
			echo "<br>controleur existant! ".$requete['controleur'];
			$route['controleur'] = $requete['controleur'];
			//Teste si une action a été définie et correspond effectivement à une méthode du controleur!
			if(isset($requete['action']) && in_array($requete['action']."Action", get_class_methods(NAMESPACE_CONTROLLERS.$requete['controleur']), true))
			{
				
				echo "<br>methodeAction existante!".$requete['action'];
				$route['action'] = $requete['action']."Action";
				//paramètres éventuels de la méthode supplémentaires à gérer plus tard
			}
		}

		$route['controleur'] = NAMESPACE_CONTROLLERS.$route['controleur'];
		return $route;
	}

}