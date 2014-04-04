<?php
namespace MVCandNamespaces\app\models;

class Company extends Model// Class Name written in StudlyCaps ( PSR-1(3) )
{

	private $name;
	
	public function getName() // method Name written in camelCase (PSR-1(4.3))
	{
		return $this->name;
	}

	public function setName($newName)
	{
		$this->name = $newName;
	}
	
	public function findById($id)
	{

		$db = $this->getDb();
		
		$allRecords = $db->prepare('SELECT * FROM test WHERE id = :id');
		$allRecords->bindValue(':id', $id);
		$allRecords->execute();
 
		print_r($allRecords->fetchObject());
		
		var_dump($db);
	}

}