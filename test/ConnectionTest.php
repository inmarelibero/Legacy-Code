<?php
	require_once(dirname(__FILE__).'/../config.php');
	require_once(dirname(__FILE__).'/../PHPUnit/Framework.php');


class ConnectionTest extends PHPUnit_Framework_TestCase
{
	
	public function testConnection()
	{
		$connection = new Connection();
    $this->assertFalse(!$connection);
    $connection->close();
	}
	
	public function testCloseConnection()
	{
		$connection = new Connection();
    $this->assertTrue($connection->close());
	}
        
}


?>