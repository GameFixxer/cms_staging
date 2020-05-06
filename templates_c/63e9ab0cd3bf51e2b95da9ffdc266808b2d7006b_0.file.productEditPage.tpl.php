<?php
/* Smarty version 3.1.36, created on 2020-05-06 11:39:07
  from '/home/rene/PhpstormProjects/MVC/templates/productEditPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb285bb1066e6_06750997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63e9ab0cd3bf51e2b95da9ffdc266808b2d7006b' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/productEditPage.tpl',
      1 => 1588757908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb285bb1066e6_06750997 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17270962755eb285bb0ebda3_13790625', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8317548335eb285bb0f5b60_16464620', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_17270962755eb285bb0ebda3_13790625 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_17270962755eb285bb0ebda3_13790625',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Detail:<?php echo $_smarty_tpl->tpl_vars['id']->value->getProductName();?>

<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_8317548335eb285bb0f5b60_16464620 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_8317548335eb285bb0f5b60_16464620',
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
    <hr/>
    <form id="form" name="form" action="" method="post">
    Create product <input type="checkbox" name="id" value=''>
    Update product <input type="checkbox" name="update" value=<?php echo $_smarty_tpl->tpl_vars['id']->value->getProductId();?>
>
    Delete product <input type="checkbox" name="delete" value=<?php echo $_smarty_tpl->tpl_vars['id']->value->getProductId();?>
>
    <br>Productname
    <br><input type="text" name="newpagename" size=40 maxlength=40>
    <br>Productdescription
    <br><input type="text" name="newpagedescription" size=40 maxlength=40>
    <br><br>
    <input type="submit" value="commit">
    </form>
    <hr/>
    <a href="http://localhost:8080/Index.php?page=dashboard&admin=true">back to dashboard</a>

<?php
}
}
/* {/block "body"} */
}
