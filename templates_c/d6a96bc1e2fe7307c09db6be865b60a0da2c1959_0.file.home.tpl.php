<?php
/* Smarty version 3.1.36, created on 2020-04-30 10:22:53
  from '/home/rene/PhpstormProjects/MVC/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eaa8adda165c3_23274434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6a96bc1e2fe7307c09db6be865b60a0da2c1959' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/home.tpl',
      1 => 1587022804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaa8adda165c3_23274434 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13769154865eaa8adda12559_61540605', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15526254115eaa8adda14fc8_30963932', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_13769154865eaa8adda12559_61540605 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_13769154865eaa8adda12559_61540605',
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
class Block_15526254115eaa8adda14fc8_30963932 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15526254115eaa8adda14fc8_30963932',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 There is no place like 127.0.0.1 <?php
}
}
/* {/block "body"} */
}
