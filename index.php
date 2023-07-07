<?php
// Include configuration file
require_once('includes/config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Display the main page
$smarty->display(dirname(__FILE__) . '/templates/index.tpl');
?>
