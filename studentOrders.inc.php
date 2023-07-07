<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/studentClass.inc.php';

// Redirect user to login page if not logged in or not a student
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
    header('Location: login.inc.php');
    exit;
}

// Create an instance of the studentClass and pass the database connection object
$studentClass = new studentClass($conn);

// Retrieve the top teachers
$topTeachers = getTopTeachers($conn);

// Assign the top teachers to the template
$smarty->assign('topTeachers', $topTeachers);

// Get orders for the logged-in student
$studentId = $_SESSION['user_id'];
$orders = $studentClass->getStudentOrders($studentId);

// Assign orders and user name to Smarty template variables
$smarty->assign('orders', $orders);
$smarty->assign('user_name', $_SESSION['user_name']);

// Assign header brand link and links for Smarty template
$smarty->assign('header_brand_link', 'studentLanding.inc.php');
$smarty->assign('header_links', [
    ['url' => 'studentLanding.inc.php', 'label' => 'Home Page'],
    ['url' => 'myAccount.inc.php', 'label' => 'My Account'],
    ['url' => 'about.inc.php', 'label' => 'Our Team'],
    ['url' => 'logout.inc.php', 'label' => 'Log Out']
]);

// Display the student orders page
$smarty->display(dirname(__FILE__) . '/templates/studentOrders.tpl');
?>
