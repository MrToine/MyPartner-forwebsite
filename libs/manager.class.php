<?php
/*
|-----------------------------------------------------------------------------------
| Auteur : Anthony VIOLET
| Date : 14/10/2014
| Commentaire : Page contenant la classe manager du script. Elle fait le lien entre
|				la base de données et le script.
|-----------------------------------------------------------------------------------
*/

class Manager{

	protected $table = "partners";
	private $_db;

	public function __construct($db){

		$this->setDb($db);

	}

	public function get($id){

		$query = $this->_db->prepare('SELECT * FROM '.$this->table.' WHERE `id` = :id');
		$query->execute(array('id' => $id));
		$data = $query->fetch();
		$query->closeCursor();

		return $data;

	}

	public function verificate($name, $password){

		$query = $this->_db->prepare('SELECT `name`, `password` FROM `'.$this->table.'` WHERE `name` = :name AND `password` = :password');
		$query->execute(array('name' => $name, 'password' => $password));
		$data = $query->rowCount();
		$query->closeCursor();

		return $data;

	}

	public function get_list(){

		$query = $this->_db->prepare('SELECT * FROM '.$this->table.' ORDER BY `ups` DESC');
		$query->execute();
		$data = $query->fetchAll();
		$query->closeCursor();

		return $data;

	}

	public function verificate_ip($id){

		$query = $this->_db->prepare('SELECT `ip` FROM '.$this->table.' WHERE `id` = :id');
		$query->execute(array('id' => $id));
		$data = $query->fetch();
		$query->closeCursor();

		return $data;
		
	}

	public function out($id){

		$query = $this->_db->prepare('UPDATE '.$this->table.' SET `downs` = `downs`+1 WHERE `id` = :id');
		$query->execute(array('id' => $id));
		$query->closeCursor();

		return $query;

	}

	public function in($id){

		$query = $this->_db->prepare('UPDATE '.$this->table.' SET `ups` = `ups`+1 WHERE `id` = :id');
		$query->execute(array('id' => $id));
		$query->closeCursor();

	}
	
	public function create($name, $password, $link, $description, $logo, $ip){

		$query = $this->_db->prepare('INSERT INTO '.$this->table.' (`name`,`password`,`link`, `description`, `logo`,`ip`) VALUES(:name, :password, :link, :description, :logo, :ip)');
		$query->execute(array(
			':name' => $name,
			':password' => $password,
			':link' => $link,
			':description' => $description,
			':logo' => $logo,
			':ip' => $ip
		));
		$query->closeCursor();

		$lastId = $this->_db->lastInsertId();

		return $lastId;

	}

	public function setDb(PDO $db){

		$this->_db = $db;

	}

}