<?php
/* Smarty version 3.1.36, created on 2020-04-29 09:00:38
  from '/home/rene/PhpstormProjects/MVC/templates/login_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea92616f0feb7_65903192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '541e308fc4c466a09411e0cdaada6e0c56322005' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/login_.tpl',
      1 => 1588143293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea92616f0feb7_65903192 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12483411695ea92616f095e4_95447606', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18179695765ea92616f0d9f7_67351965', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_12483411695ea92616f095e4_95447606 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_12483411695ea92616f095e4_95447606',
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
class Block_18179695765ea92616f0d9f7_67351965 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_18179695765ea92616f0d9f7_67351965',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <form action="" method="post">
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
