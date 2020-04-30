<?php
/* Smarty version 3.1.36, created on 2020-04-30 10:22:49
  from '/home/rene/PhpstormProjects/MVC/templates/detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eaa8ad94460e8_47353648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '389226228c070fa5ab69322b73c94d5b5c3ac4b5' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/detail.tpl',
      1 => 1587637673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaa8ad94460e8_47353648 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5425614285eaa8ad94364d0_93718914', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1996709365eaa8ad943c019_79664839', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_5425614285eaa8ad94364d0_93718914 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_5425614285eaa8ad94364d0_93718914',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Detail:<?php echo $_smarty_tpl->tpl_vars['id']->value->getProductName();?>

<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_1996709365eaa8ad943c019_79664839 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1996709365eaa8ad943c019_79664839',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    ID: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductId();?>

    <br>
    Productname: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductName();?>

    <br>
    Description: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductDescription();?>

    <br>

<?php
}
}
/* {/block "body"} */
}
