<?php
/* Smarty version 3.1.36, created on 2020-04-15 17:13:05
  from '/home/rene/PhpstormProjects/MVC/templates/404_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e972481140035_44994696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6700f453d94aed81153e384ae9de30a64cc5d8ea' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/404_.tpl',
      1 => 1586963583,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e972481140035_44994696 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9801524625e97248113e707_71833727', "title");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_9801524625e97248113e707_71833727 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9801524625e97248113e707_71833727',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Page Title
<?php
}
}
/* {/block "title"} */
}
