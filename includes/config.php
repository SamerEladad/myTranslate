<?php
session_start();
require_once(dirname(__FILE__) . '/../lib/Smarty.class.php');
require_once(dirname(__FILE__) . '/../includes/database.php');
// Include smartyEscaped class for XSS protection
require_once(dirname(__FILE__) . '/../classes/smartyEscaped.inc.php');

// Display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$smarty = new smartyEscaped();

$smarty->setTemplateDir(dirname(__FILE__) . '/../templates/');
$smarty->setCompileDir(dirname(__FILE__) . '/../templates_c/');
$smarty->setCacheDir(dirname(__FILE__) . '/../cache/');
$smarty->setConfigDir(dirname(__FILE__) . '/../configs/');

if (isset($_SESSION['error_message'])) {
    echo 'There is an error somewhere';
}

function getTopTeachers($conn) {
    // Prepare a SQL statement to select the top 3 teachers based on points
    $topTeachersStmt = $conn->prepare("SELECT tp.teacher_id, u.name, tp.points FROM teacher_points AS tp INNER JOIN users AS u ON tp.teacher_id = u.id ORDER BY tp.points DESC LIMIT 3");
    $topTeachersStmt->execute();
    $topTeachersResult = $topTeachersStmt->get_result();
    
    $topTeachers = array();
    
    // Loop through the result set and add each teacher to the array
    while ($row = $topTeachersResult->fetch_assoc()) {
        $teacher = array(
            'teacher_id' => $row['teacher_id'],
            'name' => $row['name'],
            'points' => $row['points']
        );
        $topTeachers[] = $teacher;
    }
    
    $topTeachersStmt->close();
    
    return $topTeachers;
}

$smarty->caching = smartyEscaped::CACHING_LIFETIME_CURRENT;
$smarty->assign('app_name', 'myTranslate');
$smarty->caching = false;
$smarty->cache_lifetime = 0;
//$smarty->assign('smarty', array('session' => $_SESSION));
?>
