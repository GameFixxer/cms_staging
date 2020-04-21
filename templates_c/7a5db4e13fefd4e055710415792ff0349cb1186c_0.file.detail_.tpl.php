<?php
/* Smarty version 3.1.36, created on 2020-04-21 09:30:07
  from '/home/rene/PhpstormProjects/MVC/templates/detail_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e9ea0ff48c093_93623680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a5db4e13fefd4e055710415792ff0349cb1186c' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/detail_.tpl',
      1 => 1587454200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9ea0ff48c093_93623680 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4516196225e9ea0ff47b200_09888922', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9500007005e9ea0ff47f063_77276314', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_4516196225e9ea0ff47b200_09888922 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_4516196225e9ea0ff47b200_09888922',
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
class Block_9500007005e9ea0ff47f063_77276314 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9500007005e9ea0ff47f063_77276314',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    ID: <?php echo $_smarty_tpl->tpl_vars['id']->value->id;?>
 <br>
    Productname: <?php echo $_smarty_tpl->tpl_vars['id']->value->productname;?>
<br>
    Description: <?php echo $_smarty_tpl->tpl_vars['id']->value->description;?>
<br>

<?php
}
}
/* {/block "body"} */
}
