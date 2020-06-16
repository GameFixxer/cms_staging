<?php
/* Smarty version 3.1.36, created on 2020-06-16 08:59:36
  from '/home/rene/PhpstormProjects/MVC/templates/dist/rootDashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee86dd81cca10_77184077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a9b288b89314d8fb4982ce96713d06f1db93f96' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/rootDashboard.tpl',
      1 => 1592290773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee86dd81cca10_77184077 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3895935125ee86dd81b1d62_80237505', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12430829535ee86dd81bad38_74870778', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9704637525ee86dd81bf1f7_44035778', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9620634535ee86dd81c2dd6_94020910', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2917815515ee86dd81c8913_26514496', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_3895935125ee86dd81b1d62_80237505 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_3895935125ee86dd81b1d62_80237505',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_12430829535ee86dd81bad38_74870778 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_12430829535ee86dd81bad38_74870778',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Welcome to the Backstagearea<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_9704637525ee86dd81bf1f7_44035778 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_9704637525ee86dd81bf1f7_44035778',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_9620634535ee86dd81c2dd6_94020910 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_9620634535ee86dd81c2dd6_94020910',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_2917815515ee86dd81c8913_26514496 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2917815515ee86dd81c8913_26514496',
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
            <div class="container">
                <a class="btn btn-primary btn-lg text-uppercase"
                   name="edit" href="/Index.php?cl=product&page=list&admin=true"
                   type="submit"> Manage our Products.
                </a>
                <a class="btn btn-primary btn-lg text-uppercase"
                   name="edit" href="/Index.php?cl=user&page=list&admin=true"
                   type="submit"> Manage our User.
                </a>
            </div>
            <br>
            <br>
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
