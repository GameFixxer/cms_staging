<?php
/* Smarty version 3.1.36, created on 2020-04-28 11:40:11
  from '/home/rene/PhpstormProjects/MVC/templates/staging.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea7f9fb2a6059_22692326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '068a2caa648b0a5078daded03d65cd94994b2c24' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/staging.tpl',
      1 => 1588066804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea7f9fb2a6059_22692326 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16701626695ea7f9fb29a125_23079389', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8388359225ea7f9fb2a20d2_03816399', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_16701626695ea7f9fb29a125_23079389 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_16701626695ea7f9fb29a125_23079389',
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
class Block_8388359225ea7f9fb2a20d2_03816399 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_8388359225ea7f9fb2a20d2_03816399',
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
