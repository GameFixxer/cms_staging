<?php
/* Smarty version 3.1.36, created on 2020-05-08 09:45:10
  from '/home/rene/PhpstormProjects/MVC/templates/productEditPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb50e06f08c49_91410326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63e9ab0cd3bf51e2b95da9ffdc266808b2d7006b' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/productEditPage.tpl',
      1 => 1588923899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb50e06f08c49_91410326 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15479501005eb50e06eca9f2_10232072', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2445003875eb50e06ee3552_28464397', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_15479501005eb50e06eca9f2_10232072 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_15479501005eb50e06eca9f2_10232072',
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
class Block_2445003875eb50e06ee3552_28464397 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2445003875eb50e06ee3552_28464397',
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
    <a href="http://localhost:8080/Index.php?cl=dashboard&page=detail&admin=true">back to dashboard</a>

<?php
}
}
/* {/block "body"} */
}
