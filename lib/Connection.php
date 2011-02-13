<?php

class Connection {
	
	private $connection;
	
	public function __construct($database) {
		$this->connection = @mysql_connect($database['host'], $database['username'], $database['password']) or die('Can\'t connect do database');
		@mysql_select_db($database['name']) or die('The database selected does not exists');
		
		return $this->connection;
	}
	
	public function close() {
		mysql_close($this->connection);
	}
	
}


?>