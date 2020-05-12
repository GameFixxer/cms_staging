<?php
/* Smarty version 3.1.36, created on 2020-05-12 10:21:11
  from '/home/rene/PhpstormProjects/MVC/templates/dist/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eba5c77d69f49_25023019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3cc36aded055b21f64b188f4a373b72c2fbd18c' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/404.tpl',
      1 => 1589271666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eba5c77d69f49_25023019 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8386736125eba5c77d4e861_53294911', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4517653455eba5c77d538a0_34223549', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7417114435eba5c77d59711_20286332', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8343838935eba5c77d5f500_37838218', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7130896625eba5c77d64b28_63108657', "titel_button_href");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_8386736125eba5c77d4e861_53294911 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_8386736125eba5c77d4e861_53294911',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "title"} */
/* {block "subtitel_h1"} */
class Block_4517653455eba5c77d538a0_34223549 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_4517653455eba5c77d538a0_34223549',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_7417114435eba5c77d59711_20286332 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_7417114435eba5c77d59711_20286332',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
The page you're looking for doesn't exist<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_8343838935eba5c77d5f500_37838218 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_8343838935eba5c77d5f500_37838218',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_7130896625eba5c77d64b28_63108657 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_7130896625eba5c77d64b28_63108657',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
}
