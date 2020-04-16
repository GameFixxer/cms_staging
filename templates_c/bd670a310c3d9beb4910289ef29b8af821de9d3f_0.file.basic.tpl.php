<?php
/* Smarty version 3.1.36, created on 2020-04-16 08:58:25
  from '/home/rene/PhpstormProjects/MVC/templates/basic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e9802112df535_98234111',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd670a310c3d9beb4910289ef29b8af821de9d3f' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/basic.tpl',
      1 => 1587020303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9802112df535_98234111 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4950511965e9802112d5255_05815687', "title");
?>
</title>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18028150765e9802112d9100_84651437', "title");
?>
</title> </head>
<body><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10719280775e9802112dcdf9_06014292', "body");
?>
</body>

</html>

  <?php }
/* {block "title"} */
class Block_4950511965e9802112d5255_05815687 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_4950511965e9802112d5255_05815687',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "title"} */
class Block_18028150765e9802112d9100_84651437 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_18028150765e9802112d9100_84651437',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_10719280775e9802112dcdf9_06014292 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_10719280775e9802112dcdf9_06014292',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "body"} */
}
