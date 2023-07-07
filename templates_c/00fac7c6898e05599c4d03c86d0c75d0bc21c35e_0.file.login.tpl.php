<?php
/* Smarty version 4.3.1, created on 2023-06-18 22:43:16
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslatefinal/smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_648f6c643fbc78_54884891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00fac7c6898e05599c4d03c86d0c75d0bc21c35e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslatefinal/smarty/templates/login.tpl',
      1 => 1686519596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648f6c643fbc78_54884891 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Main container for the login form -->
    <div class="container card-container">
        <!-- If an error exists, display the error message and a link to go back to the login page -->
        <?php if ((isset($_smarty_tpl->tpl_vars['error']->value)) && $_smarty_tpl->tpl_vars['error']->value !== null) {?>
            <div class="alert alert-danger redirect-to-login" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 <a href="login.php">Go back to the login page.</a>
            </div>
        <?php } else { ?>
            <!-- Login form -->
            <div class="card custom-card default-card bounce">
                <h1 class="title">Login</h1>
                <!-- Post the form to the login.php script -->
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <!-- Require a valid email address -->
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <!-- Require a valid password -->
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- Submit the form when the user clicks this button -->
                        <button type="submit" class="btn btn-primary">Login</button>
                        <!-- Links to register.php and forgot_password.php pages -->
                        <div class="d-flex flex-column align-items-end">
                            <a href="register.php" class="btn btn-link">Don't have an account?</a>
                            <a href="forgot_password.php" class="btn btn-link">Forgot Password?</a>
                        </div>
                    </div>
                </form>
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
 src="assets/js/backgroundEffect.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/scripts.js"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
