<?php
/* Smarty version 3.1.36, created on 2020-04-29 12:56:33
  from '/home/rene/PhpstormProjects/MVC/templates/detail_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea95d611f96c3_10663316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a5db4e13fefd4e055710415792ff0349cb1186c' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/detail_.tpl',
      1 => 1587637673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea95d611f96c3_10663316 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_45260735ea95d611e5153_22612606', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17005480085ea95d611f1d00_61740923', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_45260735ea95d611e5153_22612606 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_45260735ea95d611e5153_22612606',
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
class Block_17005480085ea95d611f1d00_61740923 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17005480085ea95d611f1d00_61740923',
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
