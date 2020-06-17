<?php
/* Smarty version 3.1.36, created on 2020-06-17 11:03:25
  from '/home/rene/PhpstormProjects/MVC/templates/dist/userDashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee9dc5d7f4945_62682811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c01f82cb5c0b2938b53bf101db96a21723cef38' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/userDashboard.tpl',
      1 => 1592292375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9dc5d7f4945_62682811 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14209027715ee9dc5d7e35d4_69376648', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15785182995ee9dc5d7e6bc2_20783705', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3754187235ee9dc5d7e9e91_36982135', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21301752155ee9dc5d7ecd04_24816843', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12879284415ee9dc5d7f01e6_13779268', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_14209027715ee9dc5d7e35d4_69376648 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_14209027715ee9dc5d7e35d4_69376648',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_15785182995ee9dc5d7e6bc2_20783705 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_15785182995ee9dc5d7e6bc2_20783705',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Welcome to the Backstagearea<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_3754187235ee9dc5d7e9e91_36982135 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_3754187235ee9dc5d7e9e91_36982135',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_21301752155ee9dc5d7ecd04_24816843 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_21301752155ee9dc5d7ecd04_24816843',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_12879284415ee9dc5d7f01e6_13779268 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12879284415ee9dc5d7f01e6_13779268',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Dashboard</h2>
                <h3 class="section-subheading text-muted">Welcome to your Dashboard <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</h3>
            </div>

        </div>
        <div class="text-center">
            <form id="logout" name="logout" action="" method="post">
                <a class="btn btn-primary btn-lg text-uppercase"
                   name="edit" href="/Index.php?cl=login&page=logout&admin=true"
                   type="submit"> Logout
                </a>
            </form>
        </div>
    </section>

    </body>
<?php
}
}
/* {/block "body"} */
}
