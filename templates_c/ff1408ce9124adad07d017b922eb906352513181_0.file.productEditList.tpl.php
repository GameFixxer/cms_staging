<?php
/* Smarty version 3.1.36, created on 2020-05-08 10:57:11
  from '/home/rene/PhpstormProjects/MVC/templates/productEditList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb51ee7cee324_90487045',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff1408ce9124adad07d017b922eb906352513181' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/productEditList.tpl',
      1 => 1588921618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb51ee7cee324_90487045 (Smarty_Internal_Template $_smarty_tpl) {
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

    <a href="http://localhost:8080/Index.php?cl=product&page=detail&admin=true&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
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
