<?php

define('DATABASE_HOST', 'localhost');
define('DATABASE_USERNAME', 'legacy_code');
define('DATABASE_PASSWORD', 'legacy_code');
define('DATABASE_NAME', 'contacts');

error_reporting(0);

require_once('functions.php');

include_once(dirname(__FILE__).'/lib/Connection.php');
include_once(dirname(__FILE__).'/lib/Contact.php');
include_once(dirname(__FILE__).'/lib/ContactTable.php');

?>