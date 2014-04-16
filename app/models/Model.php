<?php
namespace MVCandNamespaces\app\models;
/*
	Model.php
	|> Parent class of models
	|	- Provides child classes with a single instance of a database connection
*/

use MVCandNamespaces\lib\DbConnection; 

//use PDO; // uncomment when PDO constants are required (ex: PDO::PARAM_INT)

abstract class Model
{
	// Child classes will access database connection through this attribute
	protected $_db;
	
	// Retrieve the database Connection from DbConnection (PDO Object)
	protected function getDb() 
	{
		$this->_db = DbConnection::getInstance();
		
		return $this->_db;
	}

}