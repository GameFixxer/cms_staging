<?php
/* Smarty version 3.1.36, created on 2020-04-16 09:40:11
  from '/home/rene/PhpstormProjects/MVC/templates/home_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e980bdb5365d7_78080753',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19da5c9b7f5b6438e76ca5f36c6c8996d32e58b4' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/home_.tpl',
      1 => 1587022804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e980bdb5365d7_78080753 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11099994035e980bdb5307e3_30594413', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14518945285e980bdb534745_24058805', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_11099994035e980bdb5307e3_30594413 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11099994035e980bdb5307e3_30594413',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Page Title
<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_14518945285e980bdb534745_24058805 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_14518945285e980bdb534745_24058805',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 There is no place like 127.0.0.1 <?php
}
}
/* {/block "body"} */
}
