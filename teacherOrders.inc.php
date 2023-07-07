<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/teacherClass.inc.php';

// Check if the user is logged in and a teacher, if not, redirect to the login page
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'teacher') {
    header('Location: login.inc.php');
    exit;
}

// Create an instance of the teacherClass and pass the database connection object
$teacherClass = new teacherClass($conn);

// Retrieve the top teachers
$topTeachers = getTopTeachers($conn);

// Assign the top teachers to the template
$smarty->assign('topTeachers', $topTeachers);

// Retrieve orders for the teacher's translated language
$translatedLanguageId = $_SESSION['user_language_id'];
$teacherId = $_SESSION['user_id'];
$orders = $teacherClass->getTeacherOrders($translatedLanguageId, $teacherId);

// Assign orders and user name to Smarty template variables
$smarty->assign('orders', $orders);
$smarty->assign('user_name', $_SESSION['user_name']);

// Assign header brand link and links for Smarty template
$smarty->assign('header_brand_link', 'teacherLanding.inc.php');
$smarty->assign('header_links', [
    ['url' => 'teacherLanding.inc.php', 'label' => 'Home Page'],
    ['url' => 'myAccount.inc.php', 'label' => 'My Account'],
    ['url' => 'about.inc.php', 'label' => 'Our Team'],
    ['url' => 'logout.inc.php', 'label' => 'Log Out']
]);

// Display the teacher orders page
$smarty->display(dirname(__FILE__) . '/templates/teacherOrders.tpl');
?>
