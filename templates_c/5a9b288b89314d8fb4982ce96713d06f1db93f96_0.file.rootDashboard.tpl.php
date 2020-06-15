<?php
/* Smarty version 3.1.36, created on 2020-06-15 13:00:55
  from '/home/rene/PhpstormProjects/MVC/templates/dist/rootDashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee754e7257ae8_20280225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a9b288b89314d8fb4982ce96713d06f1db93f96' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/rootDashboard.tpl',
      1 => 1592218851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee754e7257ae8_20280225 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6018707875ee754e7246bf6_52002634', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18040056545ee754e724a5b6_42277123', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20369307875ee754e724e1a2_81925324', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16108059435ee754e72516a6_65033452', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11999921595ee754e7254592_48566733', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_6018707875ee754e7246bf6_52002634 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_6018707875ee754e7246bf6_52002634',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_18040056545ee754e724a5b6_42277123 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_18040056545ee754e724a5b6_42277123',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Welcome to the Backstagearea<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_20369307875ee754e724e1a2_81925324 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_20369307875ee754e724e1a2_81925324',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_16108059435ee754e72516a6_65033452 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_16108059435ee754e72516a6_65033452',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_11999921595ee754e7254592_48566733 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_11999921595ee754e7254592_48566733',
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
                <button class="btn btn-primary btn-lg text-uppercase" id="logout" name="logout" type="submit">
                    Logout
                </button>
            </form>
        </div>
    </section>

    </body>
<?php
}
}
/* {/block "body"} */
}
