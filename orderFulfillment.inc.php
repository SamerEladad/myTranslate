<?php
// Start a PHP session
//session_start();

require_once('includes/config.php');

// Redirect to login page if user is not logged in or is not a teacher
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'teacher') {
    header("Location: login.inc.php");
    exit;
}

// Redirect to teacher landing page if no order ID is provided in the URL
if (!isset($_GET['order_id'])) {
    header("Location: teacherLanding.inc.php");
    exit;
}

// Retrieve the top teachers
$topTeachers = getTopTeachers($conn);

// Assign the top teachers to the template
$smarty->assign('topTeachers', $topTeachers);

// Get order ID from URL
$order_id = (int)$_GET['order_id'];

// Get completed status ID from status table
$stmt = $conn->prepare("SELECT id FROM status WHERE status_name = 'completed'");
$stmt->execute();
$result = $stmt->get_result();
$status_id = $result->fetch_assoc()['id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['translated_text'])) {
    $order_id = $_POST['order_id'];
    $translated_text = $_POST['translated_text'];
    $teacher_id = $_SESSION['user_id'];

    // Update the order status, translated_text, and teacher_id in the database
    $stmt = $conn->prepare("UPDATE orders SET status_id = ?, translated_text = ?, teacher_id = ? WHERE id = ?");
    $stmt->bind_param("isii", $status_id, $translated_text, $teacher_id, $order_id);
    
    // Count characters in translated_text
        $characterCount = strlen($translated_text);

        // Calculate points based on character count
        $points = ceil($characterCount / 100);

        // Update orders table
        $stmt->execute();

        // Check if teacher_id exists in teachers_points table
        $checkStmt = $conn->prepare("SELECT id FROM teacher_points WHERE teacher_id = ?");
        $checkStmt->bind_param("i", $teacher_id);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
        // Update existing record in teachers_points table
        $updateStmt = $conn->prepare("UPDATE teacher_points SET points = points + ? WHERE teacher_id = ?");
        $updateStmt->bind_param("ii", $points, $teacher_id);
        $updateStmt->execute();
        } else {
        // Insert new record in teachers_points table
        $insertStmt = $conn->prepare("INSERT INTO teacher_points (teacher_id, points) VALUES (?, ?)");
        $insertStmt->bind_param("ii", $teacher_id, $points);
        $insertStmt->execute();
        }

    if ($stmt->execute()) {
        // If order is successfully updated, display success message
        $smarty->assign('success', 'Order successfully completed.');
    } else {
        // If order is not successfully updated, display error message
        $smarty->assign('error', 'An error occurred while updating the order. Please try again.');
    }
}

// Get order details from the database
$stmt = $conn->prepare("SELECT orders.*, source_lang.language_name as source_language, target_lang.language_name as translated_language, status.status_name as status 
                        FROM orders 
                        INNER JOIN language as source_lang ON orders.source_language_id = source_lang.id
                        INNER JOIN language as target_lang ON orders.translated_language_id = target_lang.id
                        INNER JOIN status ON orders.status_id = status.id
                        WHERE orders.id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // If the order exists, assign it to a Smarty template variable
    $order = $result->fetch_assoc();
    $smarty->assign('order', $order);
} else {
    // If the order does not exist, redirect to the teacher landing page
    header("Location: teacherLanding.inc.php");
    exit;
}

// Assign header brand link and links for Smarty template
$smarty->assign('header_brand_link', 'teacherLanding.inc.php');
$smarty->assign('header_links', [
    ['url' => 'teacherLanding.inc.php', 'label' => 'Home Page'],
    ['url' => 'myAccount.inc.php', 'label' => 'My Account'],
    ['url' => 'teacherOrders.inc.php', 'label' => 'View Orders'],
    ['url' => 'about.inc.php', 'label' => 'Our Team'],
    ['url' => 'logout.inc.php', 'label' => 'Log Out']
]);

// Display the order fulfillment page
$smarty->display(dirname(__FILE__) . '/templates/orderFulfillment.tpl');
?>
