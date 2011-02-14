<?php
	require_once(dirname(__FILE__).'/../config.php');
	require_once(dirname(__FILE__).'/../PHPUnit/Framework.php');


class ContactTest extends PHPUnit_Framework_TestCase
{
	/**
	 * testa la presenza degli attributi
	 */
	public function testAttributes()
	{
		$this->assertClassHasAttribute('id', 'Contact');
		$this->assertClassHasAttribute('firstname', 'Contact');
		$this->assertClassHasAttribute('lastname', 'Contact');
		$this->assertClassHasAttribute('phone', 'Contact');
		$this->assertClassHasAttribute('mobile', 'Contact');
	}
	
	/**
	 * costruisce un oggetto Contact da un array
	 */
	public function testConstuctFromArray()
	{
		$array = array('id' => 1, 'firstname' => 'Mario', 'lastname' => 'Rossi', 'phone' => '024576234', 'mobile' => '3478234916');
		$contact = new Contact($array);
		$this->assertEquals(1, $contact->getId());
		$this->assertEquals('Mario', $contact->getFirstname());
		$this->assertEquals('Rossi', $contact->getLastname());
		$this->assertEquals('024576234', $contact->getPhone());
		$this->assertEquals('3478234916', $contact->getMobile());
	}
	
	/**
	 * idrata un oggetto Contact da un array
	 */
	public function testHydrateFromFullArray()
	{
		$array = array('id' => 1, 'firstname' => 'Mario', 'lastname' => 'Rossi', 'phone' => '024576234', 'mobile' => '3478234916');
		$contact = new Contact();
		$contact->hydrate($array);
		$this->assertEquals(1, $contact->getId());
		$this->assertEquals('Mario', $contact->getFirstname());
		$this->assertEquals('Rossi', $contact->getLastname());
		$this->assertEquals('024576234', $contact->getPhone());
		$this->assertEquals('3478234916', $contact->getMobile());
	}
	
	/**
	 * idrata un oggetto Contact da un array vuoto
	 */
	public function testHydrateFromEmptyArray()
	{
		$contact = new Contact();
		$contact->hydrate();
		$this->assertNull($contact->getId());
		$this->assertNull($contact->getFirstname());
		$this->assertNull($contact->getLastname());
		$this->assertNull($contact->getPhone());
		$this->assertNull($contact->getMobile());		
	}
	

	/**
	 * testa i metodi get()
	 */
	public function testGet()
	{
		$array = array('id' => 1, 'firstname' => 'Mario', 'lastname' => 'Rossi', 'phone' => '024576234', 'mobile' => '3478234916');
		$contact = new Contact($array);
		$this->assertEquals(1, $contact->getId());
		$this->assertEquals('Mario', $contact->getFirstname());
		$this->assertEquals('Rossi', $contact->getLastname());
		$this->assertEquals('024576234', $contact->getPhone());
		$this->assertEquals('3478234916', $contact->getMobile());
	}
	
	/**
	 * testa i metodi set()
	 */
	public function testSet()
	{
		$contact = new Contact();
		$contact->setId(1);
		$contact->setFirstname('Mario');
		$contact->setLastname('Rossi');
		$contact->setPhone('024576234');
		$contact->setMobile('3478234916');
		$this->assertEquals(1, $contact->getId());
		$this->assertEquals('Mario', $contact->getFirstname());
		$this->assertEquals('Rossi', $contact->getLastname());
		$this->assertEquals('024576234', $contact->getPhone());
		$this->assertEquals('3478234916', $contact->getMobile());
	}	
	
	/**
	 * verifica se un contatto creato senza parametri è nuovo
	 */
	public function testIsNewEmptyContact()
	{
		$contact = new Contact();
		$this->assertTrue($contact->isNew());
	}
	
	/**
	 * verifica se un contatto è nuovo
	 * al costruttore vengono passati:
	 * - un array con il valore "" corrispondente alla chiave "id"
	 * - un array senza la chiave "id"
	 * - un array vuoto
	 */
	public function testIsNewFromInvalidId()
	{
		$array = array('id' => '', 'firstname' => 'Mario', 'lastname' => 'Rossi', 'phone' => '024576234', 'mobile' => '3478234916');
		$contact = new Contact($array);
		$this->assertTrue($contact->isNew());
		
		$array = array('firstname' => 'Mario', 'lastname' => 'Rossi', 'phone' => '024576234', 'mobile' => '3478234916');
		$contact = new Contact($array);
		$this->assertTrue($contact->isNew());
		
		$array = array();
		$contact = new Contact($array);
		$this->assertTrue($contact->isNew());
	}
	
	/**
	 * verifica se un contatto creato a partire da array contenenti almeno il valore corrispondente alla chiave "id" è nuovo
	 */
	public function testIsNewFromValidId()
	{
		$array = array('id' => 1, 'firstname' => 'Mario', 'lastname' => 'Rossi', 'phone' => '024576234', 'mobile' => '3478234916');
		$contact = new Contact($array);
		$this->assertTrue(!$contact->isNew());
		
		$array = array('id' => 1);
		$contact = new Contact($array);
		$this->assertTrue(!$contact->isNew());
	}
	
        
}

?>