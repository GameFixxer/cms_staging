<?php
/* Smarty version 3.1.36, created on 2020-06-15 12:40:19
  from '/home/rene/PhpstormProjects/MVC/templates/dist/adminDashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee750130b43e8_18061881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fa160b4825db23750fbb30cfda9d8ad4a768174' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/adminDashboard.tpl',
      1 => 1592217613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee750130b43e8_18061881 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9532943685ee7501309d5c2_91721224', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13837037075ee750130a0b49_30746474', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17511527065ee750130a3ce2_10798468', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1466931605ee750130a8799_75985611', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8713018045ee750130ac0c3_64876528', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_9532943685ee7501309d5c2_91721224 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_9532943685ee7501309d5c2_91721224',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_13837037075ee750130a0b49_30746474 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_13837037075ee750130a0b49_30746474',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Welcome to the Backstagearea<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_17511527065ee750130a3ce2_10798468 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_17511527065ee750130a3ce2_10798468',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_1466931605ee750130a8799_75985611 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_1466931605ee750130a8799_75985611',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_8713018045ee750130ac0c3_64876528 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_8713018045ee750130ac0c3_64876528',
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
            <a class="btn btn-primary btn-lg text-uppercase"
                name="edit" href="/Index.php?cl=product&page=list&admin=true"
                type="submit"> Manage our Products.
            </a>
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
