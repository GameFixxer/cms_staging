<?php
/* Smarty version 3.1.36, created on 2020-05-12 15:11:50
  from '/home/rene/PhpstormProjects/MVC/templates/dist/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ebaa09607c070_20469253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67bdcf04fd0d1717bb2bbd650a40376ac04e4919' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/home.tpl',
      1 => 1589289099,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebaa09607c070_20469253 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16354806225ebaa096075f76_64521464', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6225784495ebaa096079d78_14703752', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_16354806225ebaa096075f76_64521464 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_16354806225ebaa096075f76_64521464',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_6225784495ebaa096079d78_14703752 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6225784495ebaa096079d78_14703752',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 There is no place like 127.0.0.1 <?php
}
}
/* {/block "body"} */
}
