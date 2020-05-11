<?php
/* Smarty version 3.1.36, created on 2020-05-11 14:28:21
  from '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb944e523a967_37150415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4d2e488e0575a70d122feafaf3d2dbd8981f2a4' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl',
      1 => 1587020303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb944e523a967_37150415 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17512119035eb944e5231de2_77558826', "title");
?>
</title>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9250280385eb944e52351c4_19992873', "title");
?>
</title> </head>
<body><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1686345715eb944e5238e56_39176110', "body");
?>
</body>

</html>

  <?php }
/* {block "title"} */
class Block_17512119035eb944e5231de2_77558826 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_17512119035eb944e5231de2_77558826',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "title"} */
class Block_9250280385eb944e52351c4_19992873 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9250280385eb944e52351c4_19992873',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_1686345715eb944e5238e56_39176110 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1686345715eb944e5238e56_39176110',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "body"} */
}
