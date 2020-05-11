<?php
/* Smarty version 3.1.36, created on 2020-05-11 17:43:05
  from '/home/rene/PhpstormProjects/MVC/templates/dist/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eb97289ecc888_82655050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67bdcf04fd0d1717bb2bbd650a40376ac04e4919' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/home.tpl',
      1 => 1589211769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index.html' => 1,
  ),
),false)) {
function content_5eb97289ecc888_82655050 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169985305eb97289eae913_79527333', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15558506285eb97289ec8a33_57024691', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_169985305eb97289eae913_79527333 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_169985305eb97289eae913_79527333',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:index.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('logo'=>'http://my.domain.com/logo.gif'), 0, false);
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_15558506285eb97289ec8a33_57024691 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15558506285eb97289ec8a33_57024691',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 There is no place like 127.0.0.1 <?php
}
}
/* {/block "body"} */
}
