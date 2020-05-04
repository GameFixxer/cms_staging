<?php
/* Smarty version 3.1.36, created on 2020-05-04 14:12:57
  from '/home/rene/PhpstormProjects/MVC/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb006c9b29e29_34868750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec2bb698ac3b49d145fa292ccf16f5604df47b14' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/login.tpl',
      1 => 1588143293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb006c9b29e29_34868750 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19625952585eb006c9b24768_96335310', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13662062565eb006c9b280f8_47902804', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_19625952585eb006c9b24768_96335310 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_19625952585eb006c9b24768_96335310',
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
class Block_13662062565eb006c9b280f8_47902804 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_13662062565eb006c9b280f8_47902804',
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
