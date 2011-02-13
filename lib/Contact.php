<?php
class Contact {
	
	private $id;
	private $firstname;
	private $lastname;
	private $phone;
	private $mobile;
	
	public function hydrate($query_row) {
		if(is_array($query_row)) {
			$this->id					= $query_row['id'];
			$this->firstname	= $query_row['firstname'];
			$this->lastname		= $query_row['lastname'];
			$this->phone			= $query_row['phone'];
			$this->mobile			= $query_row['mobile'];
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
	
}
?>