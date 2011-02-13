<?php

class Connection {
	
	private $connection;
	
	public function __construct($database) {
		
		$database['host'] 		= 'localhost';
		$database['username'] = 'legacy_code';
		$database['password'] = 'legacy_code';
		$database['name'] 		= 'contacts';
		
		$this->connection = @mysql_connect($database['host'], $database['username'], $database['password']) or die('Can\'t connect do database');
		@mysql_select_db($database['name']) or die('The database selected does not exists');
		
		return $this->connection;
	}
	
	public function close() {
		mysql_close($this->connection);
	}
	
}


?>