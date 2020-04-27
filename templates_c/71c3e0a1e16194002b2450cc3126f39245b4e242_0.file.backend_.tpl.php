<?php
/* Smarty version 3.1.36, created on 2020-04-27 15:56:30
  from '/home/rene/PhpstormProjects/MVC/templates/backend_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea6e48e80b243_04721001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71c3e0a1e16194002b2450cc3126f39245b4e242' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/backend_.tpl',
      1 => 1587995485,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea6e48e80b243_04721001 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="">
<head>
    <title>Backend</title>
</head>
<body>
Welcome to the backend area <br><br>
Here you can see a list with all existing pages: <br><br>

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

    <form action="" method="post">
        <input type="Submit" name="delete=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductID();?>
" value="Delete"/>
    </form>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</body>
</html>
<?php }
}
