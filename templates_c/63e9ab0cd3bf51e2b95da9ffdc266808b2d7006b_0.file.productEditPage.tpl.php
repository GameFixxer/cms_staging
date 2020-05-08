<?php
/* Smarty version 3.1.36, created on 2020-05-08 10:57:09
  from '/home/rene/PhpstormProjects/MVC/templates/productEditPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb51ee54cc131_27330738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63e9ab0cd3bf51e2b95da9ffdc266808b2d7006b' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/productEditPage.tpl',
      1 => 1588928223,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb51ee54cc131_27330738 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7461028785eb51ee54af8c1_86099592', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15389302325eb51ee54ba059_02265637', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_7461028785eb51ee54af8c1_86099592 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_7461028785eb51ee54af8c1_86099592',
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
class Block_15389302325eb51ee54ba059_02265637 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15389302325eb51ee54ba059_02265637',
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
        <input type="radio" name="delete" value=<?php echo $_smarty_tpl->tpl_vars['id']->value->getProductId();?>
>Delete Product</label>
        <input type="radio" name="save" value=<?php echo $_smarty_tpl->tpl_vars['id']->value->getProductId();?>
>Update Product</label>
        <input type="radio" name="save" value=0=>Create Product</label>
    <br>Productname
    <br><input type="text" name="newpagename" size=40 maxlength=40>
    <br>Productdescription
    <br><input type="text" name="newpagedescription" size=40 maxlength=40>
    <br><br>
    <input type="submit" value="commit">
    </form>
    <hr/>
    <a href="http://localhost:8080/Index.php?cl=product&page=list&admin=true">back to dashboard</a>

<?php
}
}
/* {/block "body"} */
}
