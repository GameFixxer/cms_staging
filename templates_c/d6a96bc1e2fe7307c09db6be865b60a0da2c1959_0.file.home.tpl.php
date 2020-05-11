<?php
/* Smarty version 3.1.36, created on 2020-05-11 15:30:25
  from '/home/rene/PhpstormProjects/MVC/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb95371d05376_11397864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6a96bc1e2fe7307c09db6be865b60a0da2c1959' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/home.tpl',
      1 => 1589203821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:/dist/index.html' => 1,
  ),
),false)) {
function content_5eb95371d05376_11397864 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_156759465eb95371cf2ba1_82778083', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12438631955eb95371d01320_32998557', "body");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_156759465eb95371cf2ba1_82778083 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_156759465eb95371cf2ba1_82778083',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender("file:/dist/index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_12438631955eb95371d01320_32998557 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12438631955eb95371d01320_32998557',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 There is no place like 127.0.0.1 <?php
}
}
/* {/block "body"} */
}
