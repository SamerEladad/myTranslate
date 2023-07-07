<?php
/* Smarty version 4.3.1, created on 2023-06-19 15:55:35
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/about.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64905e57bcbd21_35421964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1acf4a5fa6279de00c6b7ba364bdd6d66efdf40b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/about.tpl',
      1 => 1687182912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64905e57bcbd21_35421964 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Header section -->
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


<!-- Main section -->
<main>
    <div class="main-container">
        <div class="container">
            <!-- Loop through each member in the members array and display their information in a card -->
            <div class="about-card-container">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['members']->value, 'member');
$_smarty_tpl->tpl_vars['member']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
$_smarty_tpl->tpl_vars['member']->do_else = false;
?>
                <div class="card about-card mb-4">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['member']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['member']->value['name'];?>
" class="card-img-top member-image">
                    <div class="card-body">
                        <p class="card-text card-text-hover">Name: <?php echo $_smarty_tpl->tpl_vars['member']->value['name'];?>
</p>
                        <p class="card-text card-text-hover">Matrikelnummer: <?php echo $_smarty_tpl->tpl_vars['member']->value['id'];?>
</p>
                        <p class="card-text card-text-hover">
                            <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['member']->value['email'];?>
">Send Email</a>
                        </p>
                    </div>
                </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
 src="assets/js/backgroundEffect.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
