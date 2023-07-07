<?php
/* Smarty version 4.3.1, created on 2023-06-18 23:19:18
  from '/Applications/XAMPP/xamppfiles/htdocs/myTranslatefinal/smarty/templates/student_orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_648f74d600a676_43205984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '706c21760d98dee639a934d6d001d5cb607e8f4d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myTranslatefinal/smarty/templates/student_orders.tpl',
      1 => 1686065112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648f74d600a676_43205984 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Orders - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
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

  <h1 class="mb-4 title">Student Orders</h1>
  <div class="container">
    <!-- Filter orders dropdown -->
    <div class="filter-container">
      <label for="order-filter">Filter Orders:</label>
      <select id="order-filter">
        <option value="all">All Orders</option>
        <option value="fulfilled">Fulfilled Orders</option>
        <option value="unfulfilled">Unfulfilled Orders</option>
      </select>
    </div>
    <!-- Orders list -->
    <?php if ((isset($_smarty_tpl->tpl_vars['orders']->value)) && count($_smarty_tpl->tpl_vars['orders']->value) > 0) {?>
      <div class="container orders-container">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
?>
          <div class="order-item">
            <div class="card custom-card bounce <?php if ($_smarty_tpl->tpl_vars['order']->value['translated_text']) {?>fulfilled-card<?php } else { ?>pending-card<?php }?> scroll">
              <h5><strong>Order ID:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</h5>
              <p><strong>Created at:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['created_at'];?>
</p>
              <p><strong>Source text:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['source_text'];?>
</p>
              <p><strong>Source text language:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['source_language'];?>
</p>
              <p><strong>Translated text:</strong> <?php if ($_smarty_tpl->tpl_vars['order']->value['translated_text']) {
echo $_smarty_tpl->tpl_vars['order']->value['translated_text'];
} else { ?>pending<?php }?></p>
              <p><strong>Translated text language:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['translated_language'];?>
</p>
              <p><strong>Translated by:</strong> <?php if ($_smarty_tpl->tpl_vars['order']->value['translated_text']) {
echo $_smarty_tpl->tpl_vars['order']->value['teacher_name'];
} else { ?>not assigned<?php }?></p>
            </div>
          </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
    <?php } else { ?>
      <!-- No orders message -->
      <div class="d-flex justify-content-center align-items-center">
        <div class="card custom-card bounce">
          <p>No orders found.</p>
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
  <?php echo '<script'; ?>
 src="assets/js/scrollingEffects.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="assets/js/filterOrders.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
