<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'lib/Smarty.class.php';

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header('Location: login.inc.php');
    exit;
}

$smarty = new smartyEscaped(); // Create a new instance of smartyEscaped
$smarty->assign('app_name', 'myTranslate'); 

// Get the current user's details from the database
$stmt = $conn->prepare('SELECT u.*, l.language_name FROM users AS u LEFT JOIN language AS l ON u.language_id = l.id WHERE u.id = ?');
$stmt->bind_param('i', $_SESSION['user_id']);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $user['name'] = $user['name'] ?? ''; 
    $user['email'] = $user['email'] ?? '';
    $user['language_name'] = $user['language_name'] ?? '';
    $smarty->assign('user', $user);
}

// Handle form submission for updating user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form data
    if (!empty($password) && !empty($confirm_password) && $password !== $confirm_password) {
        $smarty->assign('error', 'Passwords do not match.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $smarty->assign('error', 'Invalid email address.');
    } elseif (!empty($password) && (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/', $password))) {
        $smarty->assign('error', 'The password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.');
    } else {
        // Only hash and update the password if it's not empty
        if (!empty($password)) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            // Update the user's details in the database including password
            $stmt = $conn->prepare('UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?');
            $stmt->bind_param('sssi', $name, $email, $password, $_SESSION['user_id']);
        } else {
            // Update the user's details in the database without password
            $stmt = $conn->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
            $stmt->bind_param('ssi', $name, $email, $_SESSION['user_id']);
        }

        if ($stmt->execute()) {
            $_SESSION['user_name'] = $name;
            $smarty->assign('success', 'Your account details have been successfully updated.');
        } else {
            $smarty->assign('error', 'An error occurred while updating your account details.');
        }
    }
}

// Retrieve the top teachers
$topTeachers = getTopTeachers($conn);

// Define header variables
$header_brand_link = 'myAccount.inc.php';

// Assign header links for smartyEscaped template
$header_links = [
    ['url' => ($_SESSION['user_role'] == 'student') ? 'studentLanding.inc.php' : 'teacherLanding.inc.php', 'label' => 'Home Page'],
    ['url' => 'about.inc.php', 'label' => 'Our Team'],
    ['url' => 'logout.inc.php', 'label' => 'Log Out']
];

// Assign variables to smartyEscaped template
$smarty->assign('header_brand_link', $header_brand_link);
$smarty->assign('header_links', $header_links);
$smarty->assign('topTeachers', $topTeachers);

// Display the my account page
$smarty->display(dirname(__FILE__) . '/templates/myAccount.tpl');
?>
