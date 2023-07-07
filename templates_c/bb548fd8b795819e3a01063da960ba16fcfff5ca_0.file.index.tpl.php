<?php
/* Smarty version 4.3.1, created on 2023-06-21 16:10:40
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_649304e0d58230_97913188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb548fd8b795819e3a01063da960ba16fcfff5ca' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/index.tpl',
      1 => 1687184118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649304e0d58230_97913188 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Countdown bar to show the remaining time until some event -->
    <div class="countdown-bar"></div>
    <!-- Page content container -->
    <div class="page-content">
        <div class="container center-container">
            <div class="container card-container bounce">
                <!-- Card to show the welcome message -->
                <div class="card custom-card default-card">
                    <h1 class="title">Welcome to <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
!</h1>
                </div>
            </div>
        </div>
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
 src="assets/js/main.js"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
