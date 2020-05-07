<?php
/* Smarty version 3.1.36, created on 2020-05-07 13:23:56
  from '/home/rene/PhpstormProjects/MVC/templates/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb3efccc553e7_01343473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cf5a64459e96931682c71d901a550ba9f06bb22' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dashboard.tpl',
      1 => 1588850618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb3efccc553e7_01343473 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="">
<head>
    <title>Dashboard</title>
</head>
<body>
Welcome to the backstage area!
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id']->value, 'page', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
    <hr/>

    <a href="http://localhost:8080/Index.php?page=product&admin=true&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
</a>
    <?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();?>

    <?php echo $_smarty_tpl->tpl_vars['page']->value->getProductDescription();?>


<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<br><br><br><br>
<form id="logout" name="logout" action="" method="post">
    <input type="hidden" id="logout" name="logout" value="logout">
    <input type="submit" value="logout">
</form>
</body>
</html><?php }
}
