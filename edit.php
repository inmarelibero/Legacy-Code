<?php

include_once('config.php');

if(!$_GET['id'])
{
 die('Some error occured!!');
}

//$db = @mysql_connect($database['host'], $database['username'], $database['password']) or die('Can\'t connect do database');
//@mysql_select_db($database['name']) or die('The database selected does not exists');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $errors = validate(array('id', 'firstname', 'lastname', 'phone'), $_POST);
  
  if(count($errors) == 0)
  {
  	$contact = new Contact($_POST);
  	$contact->save();
    
    header('Location: index.php');
  }
}
else 
{
	$contact = ContactTable::getById($_GET['id']);
	
	if($contact) {
	  $_POST['id']				= $contact->getId();
	  $_POST['firstname']	= $contact->getFirstname();
	  $_POST['lastname']	= $contact->getLastname();
	  $_POST['phone']			= $contact->getPhone();
	  $_POST['mobile']		= $contact->getMobile();
	} else {
		die('il contatto con id = '.$_GET['id'].' non esiste');
	}
}

mysql_close($db);

?>

<?php include_once('header.php') ?>

<?php include_once('_form.php') ?>

<?php include_once('footer.php') ?>