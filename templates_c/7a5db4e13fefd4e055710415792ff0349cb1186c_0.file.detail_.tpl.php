<?php
/* Smarty version 3.1.36, created on 2020-04-20 14:51:09
  from '/home/rene/PhpstormProjects/MVC/templates/detail_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e9d9abd9866f3_69671590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a5db4e13fefd4e055710415792ff0349cb1186c' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/detail_.tpl',
      1 => 1587382609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9d9abd9866f3_69671590 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13690205375e9d9abd978476_40632505', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17094094125e9d9abd97b407_14397564', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_13690205375e9d9abd978476_40632505 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_13690205375e9d9abd978476_40632505',
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
class Block_17094094125e9d9abd97b407_14397564 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17094094125e9d9abd97b407_14397564',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Id:<?php echo $_smarty_tpl->tpl_vars['id']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['productname']->value;?>
.
    <?php echo $_smarty_tpl->tpl_vars['description']->value;?>

<?php
}
}
/* {/block "body"} */
}
