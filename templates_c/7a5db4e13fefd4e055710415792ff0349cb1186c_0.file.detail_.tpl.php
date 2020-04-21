<?php
/* Smarty version 3.1.36, created on 2020-04-21 11:22:43
  from '/home/rene/PhpstormProjects/MVC/templates/detail_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e9ebb634cd4a2_31055913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a5db4e13fefd4e055710415792ff0349cb1186c' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/detail_.tpl',
      1 => 1587460944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9ebb634cd4a2_31055913 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12086263195e9ebb634bada2_67703224', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1141793465e9ebb634be490_07547983', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_12086263195e9ebb634bada2_67703224 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_12086263195e9ebb634bada2_67703224',
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
class Block_1141793465e9ebb634be490_07547983 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1141793465e9ebb634be490_07547983',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    ID: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductId();?>

    <br>
    Productname: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductName();?>

    <br>
    Description: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductDescription();?>

    <br>

<?php
}
}
/* {/block "body"} */
}
