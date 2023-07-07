<?php
require_once 'includes/config.php';

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $reset_code = $_GET['reset'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // If reset code is not set, redirect to forgotPassword.inc.php
    if (!isset($_GET['reset']) || !isset($_GET['password']) || !isset($_GET['confirm_password'])) {
        header('Location: forgotPassword.inc.php');
        exit();
    }

    // Assign the reset code to the Smarty template
    $smarty->assign('reset_code', $_GET['reset']);

    // Validate form data
    if ($password !== $confirm_password) {
        $smarty->assign('error', 'Passwords do not match.');
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/', $password)) {
        $smarty->assign('error', 'The password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.');
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update user's password and set reset code to NULL
        $stmt = $conn->prepare("UPDATE users SET password = ?, reset_code = NULL WHERE reset_code = ?");
        $stmt->bind_param("ss", $hashed_password, $reset_code);

        // Execute the update query and show success message
        if ($stmt->execute()) {
            $smarty->assign('success', 'Your password has been updated.');
        } else {
            // Show error message if update query fails
            $smarty->assign('error', 'An error occurred. Please try again.');
        }
    }
} else {
    // If reset code is not set, redirect to forgotPassword.inc.php
    if (!isset($_GET['reset'])) {
        header('Location: forgotPassword.inc.php');
        exit();
    }

    // Assign the reset code to the Smarty template
    $smarty->assign('reset_code', $_GET['reset']);
}

// Display the change password page
$smarty->display(dirname(__FILE__) . '/templates/changePassword.tpl');
?>
