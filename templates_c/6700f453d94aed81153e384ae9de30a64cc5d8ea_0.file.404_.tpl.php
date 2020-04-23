<?php
/* Smarty version 3.1.36, created on 2020-04-23 12:29:20
  from '/home/rene/PhpstormProjects/MVC/templates/404_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea16e003a5d32_34242869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6700f453d94aed81153e384ae9de30a64cc5d8ea' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/404_.tpl',
      1 => 1587637673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea16e003a5d32_34242869 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11933653225ea16e003a2893_66082577', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20610690105ea16e003a4b60_94694611', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_11933653225ea16e003a2893_66082577 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11933653225ea16e003a2893_66082577',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

   404
<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_20610690105ea16e003a4b60_94694611 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_20610690105ea16e003a4b60_94694611',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "body"} */
}
