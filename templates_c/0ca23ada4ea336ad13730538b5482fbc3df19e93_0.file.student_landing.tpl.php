<?php
/* Smarty version 4.3.1, created on 2023-06-18 23:16:44
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslatefinal/smarty/templates/student_landing.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_648f743c285633_69408205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ca23ada4ea336ad13730538b5482fbc3df19e93' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslatefinal/smarty/templates/student_landing.tpl',
      1 => 1686065314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648f743c285633_69408205 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Landing - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
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
            <div class="container">
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
        <p class="points-card text-center"> Welcome, <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
.</p>
        <div class="main-container">
            <!-- Success/error message -->
            <?php if ((isset($_smarty_tpl->tpl_vars['success']->value)) && $_smarty_tpl->tpl_vars['success']->value !== null) {?>
                <div class="alert alert-success redirect-to-student-landing" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
 <a href="student_landing.php">Go back to the main page.</a>
                </div>
            <?php } else { ?>
                <?php if ((isset($_smarty_tpl->tpl_vars['error']->value)) && $_smarty_tpl->tpl_vars['error']->value !== null) {?>
                    <div class="alert alert-danger redirect-to-student-landing" role="alert">
                        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 <a href="student_landing.php">Go back to the main page.</a>
                    </div>
                <?php }?>
                <!-- Order details form -->
                <div class="container">
                    <div class="container card-container">
                        <div class="card custom-card default-card bounce">
                            <div class="card-body">
                                <h1 class="card-title mb-4">Order Details</h1>
                                <form id="createOrderForm" action="student_landing.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="from_language">From:</label>
                                            <!-- Language options -->
                                            <select class="form-control" id="from_language" name="from_language" required>
                                                <option value="">Select Language</option>
                                                <option value="English">English</option>
                                                <option value="German">German</option>
                                                <option value="Spanish">Spanish</option>
                                                <option value="French">French</option>
                                                <option value="Portuguese">Portuguese</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="to_language">To:</label>
                                            <!-- Language options -->
                                            <select class="form-control" id="to_language" name="to_language" required>
                                                <option value="">Select Language</option>
                                                <option value="English">English</option>
                                                <option value="German">German</option>
                                                <option value="Spanish">Spanish</option>
                                                <option value="French">French</option>
                                                <option value="Portuguese">Portuguese</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="source_text">Text:</label>
                                        <textarea class="form-control" id="source_text" name="source_text" rows="10"
                                            required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
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
</body>

</html><?php }
}
