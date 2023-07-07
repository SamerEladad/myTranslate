<?php
// Start a PHP session
//session_start();

require_once 'includes/config.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get email and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT users.id, users.name, users.email, users.password, role.role_name as role, language.language_name as language, language.id as language_id FROM users 
        LEFT JOIN role ON users.role_id = role.id 
        LEFT JOIN language ON users.language_id = language.id
        WHERE users.email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If email is found, get user data from database
        $user = $result->fetch_assoc();

        // Check if the password is correct
        if (password_verify($password, $user['password'])) {
            // If the password is correct, set session variables and redirect to appropriate landing page
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_language'] = $user['language'];
            $_SESSION['user_language_id'] = $user['language_id']; // store the language id in the session

            // Redirect to appropriate page based on user role
            $landing_page = '';
            if ($_SESSION['user_role'] === 'student') {
                $landing_page = 'studentLanding.inc.php';
            } elseif ($_SESSION['user_role'] === 'teacher') {
                $landing_page = 'teacherLanding.inc.php';
            }
            elseif ($_SESSION['user_role'] === 'admin') {
                $landing_page = 'adminLanding.inc.php';
            }
            header("Location: $landing_page");
            exit;
        } else {
            // If the password is incorrect, show error message
            $error_msg = 'Incorrect password.';
        }
    } else {
        // If email is not found, show error message
        $error_msg = 'Email not found.';
    }

    // Assign error message to Smarty template variable
    $smarty->assign('error', $error_msg);
}

// Display the login page
$smarty->display(dirname(__FILE__) . '/templates/login.tpl');
?>
