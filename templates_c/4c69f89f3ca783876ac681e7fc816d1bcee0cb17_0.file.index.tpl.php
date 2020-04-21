<?php
/* Smarty version 3.1.36, created on 2020-04-21 09:36:35
  from '/home/rene/PhpstormProjects/MVC/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e9ea2837ced61_77864574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c69f89f3ca783876ac681e7fc816d1bcee0cb17' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/index.tpl',
      1 => 1587454590,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9ea2837ced61_77864574 (Smarty_Internal_Template $_smarty_tpl) {
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
    <hr />
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page']->value, 'wert', false, 'schluessel');
$_smarty_tpl->tpl_vars['wert']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['schluessel']->value => $_smarty_tpl->tpl_vars['wert']->value) {
$_smarty_tpl->tpl_vars['wert']->do_else = false;
?>
      <?php echo $_smarty_tpl->tpl_vars['schluessel']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['wert']->value;?>
<br>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  </body>
</html>
<?php }
}
