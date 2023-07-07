<?php
/* Smarty version 4.3.1, created on 2023-06-21 16:30:21
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/orderFulfillment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6493097db02927_09859193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '951fb87eb760b8cf187740f063d166ea0d9f04fb' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/orderFulfillment.tpl',
      1 => 1687357776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6493097db02927_09859193 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Fulfillment</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
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
        <div class="container">
        <div class="container card-container">
            <?php if ((isset($_smarty_tpl->tpl_vars['success']->value))) {?>
                <!-- Display success message -->
                <div class="alert alert-success redirect-to-teacher-landing" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
 <a href="teacherLanding.inc.php">Go back to the main page.</a>
                </div>
            <?php } else { ?>
                <div class="card custom-card default-card square-card square-card bounce">
                    <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
                        <!-- Display error message -->
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 <a href="teacherLanding.inc.php">Go back to the main page.</a>
                        </div>
                    <?php }?>
                    <!-- Order fulfillment form -->
                    <form action="orderFulfillment.inc.php?order_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="original_text">Original Text:</label>
                                <textarea class="form-control original-text" id="original_text" name="original_text" rows="15"
                                    readonly><?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['source_text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="translated_text">Translated Text:</label>
                                <textarea class="form-control" id="translated_text" name="translated_text" rows="15"
                                    required><?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['translated_text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="teacherLanding.inc.php" class="btn btn-primary">Back to Orders</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            <?php }?>
        </div>
    </div>

  <!-- Include custom Scripts -->
  <?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="assets/js/scripts.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="assets/js/backgroundEffect.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
