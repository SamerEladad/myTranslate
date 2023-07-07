<?php
require_once('includes/config.php');
require 'classes/passwordResetClass.inc.php';

// Create an instance of the passwordResetClass class
$passwordReset = new passwordResetClass($conn, $smarty);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get email from form
    $email = $_POST['email'];

    // Call the sendResetLink method from the passwordResetClass class
    $passwordReset->sendResetLink($email);
}

// Display the forgot password page
$smarty->display(dirname(__FILE__) . '/templates/forgotPassword.tpl');
