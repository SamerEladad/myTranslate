<?php
/* Smarty version 4.3.1, created on 2023-06-21 16:30:20
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/teacher_landing.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6493097c8faa90_01102515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd86373029e80fed7049107237f0b2723fa0cd643' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslate/templates/teacher_landing.tpl',
      1 => 1687357818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6493097c8faa90_01102515 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/XAMPP/xamppfiles/htdocs/myTranslate/lib/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <title>Teacher Landing - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
</head>
<body>
    <!-- Header and Navigation -->
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

    <!-- Main Content -->
    <main>
    <p class="points-card text-center"> Welcome, <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
. You currently have <?php echo $_smarty_tpl->tpl_vars['points']->value;?>
 points!</p>     
        <div class="container">
            <div class="container card-container">
                <div class="card custom-card default-card bounce">
                    <div class="card-body">
                        <!-- Display order details if available -->
                        <?php if ((isset($_smarty_tpl->tpl_vars['orders']->value[$_smarty_tpl->tpl_vars['current_order']->value]))) {?>
                            <p><b>Order ID:</b> <?php echo $_smarty_tpl->tpl_vars['orders']->value[$_smarty_tpl->tpl_vars['current_order']->value]['id'];?>
</p>
                            <p><b>Student:</b> <?php echo $_smarty_tpl->tpl_vars['orders']->value[$_smarty_tpl->tpl_vars['current_order']->value]['student_name'];?>
</p>
                            <p><b>Original text language:</b> <?php echo $_smarty_tpl->tpl_vars['orders']->value[$_smarty_tpl->tpl_vars['current_order']->value]['source_language'];?>
</p>
                            <p><b>Original text:</b></p>
                            <textarea class="form-control" rows="15" cols="40"
                                readonly><?php echo $_smarty_tpl->tpl_vars['orders']->value[$_smarty_tpl->tpl_vars['current_order']->value]['source_text'];?>
</textarea>
                                <div class="mt-3">
                                <a href="?prev=1&current_order=<?php echo $_smarty_tpl->tpl_vars['current_order']->value;?>
"
                                    class="btn btn-prev <?php if ($_smarty_tpl->tpl_vars['current_order']->value == 0) {?>disabled<?php }?>"><</a>
                                <a href="orderFulfillment.inc.php?order_id=<?php echo $_smarty_tpl->tpl_vars['orders']->value[$_smarty_tpl->tpl_vars['current_order']->value]['id'];?>
&accept=1"
                                    class="btn btn-accept">Accept Order</a>
                                <a href="?next=1&current_order=<?php echo $_smarty_tpl->tpl_vars['current_order']->value;?>
"
                                    class="btn btn-next <?php if ($_smarty_tpl->tpl_vars['current_order']->value == smarty_modifier_count($_smarty_tpl->tpl_vars['orders']->value)-1) {?>disabled<?php }?>">></a>
                            </div>
                        <?php } else { ?>
                            <p>No orders found.</p>
                        <?php }?>
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
 src="assets/js/backgroundEffect.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
