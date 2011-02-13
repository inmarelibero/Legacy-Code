<?php

include_once(dirname(__FILE__).'/Connection.php');

class ContactTable {
	
	public function getAll() {
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
	
}
?>