<?php
require_once('includes/config.php');
require_once('classes/adminClass.inc.php');

// Create an instance of the adminClass and pass the database connection object
$adminClass = new adminClass($conn);

// Retrieve the top teachers
$topTeachers = getTopTeachers($conn);

// Assign the top teachers to the template
$smarty->assign('topTeachers', $topTeachers);

// Handle student edit
$response = $adminClass->handleStudentEdit();
if($response)
{
    if ($response == 1) {
        $smarty->assign('success', 'Student Data updated successfully');
    } else {
        $smarty->assign('error', 'An error occurred while updating the student data. Please try again.');
    }
}
// Handle teacher edit
$response = $adminClass->handleTeacherEdit();
if($response)
{
    if ($response == 1) {
        $smarty->assign('success', 'Teacher Data updated successfully');
    } else {
        $smarty->assign('error', 'An error occurred while updating the teacher data. Please try again.');
    }
}
// Handle order deletion
$response = $adminClass->handleOrderDeletion();
if($response)
{
    if ($response == 1) {
        $smarty->assign('success', 'Order Data deleted successfully');
    } else {
        $smarty->assign('error', 'An error occurred while deleting the order. Please try again.');
    }
}

// Retrieve students, teachers, and orders
$students = $adminClass->getStudents();
$teachers = $adminClass->getTeachers();
$orders = $adminClass->getOrders();

// Display the Smarty template
$smarty->assign('students', $students);
$smarty->assign('teachers', $teachers);
$smarty->assign('orders', $orders);
$smarty->assign('user_name', $_SESSION['user_name']);

// Assign header brand link and links for Smarty template
$smarty->assign('header_brand_link', 'adminLanding.inc.php');
$smarty->assign('header_links', [
    ['url' => 'adminLanding.inc.php', 'label' => 'Home Page'],
    ['url' => 'about.inc.php', 'label' => 'Our Team'],
    ['url' => 'login.inc.php', 'label' => 'Log Out']
]);

// Display the admin landing page
$smarty->display(dirname(__FILE__) . '/templates/adminLanding.tpl');
?>
