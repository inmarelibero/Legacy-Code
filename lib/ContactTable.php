<?php

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
	
	/**
	 * salva nel database un oggetto del tipo Contact
	 * se l'oggetto esiste nel database lo aggiorna, altrimenti lo crea
	 * @param Contact $contact
	 */
	public static function save($contact) {
		if(get_class($contact) == 'Contact' && $contact !== null) {
			$c			= new Connection();
			$query	= '';
			$rs			= false;
			
			if(!$contact->isNew()) {
				$query = sprintf("UPDATE contacts set firstname = '%s', 
	                                                                          lastname = '%s',
	                                                                          phone = '%s', 
	                                                                          mobile = '%s' WHERE id = %s",
	                       mysql_real_escape_string($contact->getFirstname()),
	                       mysql_real_escape_string($contact->getLastname()),
	                       mysql_real_escape_string($contact->getPhone()),
	                       mysql_real_escape_string($contact->getMobile()),
	                       mysql_real_escape_string($contact->getId())
	                      );
			} else {
				$query = sprintf("INSERT INTO contacts (firstname, lastname, phone, mobile) VALUES ('%s', '%s', '%s', '%s')",
	                       mysql_real_escape_string($contact->getFirstname()),
	                       mysql_real_escape_string($contact->getLastname()),
	                       mysql_real_escape_string($contact->getPhone()),
	                       mysql_real_escape_string($contact->getMobile())
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
		return null;
	}
	
	public static function delete($contact) {
		if(get_class($contact) == 'Contact' && $contact !== null) {
			if(!$contact->isNew()) {
				$c = new Connection();
				
				$query = sprintf('DELETE FROM contacts where ID = %s',
	                 mysql_real_escape_string($contact->getId()));
				if(!mysql_query($query))
				{
				  die_with_error(mysql_error(), $query);
				}
				$c->close();
			}
		}
		return null;
	}
	
}
?>