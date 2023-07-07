<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/teacherClass.inc.php';

// Check if user is logged in as teacher, if not redirect to login page
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

// Retrieve points from teachers_points table
$teacherId = $_SESSION['user_id'];
$points = $teacherClass->getTeacherPoints($teacherId);

// Retrieve pending orders for the teacher's translated language
$translatedLanguageId = $_SESSION['user_language_id'];
$orders = $teacherClass->getPendingOrders($translatedLanguageId);

// Set the current order to the first order in the list or the value from GET parameters
$currentOrder = isset($_GET['current_order']) ? intval($_GET['current_order']) : 0;

// Update the current order based on the user's navigation
if (isset($_GET['next']) && $currentOrder < count($orders) - 1) {
    $currentOrder++;
}

if (isset($_GET['prev']) && $currentOrder > 0) {
    $currentOrder--;
}

// Assign header brand link and links for Smarty template
$smarty->assign('header_brand_link', 'teacherLanding.inc.php');
$smarty->assign('header_links', [
    ['url' => 'teacherLanding.inc.php', 'label' => 'Home Page'],
    ['url' => 'teacherOrders.inc.php', 'label' => 'View Orders'],
    ['url' => 'myAccount.inc.php', 'label' => 'My Account'],
    ['url' => 'about.inc.php', 'label' => 'Our Team'],
    ['url' => 'logout.inc.php', 'label' => 'Log Out']
]);

// Assign variables to the template
$smarty->assign('orders', $orders);
$smarty->assign('current_order', $currentOrder);
$smarty->assign('user_name', $_SESSION['user_name']);
$smarty->assign('points', $points);

// Display the teacher landing page
$smarty->display(dirname(__FILE__) . '/templates/teacherLanding.tpl');
?>
