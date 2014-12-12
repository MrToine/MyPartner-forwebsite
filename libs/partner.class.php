<?php
/*
|-----------------------------------------------------------------------------------
| Auteur : Anthony VIOLET
| Date : 14/10/2014
| Commentaire : Page contenant la classe principal du script.
|-----------------------------------------------------------------------------------
*/

class Partner{

	private $_id;
	private $_name;
	private $_password;
	private $_link;
	private $_description;
	private $_logo;
	private $_ups;
	private $_downs;
	private $_ip;

	public function __construct(array $donnees){

		$this->hydrate($donnees);

	}

	public function hydrate(array $donnees){

		foreach ($donnees as $key => $value) {
			
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method)){

				$this->$method($value);

			}

		}

	}

	public function id(){

		return $this->_id;

	}

	public function name(){

		return $this->_name;
		
	}

	public function password(){

		return $this->_password;
		
	}

	public function link(){

		return $this->_link;
		
	}

	public function desccription(){

		return $this->_description;
		
	}

	public function logo(){

		return $this->_logo;
		
	}

	public function ups(){

		return $this->_ups;
		
	}

	public function downs(){

		return $this->_downs;
		
	}

	public function ip(){

		return $this->_ip;

	}

	public function setId($id){

		$id = (int) $id;

		if($id > 0){

			$this->_id = $id;

		}

	}

	public function setName($name){

		if(is_string($name)){

			$this->_name = htmlspecialchars($name);

		}

	}

	public function setPassword($password){

		$this->_password = htmlspecialchars($password);

	}

	public function setLink($link){

		$this->_link = htmlspecialchars($link);

	}

	public function setDescription($description){

		$this->_description = htmlspecialchars($description);

	}

	public function setLogo($logo){

		$this->_logo = htmlspecialchars($logo);

	}

	public function setUps($ups){

		$ups = (int) $ups;

		if(is_int($ups)){

			$this->_ups = htmlspecialchars($ups);

		}

	}

	public function setDowns($downs){

		$downs = (int) $downs;

		if(is_int($downs)){

			$this->_downs = htmlspecialchars($downs);

		}

	}

	public function setIp($ip){

		$this->_ip = $ip;

	}

}