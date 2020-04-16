<?php
/* Smarty version 3.1.36, created on 2020-04-16 08:58:01
  from '/home/rene/PhpstormProjects/MVC/templates/404_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e9801f96410e5_99467776',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6700f453d94aed81153e384ae9de30a64cc5d8ea' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/404_.tpl',
      1 => 1587020218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9801f96410e5_99467776 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4440723095e9801f963ca01_70157755', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4752209455e9801f963f9c0_55373163', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_4440723095e9801f963ca01_70157755 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_4440723095e9801f963ca01_70157755',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Page Title
<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_4752209455e9801f963f9c0_55373163 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4752209455e9801f963f9c0_55373163',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "body"} */
}
