<?php

class Contact {
	
	private $id;
	private $firstname;
	private $lastname;
	private $phone;
	private $mobile;
	
	/**
	 * costruttore
	 * @param array $array: array associativo del tipo Array ( [id] => 1 [firstname] => Jacopo [lastname] => Romei [phone] => 0543123543 [mobile] => 34012345 )
	 */
	public function __construct(Array $array = Array()) {
		if (is_array($array) && count($array) > 0)
		{
			$this->hydrate($array);
		}		
	}
	
	/**
	 * idrata l'oggetto da un array, tipicamente un array associativo ricavato da mysql_fetch_assoc()
	 * @param Array $array: array associativo del tipo Array ( [id] => 1 [firstname] => Jacopo [lastname] => Romei [phone] => 0543123543 [mobile] => 34012345 )
	 */
	public function hydrate(array $array = Array()) {
		if (is_array($array))
		{
			$this->id					= $array['id'];
			$this->firstname	= $array['firstname'];
			$this->lastname		= $array['lastname'];
			$this->phone			= $array['phone'];
			$this->mobile			= $array['mobile'];
		}
	}
	
	public function getId() {
		return $this->id;
	}
	public function getFirstname() {
		return $this->firstname;
	}
	public function getLastname() {
		return $this->lastname;
	}
	public function getPhone() {
		return $this->phone;
	}
	public function getMobile() {
		return $this->mobile;
	}
	
	public function setId($v) {
		return $this->id = $v;
	}
	public function setFirstname($v) {
		return $this->firstname = $v;
	}
	public function setLastname($v) {
		return $this->lastname = $v;
	}
	public function setPhone($v) {
		return $this->phone = $v;
	}
	public function setMobile($v) {
		return $this->mobile = $v;
	}

	public function isNew() {
		return $this->getId() === null || $this->getId() == '';
	}
	
	public function save() {
		return ContactTable::save($this);
	}
	
	public function delete() {
		return ContactTable::delete($this);
	}
	
}
?>