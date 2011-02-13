<?php
include_once('functions.php');
include_once('lib/ContactTable.php');
include_once('lib/Contact.php');


$contact_table = new ContactTable();
$arr_contacts = $contact_table->getAll();
?>

<?php include_once('header.php') ?>

<div class="actions">
  <a href="new.php">New contact</a>
 </div>
 
<?php if (count($arr_contacts)>0) : ?>
  <table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Phone</th>
    <th>Mobile</th>
    <th>&nbsp;</th>
  </tr>
  <?php foreach($arr_contacts as $contact) :?>
    <tr>
      <td><a href="edit.php?id=<?php echo $contact->getId()?>" title="Modifica"><?php echo $contact->getLastname()?></a></td>
      <td><?php echo $contact->getFirstname()?></a></td>
      <td><a href="callto://<?php echo $contact->getPhone()?>"><?php echo $contact->getPhone()?></a></td>
      <td><a href="callto://<?php echo $contact->getMobile()?>"><?php echo $contact->getMobile()?></a></td>
      <td>[<a href="remove.php?id=<?php echo $contact->getId()?>" title="Elimina" onclick="if (confirm('Are you sure?')) {return true;} return false;">X</a>]</td>
    </tr>
  <?php endforeach;?>
  </table>

 <?php else: ?>
  Database is empty
<?php endif ?>

<?php include_once('footer.php') ?>