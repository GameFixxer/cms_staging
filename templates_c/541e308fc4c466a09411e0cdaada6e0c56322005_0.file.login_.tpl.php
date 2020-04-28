<?php
/* Smarty version 3.1.36, created on 2020-04-28 14:46:52
  from '/home/rene/PhpstormProjects/MVC/templates/login_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea825bc6422e6_58371174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '541e308fc4c466a09411e0cdaada6e0c56322005' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/login_.tpl',
      1 => 1588066876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea825bc6422e6_58371174 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6063983105ea825bc63d653_15192455', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18629807605ea825bc6407a6_81284278', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_6063983105ea825bc63d653_15192455 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6063983105ea825bc63d653_15192455',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Backend Login
<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_18629807605ea825bc6407a6_81284278 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_18629807605ea825bc6407a6_81284278',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <form action="http://localhost:8080/Index.php?" method="get">
        <input type="hidden" name="page" value="backend">
        <label for="username">Username:</label>
        <input type="text" name="username" /><br />
        <label for="password">Password:</label>
        <input type="password" id="pwd" name="password">
        <input type="Submit" value="Submit" />
    </form>
<?php
}
}
/* {/block "body"} */
}
