<?php

class Connection {
	
	private $connection;
	
	public function __construct($database) {
		$this->connection = @mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD) or die('Can\'t connect do database');
		@mysql_select_db(DATABASE_NAME) or die('The database selected does not exists');
		return $this->connection;
	}
	
	public function close() {
		return mysql_close($this->connection);
	}
	
}


?>