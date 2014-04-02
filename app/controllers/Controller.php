<?php
namespace MVCandNamespaces\app\controllers;

//Here are enumerated entities this controller requires
use MVCandNamespaces\app\models\Entreprise;

Class Controller implements ControllerInterface //PSR-1(3): Class names written in StudlyCaps
{ 

	//Controller initialisation >> Default Action
	public function initAction()
	{
		//Model: 
		
		//View: Default display is welcome page
		include(PATH_VIEWS.'acceuil.php');
	}

	public function listerEntreprisesAction() //PSR-1(4.3): Method names written in camelCase
	{
		//Model: Instantiation of Entreprise Class. At first glance unknown but autoload stack(bootstrap.php) will find the correct file!
		$listeEntreprises = new Entreprise();
		$listeEntreprises->setNom("BigBrother");
		echo $listeEntreprises->findAll();

		//View: Display a list
		include_once(PATH_VIEWS.'listeEntreprises.php');
	}
}