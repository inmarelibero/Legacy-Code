<?php

include_once(dirname(__FILE__).'/Connection.php');

class ContactTable {
	
	public function getAll() {
		$c = new Connection();
		
		$query = 'SELECT * FROM contacts ORDER BY lastname';
		$rs = mysql_query($query);
		$c->close();
		
		if (!$rs) {
		  die_with_error(mysql_error(), $query);
		}
		
		return $rs;
	}
	
}
?>