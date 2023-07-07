<?php
/* Smarty version 4.3.1, created on 2023-06-19 16:14:40
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/forgot_password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_649062d0d46597_21531808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9054bbebcdc4ec1b6501c05296b2bc99214c6b7b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/forgot_password.tpl',
      1 => 1683348154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649062d0d46597_21531808 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <!-- Forgot password form -->
        <?php if ((isset($_smarty_tpl->tpl_vars['success']->value))) {?>
            <div class="alert alert-success redirect-to-login" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
 <a href="login.php">Go back to the login page.</a>
            </div>
        <?php } elseif ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
            <div class="alert alert-danger redirect-to-login" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 <a href="login.php">Go back to the login page.</a>
            </div>
        <?php }?>

        <?php if (!(isset($_smarty_tpl->tpl_vars['success']->value)) && !(isset($_smarty_tpl->tpl_vars['error']->value))) {?>
            <div class="container card-container">
                <div class="card custom-card default-card bounce">
                    <h1 class="title">Forgot Password</h1>
                    <form action="forgot_password.php" method="post">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <div class="d-flex flex-column align-items-end">
                                <a href="register.php" class="btn btn-link">Sign Up</a>
                                <a href="login.php" class="btn btn-link">Log In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php }?>
    </div>

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
