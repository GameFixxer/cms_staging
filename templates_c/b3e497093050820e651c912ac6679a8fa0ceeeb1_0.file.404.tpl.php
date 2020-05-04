<?php
/* Smarty version 3.1.36, created on 2020-05-04 14:23:52
  from '/home/rene/PhpstormProjects/MVC/templates/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb0095816ef98_39320988',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3e497093050820e651c912ac6679a8fa0ceeeb1' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/404.tpl',
      1 => 1587637673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb0095816ef98_39320988 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5348150675eb00958169cb2_26448042', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14539048755eb0095816d088_35596592', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_5348150675eb00958169cb2_26448042 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_5348150675eb00958169cb2_26448042',
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
class Block_14539048755eb0095816d088_35596592 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_14539048755eb0095816d088_35596592',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "body"} */
}
