<?php
/* Smarty version 4.3.1, created on 2023-06-21 17:05:53
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/myAccount.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_649311d1546b27_57002230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93c8ad04bf37a48b142c2a339e7c8ba7321f89cd' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/myAccount.tpl',
      1 => 1687359941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649311d1546b27_57002230 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Header and navigation -->
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark custom-header">
            <div class="container ">
                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['header_brand_link']->value;?>
">myTranslate</a>
                <ul class="navbar-nav ml-auto">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['header_links']->value, 'link');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
                        <li class="nav-item">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['url'];?>
" class="nav-link"><?php echo $_smarty_tpl->tpl_vars['link']->value['label'];?>
</a>
                        </li>
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
        <div class="main-container center-container">

            <!-- Success/error message -->
            <?php if ((isset($_smarty_tpl->tpl_vars['success']->value))) {?>
                <div class="alert alert-success redirect-to-my-account" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
 <a href="myAccount.inc.php">Go back to My Account.</a>
                </div>
            <?php } elseif ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
                <div class="alert alert-danger redirect-to-my-account" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 <a href="myAccount.inc.php">Go back to My Account.</a>
                </div>
            <?php } else { ?>

                <!-- User details form -->
                <div class="container">
                    <div class="container card-container">
                        <div class="card custom-card default-card bounce">
                            <div class="card-body">
                                <h1 class="card-title mb-4">Account Details</h1>
                                <form id="updateAccountForm" action="myAccount.inc.php" method="post">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input class="form-control" id="name" name="name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
"
                                            required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input class="form-control" id="email" name="email" type="email"
                                            value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="language">Language:</label>
                                        <input class="form-control" id="language" name="language" type="text"
                                            value="<?php echo $_smarty_tpl->tpl_vars['user']->value['language_name'];?>
" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password:</label>
                                        <input class="form-control" id="password" name="password" type="password" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm New Password:</label>
                                        <input class="form-control" id="confirm_password" name="confirm_password"
                                            type="password" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" id="editButton" class="btn btn-secondary">Edit</button>
                                        <button type="button" id="cancelButton" class="btn btn-danger"
                                            style="display: none;">Cancel</button>

                                        <button type="submit" id="updateButton" class="btn btn-accept"
                                            style="display: none;">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }?>

        </div>
    </main> <!-- Include jQuery library -->
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <!-- Include Bootstrap JS -->
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
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
