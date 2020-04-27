<?php
/* Smarty version 3.1.36, created on 2020-04-27 13:44:18
  from '/home/rene/PhpstormProjects/MVC/templates/login_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea6c59219c169_29076296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '541e308fc4c466a09411e0cdaada6e0c56322005' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/login_.tpl',
      1 => 1587987788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea6c59219c169_29076296 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17434225865ea6c592196b90_12084291', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10897755015ea6c59219a836_40332368', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_17434225865ea6c592196b90_12084291 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_17434225865ea6c592196b90_12084291',
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
class Block_10897755015ea6c59219a836_40332368 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_10897755015ea6c59219a836_40332368',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Welcome to the backstage Area!<br><br>
    Please Enter your credentials in order to log in!<br><br>
        hint &username=your-username&password=your-password
<?php
}
}
/* {/block "body"} */
}
