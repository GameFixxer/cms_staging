<?php
/* Smarty version 3.1.36, created on 2020-04-22 14:28:26
  from '/home/rene/PhpstormProjects/MVC/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea0386ad97a11_76613364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c69f89f3ca783876ac681e7fc816d1bcee0cb17' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/index.tpl',
      1 => 1587558497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea0386ad97a11_76613364 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="">
<head>
    <title>Smarty</title>
</head>
<body>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id']->value, 'page', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
    <hr/>
    <a href="http://localhost:8080/Index.php?page=detail&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
</a>
    <?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();?>

    <?php echo $_smarty_tpl->tpl_vars['page']->value->getProductDescription();?>



<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</body>
</html>
<?php }
}
