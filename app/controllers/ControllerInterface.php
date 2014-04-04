<?php
/*
	|> ControllerInterface
	|	Force the controllers to define default methods (Action).
*/
namespace MVCandNamespaces\app\controllers;

interface ControllerInterface
{
	// Signing this method ensures consistency with the router default behaviour
	public function initAction();
}