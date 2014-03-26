<?php
namespace MVCandNamespaces\app\models; //namespace suivant PSR-0

class Entreprise extends Model//nom classe écrit en StudlyCaps ( PSR-1(3) )
{

	private $nom;
	private $adresse;
	private $tel;
	
	public function getNom() //nom de méthode écrit en camelCase (PSR-1(4.3))
	{
		return $this->nom;
	}

	public function setNom($nouveauNom)
	{
		$this->nom = $nouveauNom;
	}
	
	public function findAll()
	{
		//requête bdd
		//$bdd = ConnexionBdd::getInstance();
		
		$bdd = $this->getBdd();
		//$bddd = $this->_db;
		
		$stmt = $bdd->prepare('SELECT * FROM test WHERE id = :id');
		$stmt->bindValue(':id', 1);
		$stmt->execute();
 
		print_r($stmt->fetchObject());
		
		
		var_dump($bdd);
		return "BDD OK";
	}

}