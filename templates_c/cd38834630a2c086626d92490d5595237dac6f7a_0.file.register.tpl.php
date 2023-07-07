<?php
/* Smarty version 4.3.1, created on 2023-06-21 13:01:19
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6492d87ff30049_95912706',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd38834630a2c086626d92490d5595237dac6f7a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/register.tpl',
      1 => 1687189992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6492d87ff30049_95912706 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Main container -->
    <div class="container center-container">
        <!-- If registration is successful, display a success message and a link to the login page -->
        <?php if ((isset($_smarty_tpl->tpl_vars['success']->value)) && $_smarty_tpl->tpl_vars['success']->value !== null) {?>
            <div class="alert alert-success text-center redirect-to-register" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
 <a href="login.php">Go to the register page.</a>
            </div>
        <?php } else { ?>
            <!-- If an error exists, display the error message and a link to go back to the registration page -->
            <?php if ((isset($_smarty_tpl->tpl_vars['error']->value)) && $_smarty_tpl->tpl_vars['error']->value !== null) {?>
                <div class="alert alert-danger text-center redirect-to-register" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 <a href="register.php">Go to the register page.</a>
                </div>
            <?php } else { ?>
                <!-- Registration form -->
                <div class="card custom-card default-card bounce register-card">
                    <h1 class="title">Register</h1>
                    <form action="register.php" method="post" id="registrationForm">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Account Type:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">Choose...</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>
                        </div>
                        <!-- Optional language selection (for teachers), hidden by default -->
                        <div class="form-group" id="language-group" style="display: none;">
                            <label for="language">Language:</label>
                            <select class="form-control" id="language" name="language">
                                <option value="">Choose...</option>
                                <option value="English">English</option>
                                <option value="German">German</option>
                                <option value="Spanish">Spanish</option>
                                <option value="French">French</option>
                                <option value="Portuguese">Portuguese</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <!-- Link to go back to the login page if the user already has an account -->
                    <a href="login.php" class="btn btn-link">Already have an account?</a>
                </div>
            <?php }?>
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
