<?php
/* Smarty version 4.3.1, created on 2023-06-19 17:57:09
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/admin_landing.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64907ad5d7c801_45941027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5e81a1d5df637b70b6aa3ae46ab860e842af9d9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/admin_landing.tpl',
      1 => 1687189913,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64907ad5d7c801_45941027 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Landing - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Header and navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-header">
            <div class="container height-auto">
                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['header_brand_link']->value;?>
">myTranslate</a>
                <ul class="navbar-nav ml-auto">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['header_links']->value, 'link');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['url'];?>
" class="nav-link"><?php echo $_smarty_tpl->tpl_vars['link']->value['label'];?>
</a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Marquee section -->
    <div class="marquee-container">
        <div class="marquee-content">
            <ul class="teacher-list">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topTeachers']->value, 'teacher', false, 'index');
$_smarty_tpl->tpl_vars['teacher']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->do_else = false;
?>
                    <li>
                        <span>
                            <?php if ($_smarty_tpl->tpl_vars['index']->value == 0) {?>🏆 1st place:
                            <?php } elseif ($_smarty_tpl->tpl_vars['index']->value == 1) {?>🥈 2nd place:
                            <?php } elseif ($_smarty_tpl->tpl_vars['index']->value == 2) {?>🥉 3rd place:
                            <?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['teacher']->value['name'];?>
 (Points: <?php echo $_smarty_tpl->tpl_vars['teacher']->value['points'];?>
)
                        </span>
                    </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div>


    <!-- Main content -->
    <main>
        <!-- Success/error message -->
        <?php if ((isset($_smarty_tpl->tpl_vars['success']->value)) && $_smarty_tpl->tpl_vars['success']->value !== null) {?>
            <div class="alert alert-success redirect-to-admin-landing" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

            </div>
        <?php } elseif ((isset($_smarty_tpl->tpl_vars['error']->value)) && $_smarty_tpl->tpl_vars['error']->value !== null) {?>
            <div class="alert alert-danger redirect-to-admin-landing" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

            </div>
        <?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['order_delete_success']->value)) && $_smarty_tpl->tpl_vars['order_delete_success']->value !== null) {?>
            <div class="alert alert-success redirect-to-admin-landing" role="alert" id="order_delete_success">
                <?php echo $_smarty_tpl->tpl_vars['order_delete_success']->value;?>

            </div>
        <?php }?>
        <!-- Admin navigation buttons -->
        <div class="admin-top-buttons">
            <button class="btn btn-primary" onclick="showContainer('student_container')">Students</button>
            <button class="btn btn-primary" onclick="showContainer('teacher_container')">Teachers</button>
            <button class="btn btn-primary" onclick="showContainer('order_container')">Orders</button>
        </div>
        <div class=" position-relative">
            <!-- Students details form -->
            <div class="container display-none" id="student_container">
                <div class="container card-container" style="position:relative;">
                    <div class="card custom-card default-card bounce absolute-display">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Students List</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['students']->value, 'student');
$_smarty_tpl->tpl_vars['student']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->do_else = false;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['id'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['email'];?>
</td>
                                            <td><?php if (($_smarty_tpl->tpl_vars['student']->value['verified'] == 0)) {?> Not Verified <?php } else { ?> Verified <?php }?></td>
                                            <td>
                                                <button class="btn btn-primary btn-xs mr-2"
                                                    onclick="showStudentEditContainer(<?php echo $_smarty_tpl->tpl_vars['student']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['student']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['student']->value['email'];?>
')">Edit</button>
                                            </td>
                                        </tr>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Student edit form -->
            <div class="container display-none" id="student_edit_container">
                <div class="card custom-card default-card bounce absolute-display">
                    <div class="card-body">
                        <h1 class="card-title mb-4">Students Edit</h1>
                        <form method="POST" action="admin_landing.php">
                            <div class="form-group">
                                <label>Student Name:</label>
                                <input class="form-control" name="student_name" id="student_name">
                            </div>
                            <div class="form-group">
                                <label>Student Email:</label>
                                <input class="form-control" name="student_email" id="student_email">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="student_id" id="student_id">
                                <button type="button" class="btn btn-xs btn-danger"
                                    onclick="close_edit_section('student_edit_container','student_container')">Back</button>
                                <button class="btn btn-accept" name="student_submit">Submit</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Teacher details form -->
            <div class="container  display-none" id="teacher_container">
                <div class="container card-container" style="position:relative;">
                    <div class="card custom-card default-card bounce absolute-display">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Teachers List</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Language</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['teachers']->value, 'teacher');
$_smarty_tpl->tpl_vars['teacher']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->do_else = false;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['teacher']->value['id'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['teacher']->value['name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['teacher']->value['email'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['teacher']->value['language'];?>
</td>
                                            <td><?php if (($_smarty_tpl->tpl_vars['teacher']->value['verified'] == 0)) {?> Not Verified <?php } else { ?> Verified <?php }?></td>
                                            <td>
                                                <button class="btn btn-primary btn-xs mr-2"
                                                    onclick="showTeacherEditContainer(<?php echo $_smarty_tpl->tpl_vars['teacher']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['teacher']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['teacher']->value['email'];?>
','<?php echo $_smarty_tpl->tpl_vars['teacher']->value['language_id'];?>
')">Edit</button>
                                            </td>
                                        </tr>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Teacher edit form -->
            <div class="container display-none" id="teacher_edit_container">
                <div class="card custom-card default-card bounce absolute-display">
                    <div class="card-body">
                        <h1 class="card-title mb-4">Teacher Edit</h1>
                        <form method="POST" action="admin_landing.php">
                            <div class="form-group">
                                <label>Teacher Name:</label>
                                <input class="form-control" name="teacher_name" id="teacher_name">
                            </div>
                            <div class="form-group">
                                <label>Teacher Email:</label>
                                <input class="form-control" name="teacher_email" id="teacher_email">
                            </div>
                            <div class="form-group">
                                <label>Teacher Language:</label>
                                <select class="form-control" name="teacher_language" id="teacher_language">
                                    <option value="1">English</option>
                                    <option value="2">German</option>
                                    <option value="3">Spanish</option>
                                    <option value="4">French</option>
                                    <option value="5">Portuguese</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="teacher_id" id="teacher_id">
                                <button type="button" class="btn btn-xs btn-danger"
                                    onclick="close_edit_section('teacher_edit_container','teacher_container')">Back</button>
                                <button class="btn btn-accept" name="teacher_submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order details form -->
            <div class="container  display-none" id="order_container">
                <div class="container card-container" style="position:relative;">
                    <div class="card custom-card default-card bounce absolute-display">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Orders List</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Student</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Source Language</th>
                                        <th scope="col">Target Language</th>
                                        <th scope="col">Status</th>
                                        <th>Action
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
?>
                                        <tr id="order_tr_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
                                            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['student_name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['teacher_name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['source_language_name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['target_language_name'];?>
</td>
                                            <td><?php if (($_smarty_tpl->tpl_vars['order']->value['status_id'] == 1)) {?> Pending <?php } else { ?> Completed <?php }?></td>
                                            <td><button class="btn btn-danger btn-xs"
                                                    onclick="deleteOrder(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
)">delete</button></td>
                                        </tr>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Include jQuery library -->
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <!-- Include Bootstrap JS -->
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- Include custom Scripts -->
    <?php echo '<script'; ?>
 src="assets/js/scripts.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/backgroundEffect.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
