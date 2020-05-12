<?php
/* Smarty version 3.1.36, created on 2020-05-12 15:06:35
  from '/home/rene/PhpstormProjects/MVC/templates/dist/productEditPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eba9f5bd03d27_88158365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33bd688c8c295517356fda29e40922486e7169f3' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/productEditPage.tpl',
      1 => 1589288794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eba9f5bd03d27_88158365 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1780716905eba9f5bcf0c18_19087953', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11643779265eba9f5bcf6cc8_64981020', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_1780716905eba9f5bcf0c18_19087953 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1780716905eba9f5bcf0c18_19087953',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Detail:<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();?>

<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_11643779265eba9f5bcf6cc8_64981020 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_11643779265eba9f5bcf6cc8_64981020',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    ID: <?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>

    <br>
    Productname: <?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();?>

    <br>
    Description: <?php echo $_smarty_tpl->tpl_vars['page']->value->getProductDescription();?>

    <br>
    <hr/>
    <form id="form" name="form" action="" method="post">
        <input type="radio" name="delete" value=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
>Delete Product</label>
        <input type="radio" name="save" value=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
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
