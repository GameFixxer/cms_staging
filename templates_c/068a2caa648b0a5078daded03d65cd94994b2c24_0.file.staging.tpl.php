<?php
/* Smarty version 3.1.36, created on 2020-04-27 16:32:26
  from '/home/rene/PhpstormProjects/MVC/templates/staging.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea6ecfa9aed94_15664466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '068a2caa648b0a5078daded03d65cd94994b2c24' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/staging.tpl',
      1 => 1587997667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea6ecfa9aed94_15664466 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1570827295ea6ecfa9ab987_27676300', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4042958005ea6ecfa9adbf0_46390986', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_1570827295ea6ecfa9ab987_27676300 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1570827295ea6ecfa9ab987_27676300',
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
class Block_4042958005ea6ecfa9adbf0_46390986 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4042958005ea6ecfa9adbf0_46390986',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <form action="../App/Controller/Backend.php" method="post">
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
