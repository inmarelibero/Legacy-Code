<?php

include_once(dirname(__FILE__).'/Connection.php');

class ContactTable {
	
	public static function getAll() {
		$c = new Connection();
		
		$query = 'SELECT * FROM contacts ORDER BY lastname';
		$rs = mysql_query($query);
		
		$arr_output = array();
		while($row = mysql_fetch_assoc($rs)) {
			$contact = new Contact($row);
			//$contact->hydrate($row);
			array_push($arr_output, $contact);
		}
		
		$c->close();		
		if (!$rs)
		{
		  die_with_error(mysql_error(), $query);
		}
		
		return $arr_output;
	}
	
	public static function getById($id) {
		$c = new Connection();
		
		$query = sprintf('SELECT * FROM contacts WHERE id = %s', mysql_real_escape_string($id));
		$rs = mysql_query($query);
		
		if(mysql_num_rows($rs)>0) {
			// se ce n'è più di uno (eventualità impossibile) prende il primo
			return new Contact(mysql_fetch_assoc($rs));
		}
		return null;
	}
	
}
?>