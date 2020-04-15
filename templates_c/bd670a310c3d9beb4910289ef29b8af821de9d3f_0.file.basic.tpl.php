<?php
/* Smarty version 3.1.36, created on 2020-04-15 17:15:43
  from '/home/rene/PhpstormProjects/MVC/templates/basic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5e97251fce1ea8_89890953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd670a310c3d9beb4910289ef29b8af821de9d3f' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/basic.tpl',
      1 => 1586963742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e97251fce1ea8_89890953 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7961000455e97251fcdd264_47175870', "title");
?>
</title>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3035965375e97251fce0076_81782617', "title");
?>
</title>  </head>
<body>
message message message
</body>
</html>

  <?php }
/* {block "title"} */
class Block_7961000455e97251fcdd264_47175870 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_7961000455e97251fcdd264_47175870',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "title"} */
class Block_3035965375e97251fce0076_81782617 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3035965375e97251fce0076_81782617',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
}
