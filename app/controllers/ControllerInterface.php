<?php
/*
	|> ControllerInterface
	|	Contraint les controleurs à définir une méthode (action) par défaut.

*/
namespace MVCandNamespaces\app\controllers;

interface ControllerInterface
{
	// Action requise par défaut par le routeur lors du chargement du controleur par le Kernel
	public function initAction();
}