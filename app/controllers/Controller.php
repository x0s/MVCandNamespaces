<?php
namespace MVCandNamespaces\app\controllers;

//Here are enumerated entities this controller requires
use MVCandNamespaces\app\models\Company;

Class Controller implements ControllerInterface //PSR-1(3): Class names written in StudlyCaps
{ 

	//Controller initialisation >> Default Action
	public function initAction()
	{
		//Model: 
		
		//View: Default display is welcome page
		include(PATH_VIEWS.'welcome.php');
	}

	public function listerEntreprisesAction() //PSR-1(4.3): Method names written in camelCase
	{
		//Model: Instantiation of Company Class. At first glance unknown but autoload stack(bootstrap.php) will find the correct file!
		$companiesList = new Company();
		$companiesList->setName("BigBrother");
		echo $companiesList->findById(3);

		//View: Display a list
		include_once(PATH_VIEWS.'companiesList.php');
	}
}