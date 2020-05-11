<?php
/* Smarty version 3.1.36, created on 2020-05-11 17:43:05
  from '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb97289f1ce12_71001076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4d2e488e0575a70d122feafaf3d2dbd8981f2a4' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl',
      1 => 1589194239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb97289f1ce12_71001076 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11781455755eb97289efc735_28355706', "title");
?>
</title>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2704007265eb97289f083d9_79030779', "title");
?>
</title> </head>
<body><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1631691195eb97289f13545_00608727', "body");
?>
</body>

</html>

  <?php }
/* {block "title"} */
class Block_11781455755eb97289efc735_28355706 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11781455755eb97289efc735_28355706',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "title"} */
class Block_2704007265eb97289f083d9_79030779 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2704007265eb97289f083d9_79030779',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_1631691195eb97289f13545_00608727 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1631691195eb97289f13545_00608727',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "body"} */
}
