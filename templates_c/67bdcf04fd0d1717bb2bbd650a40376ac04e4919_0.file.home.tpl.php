<?php
/* Smarty version 3.1.36, created on 2020-05-15 12:18:33
  from '/home/rene/PhpstormProjects/MVC/templates/dist/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ebe6c79bae324_35058851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67bdcf04fd0d1717bb2bbd650a40376ac04e4919' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/home.tpl',
      1 => 1589537908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe6c79bae324_35058851 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16704390085ebe6c79b913a7_90765548', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15673989085ebe6c79b96ed5_39504994', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20701940865ebe6c79b9b053_73621591', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8063685085ebe6c79b9f731_25320460', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16744392355ebe6c79ba30e0_49365294', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13750954805ebe6c79ba95d0_77373569', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_16704390085ebe6c79b913a7_90765548 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_16704390085ebe6c79b913a7_90765548',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "title"} */
/* {block "subtitel_h1"} */
class Block_15673989085ebe6c79b96ed5_39504994 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_15673989085ebe6c79b96ed5_39504994',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_20701940865ebe6c79b9b053_73621591 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_20701940865ebe6c79b9b053_73621591',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
There is no place like 127.0.0.1<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_8063685085ebe6c79b9f731_25320460 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_8063685085ebe6c79b9f731_25320460',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Login<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_16744392355ebe6c79ba30e0_49365294 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_16744392355ebe6c79ba30e0_49365294',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=login&admin=true&page=list"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_13750954805ebe6c79ba95d0_77373569 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_13750954805ebe6c79ba95d0_77373569',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "body"} */
}
