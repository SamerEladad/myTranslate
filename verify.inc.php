<?php
require_once('includes/config.php');

// Check if a verification code was provided in the URL
if (isset($_GET['code'])) {
    // Get the verification code from the URL
    $code = $_GET['code'];

    // Prepare a SQL statement to select the user ID from the database where the verification code matches and the user is not yet verified
    $stmt = $conn->prepare("SELECT id FROM users WHERE code = ? AND verified = 0");

    // Bind the verification code parameter to the SQL statement
    $stmt->bind_param("s", $code);

    $stmt->execute();

    $result = $stmt->get_result();

    // Check if the SQL statement returned any rows
    if ($result->num_rows > 0) {
        // If there are rows, prepare a SQL statement to update the user's verification status and remove the verification code
        $update_stmt = $conn->prepare("UPDATE users SET verified = 1, code = NULL WHERE code = ?");

        // Bind the verification code parameter to the SQL statement
        $update_stmt->bind_param("s", $code);
        
        if ($update_stmt->execute()) {
            // If the SQL statement executed successfully, assign a success message to the template
            $smarty->assign('success', "Your email has been successfully verified.");
        } else {
            // If the SQL statement did not execute successfully, assign an error message to the template
            $smarty->assign('error', "An error occurred while verifying your email.");
        }
    } else {
        // If the SQL statement did not return any rows, assign an error message to the template
        $smarty->assign('error', "Invalid or expired verification link.");
    }
} else {
    // If no verification code was provided in the URL, assign an error message to the template
    $smarty->assign('error', "Invalid request.");
}

// Display the verify page
$smarty->display(dirname(__FILE__) . '/templates/verify.tpl');
