<?php
/* Smarty version 3.1.36, created on 2020-06-15 11:22:55
  from '/home/rene/PhpstormProjects/MVC/templates/dist/userDashboardList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee73def15b395_19785335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '893720de6b425f818165ea37d3d03009ab5d8cb3' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/userDashboardList.tpl',
      1 => 1592212840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee73def15b395_19785335 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7994812105ee73def12b9d2_07572616', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15645205995ee73def12fd74_60240670', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5097121485ee73def133616_60036019', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20936914055ee73def136d16_33533523', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21086054625ee73def13a415_05534692', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_7994812105ee73def12b9d2_07572616 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_7994812105ee73def12b9d2_07572616',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_15645205995ee73def12fd74_60240670 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_15645205995ee73def12fd74_60240670',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Welcome to the Backstagearea<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_5097121485ee73def133616_60036019 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_5097121485ee73def133616_60036019',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_20936914055ee73def136d16_33533523 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_20936914055ee73def136d16_33533523',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_21086054625ee73def13a415_05534692 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_21086054625ee73def13a415_05534692',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Productlist</h2>
                <h3 class="section-subheading text-muted">Manage our products</h3>
            </div>
            <form id="deleteUpdateForm" name="deleteUpdateform" action="" method="post">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Productname</th>
                        <th scope="col">Description</th>
                        <th scope="col"></th>
                        <th scope="col">
                        </th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productlist']->value, 'page', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                    </thead>
                    <tbody id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
>
                    <tr>
                        <th scope="row" id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductDescription();?>
<td>
                        </td>
                        <th scope="col"><a class="btn btn-primary btn-sm text-uppercase" data-title=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
 id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>

                                           name="edit" href="http://localhost:8080/Index.php?cl=product&page=detail&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
&admin=true"
                                           type="submit">Show details
                            </a></th>
                    </tr
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="text-center">
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
