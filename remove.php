<?php
include_once('config.php');

$contact = ContactTable::getById($_GET['id']);
if($contact)
{
	$contact->delete();
}
else
{
	die('il contatto con id = '.$_GET['id'].' non esiste');
}

header('Location: index.php');

?>