<?php
/* Smarty version 3.1.36, created on 2020-04-29 09:00:38
  from '/home/rene/PhpstormProjects/MVC/templates/basic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea92616f24244_14986783',
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
function content_5ea92616f24244_14986783 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6423709795ea92616f1c6a7_15423380', "title");
?>
</title>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5424666945ea92616f1f481_10011113', "title");
?>
</title> </head>
<body><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15374143005ea92616f22733_77137985', "body");
?>
</body>

</html>

  <?php }
/* {block "title"} */
class Block_6423709795ea92616f1c6a7_15423380 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6423709795ea92616f1c6a7_15423380',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "title"} */
class Block_5424666945ea92616f1f481_10011113 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_5424666945ea92616f1f481_10011113',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_15374143005ea92616f22733_77137985 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15374143005ea92616f22733_77137985',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "body"} */
}
