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
	public function __construct($array = array()) {
		if(is_array($array) && count($array)>0) {
			$this->hydrate($array);
		}		
	}
	
	/**
	 * idrata l'oggetto da un array, tipicamente un array associativo ricavato da mysql_fetch_assoc()
	 * @param array $array: array associativo del tipo Array ( [id] => 1 [firstname] => Jacopo [lastname] => Romei [phone] => 0543123543 [mobile] => 34012345 )
	 */
	public function hydrate($array) {
		if(is_array($array)) {
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
		$c			= new Connection();
		$query	= '';
		$rs			= false;
		
		if(!$this->isNew()) {
			$query = sprintf("UPDATE contacts set firstname = '%s', 
                                                                          lastname = '%s',
                                                                          phone = '%s', 
                                                                          mobile = '%s' WHERE id = %s",
                       mysql_real_escape_string($this->getFirstname()),
                       mysql_real_escape_string($this->getLastname()),
                       mysql_real_escape_string($this->getPhone()),
                       mysql_real_escape_string($this->getMobile()),
                       mysql_real_escape_string($this->getId())
                      );
		} else {
			$query = sprintf("INSERT INTO contacts (firstname, lastname, phone, mobile) VALUES ('%s', '%s', '%s', '%s')",
                       mysql_real_escape_string($this->getFirstname()),
                       mysql_real_escape_string($this->getLastname()),
                       mysql_real_escape_string($this->getPhone()),
                       mysql_real_escape_string($this->getMobile())
                       );
		}
		$rs = mysql_query($query); 
		
		if (!$rs)
    {
      die_with_error(mysql_error(), $query);
    }
		$c->close();
		return $rs;
	}
	
	public function delete() {
		if(!$this->isNew()) {
			$c = new Connection();
			
			$query = sprintf('DELETE FROM contacts where ID = %s',
                 mysql_real_escape_string($this->getId()));
			if(!mysql_query($query))
			{
			  die_with_error(mysql_error(), $query);
			}
			$c->close();
		}
	}
	
}
?>