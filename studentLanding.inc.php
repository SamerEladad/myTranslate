<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/studentClass.inc.php';

// Check if user is logged in as student, if not redirect to login page
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
    header('Location: login.inc.php');
    exit;
}

// Check if there is a success message, if so assign it to the template and unset it from the session
if (isset($_SESSION['order_success_message'])) {
    $smarty->assign('success', $_SESSION['order_success_message']);
    unset($_SESSION['order_success_message']);
}

// Create an instance of the studentClass and pass the database connection object
$studentClass = new studentClass($conn);

// Assign the user name to the template
$smarty->assign('user_name', $_SESSION['user_name']);

// Retrieve the top teachers
$topTeachers = getTopTeachers($conn);

// Assign the top teachers to the template
$smarty->assign('topTeachers', $topTeachers);

// Handle form submission for new order
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fromLanguageName = $_POST['from_language'];
    $toLanguageName = $_POST['to_language'];
    $sourceText = $_POST['source_text'];
    $studentId = $_SESSION['user_id'];

    // Get language ids based on names
    $fromLanguageId = $studentClass->getLanguageId($fromLanguageName);
    $toLanguageId = $studentClass->getLanguageId($toLanguageName);

    // Check if from_language and to_language are the same
    if ($fromLanguageId === $toLanguageId) {
        $smarty->assign('error', 'From and To languages cannot be the same.');
    } else {
        // Insert the order into the database
        if ($studentClass->createOrder($studentId, $sourceText, $fromLanguageId, $toLanguageId)) {
            // If an order was successfully created, display success message and redirect to student landing page
            $_SESSION['order_success_message'] = 'Your order has been successfully created.';
            header('Location: studentLanding.inc.php');
            exit;
        } else {
            // If an order was not successfully created, display error message
            $smarty->assign('error', 'An error occurred while creating the order.');
        }
    }
}

// Define header variables
$header_brand_link = 'studentLanding.inc.php';
$header_links = [
    ['url' => 'studentLanding.inc.php', 'label' => 'Home Page'],
    ['url' => 'studentOrders.inc.php', 'label' => 'View Orders'],
    ['url' => 'myAccount.inc.php', 'label' => 'My Account'],
    ['url' => 'about.inc.php', 'label' => 'Our Team'],
    ['url' => 'logout.inc.php', 'label' => 'Log Out']
];

// Assign header variables to Smarty template
$smarty->assign('header_brand_link', $header_brand_link);
$smarty->assign('header_links', $header_links);

// Display the student landing page
$smarty->display(dirname(__FILE__) . '/templates/studentLanding.tpl');
?>
