<?php
require_once 'includes/config.php';
require_once 'lib/Smarty.class.php';

// Retrieve the top teachers using the function from config.php
$topTeachers = getTopTeachers($conn);


$smarty = new smartyEscaped();

$smarty->assign('app_name', 'myTranslate');
// Assign the top teachers to the template
$smarty->assign('topTeachers', $topTeachers);

// Team Members
$members = [
    [
        'name' => 'Samer Eladad',
        'id' => 18334300,
        'email' => 'samer.eladad@stud.hs-bochum.de',
        'image' => 'assets/images/male.png'
    ],
    [
        'name' => 'Mohammad Al Kotob',
        'id' => 18313592,
        'email' => 'mohammad.al-kotob@stud.hs-bochum.de',
        'image' => 'assets/images/male.png'
    ],
    [
        'name' => 'Nada El Hadiyin',
        'id' => 18334173,
        'email' => 'nada.el-hadiyin@stud.hs-bochum.de',
        'image' => 'assets/images/female.png'
    ]
];

// Assign header brand link and links for Smarty template
$smarty->assign('header_brand_link', 'studentLanding.inc.php');
$smarty->assign('members', $members);

// Assign header links for Smarty template
$smarty->assign('header_links', [
    ['url' => ($_SESSION['user_role'] == 'student') ? 'studentLanding.inc.php' : 
              (($_SESSION['user_role'] == 'admin') ? 'adminLanding.inc.php' : 'teacherLanding.inc.php'),
     'label' => 'Home Page'],
    ['url' => 'javascript:history.back()', 'label' => 'Go back'],
    ['url' => 'logout.inc.php', 'label' => 'Log Out']
]);

// Display the about page
$smarty->display(dirname(__FILE__) . '/templates/about.tpl');
?>
