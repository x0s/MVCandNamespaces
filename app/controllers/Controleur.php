<?php
namespace MVCandNamespaces\app\controllers;

//On énumère ici les entités dont ce controleur a besoin
use MVCandNamespaces\app\models\Entreprise;

Class Controleur implements ControllerInterface //PSR-1(3): Noms de classe en StudlyCaps
{ 

	//On initialise le controleur >> action par défaut
	public function initAction()
	{
		//Modèle: 
		
		//Vue: Affichage par défaut de la page d'acceuil
		include(PATH_VIEWS.'acceuil.php');
	}

	public function listerEntreprisesAction() //PSR-1(4.3): Nom de méthodes écrits en camelCase
	{
		//Modèle: Appel à la classe Entreprise, inconnue >> _autoload() dans bootstrap.php se lance et va charger la classe!
		$listeEntreprises = new Entreprise();
		$listeEntreprises->setNom("BigBrother");
		echo $listeEntreprises->findAll();

		//Vue: Affichage de la liste
		include_once(PATH_VIEWS.'listeEntreprises.php');
	}
}