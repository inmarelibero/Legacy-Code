<?php

class Connection {
	
	private $connection;
	
	public function __construct($database) {
		$this->connection = @mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD);
		
		if ($this->connection)
		{
			@mysql_select_db(DATABASE_NAME);
			return $this->connection;
		}
		
		return false;
	}
	
	public function close() {
		return mysql_close($this->connection);
	}
	
}

?>