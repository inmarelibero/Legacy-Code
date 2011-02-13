<?php
include_once('config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $errors = validate(array('firstname', 'lastname', 'phone'), $_POST);
  
  if(count($errors) == 0)
  {
  	$contact = new Contact($_POST);
  	$contact->save();

    header('Location: index.php');
    
  }
}
?>

<?php include_once('header.php') ?>

<?php include_once('_form.php') ?>

<?php include_once('footer.php') ?>