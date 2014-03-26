<?php
namespace MVCandNamespaces\app\models; //namespace suivant PSR-0

//On inscrit le namespace de la connexion une seule fois ici, on transmettra la connexion par h�ritage!
use MVCandNamespaces\lib\ConnexionBdd; 

//use PDO; // Utile si on utilise des constantes PDO (ex: PDO::PARAM_INT)

Class Model
{
	// Attribut permettant aux classes filles(mod�les) d'acc�der � la connexion � la bdd
	protected $_db;
	
	/*public function __construct()
	{
		$this->_db = ConnexionBdd::getInstance();
	}*/
	
	// Fonction qui r�cup�re l'instance de la connexion � la Base de donn�es (objet PDO)
	protected function getBdd() 
	{
		$this->_db = ConnexionBdd::getInstance();
		
		
		/*$stmt = $this->_db->prepare('SELECT * FROM test WHERE id = 3');
		$stmt->bindValue(':id', 3, PDO::PARAM_INT);
		$stmt->execute();
		print_r($stmt->fetchObject());
		*/
		
		return $this->_db;
	}




}