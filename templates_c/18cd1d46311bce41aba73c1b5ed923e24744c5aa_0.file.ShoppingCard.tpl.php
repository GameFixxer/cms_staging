<?php
/* Smarty version 3.1.36, created on 2020-08-03 13:30:54
  from '/home/rene/PhpstormProjects/MVC/templates/dist/ShoppingCard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f27f56e22ea28_68816143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18cd1d46311bce41aba73c1b5ed923e24744c5aa' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/ShoppingCard.tpl',
      1 => 1596454252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f27f56e22ea28_68816143 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5523240405f27f56e1f2bd0_03593806', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18989782175f27f56e1f6462_94238083', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7691161245f27f56e1f9470_21342438', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2519870675f27f56e1fcbe6_85220079', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5956599195f27f56e1ffed1_51881602', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_5523240405f27f56e1f2bd0_03593806 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_5523240405f27f56e1f2bd0_03593806',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_18989782175f27f56e1f6462_94238083 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_18989782175f27f56e1f6462_94238083',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Your Shoppingcard<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_7691161245f27f56e1f9470_21342438 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_7691161245f27f56e1f9470_21342438',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_2519870675f27f56e1fcbe6_85220079 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_2519870675f27f56e1fcbe6_85220079',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_5956599195f27f56e1ffed1_51881602 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_5956599195f27f56e1ffed1_51881602',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">ShoppingCard</h2>
                <h3 class="section-subheading text-muted">Manage our products</h3>
            </div>
            <form id="deleteUpdateForm" name="deleteUpdateform" action="" method="post">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Articlenumber</th>
                        <th scope="col">Productname</th>
                        <th scope="col">Price</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Total</th>
                    </tr>
                    <?php if (!empty($_smarty_tpl->tpl_vars['productlist']->value)) {?>
                    <?php $_smarty_tpl->_assignInScope('total', 0);?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productlist']->value, 'page', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['page']->value->getPrice());?>
                    </thead>
                    <tbody id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
>
                    <tr>
                        <th scope="row" id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
><?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['page']->value->getName();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['page']->value->getPrice();?>
</td>
                    </tr
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <tr>
                        <th scope="row" id="sum">Total:</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> Total: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
                    </tr
                    <?php }?>
                    </tbody>
                </table>
            </form>
        </div>
    </section>
    <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-center">
                    <h2 class="text-uppercase">New Product</h2>
                    <p class="item-intro text-muted"></p>
                    <form id="create" name="createform" action="" method="post">
                        <div class="row align-items-stretch mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="text-center">
                                        <input type="hidden" name="save" value="save">
                                        <label> Productname:</label>
                                        <input class="form-control" id="newpagename" type="text"
                                               name="newpagename"
                                               placeholder="Productname"
                                               data-validation-required-message="Please enter your name."/>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> Description:</label>
                                    <input class="form-control" id="newpagedescription" type="text"
                                           name="newpagedescription"
                                           placeholder="Description"
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="text-center">
                                    <div id="create">
                                        <button class="btn btn-primary btn-group-sm text-uppercase" id="save"
                                                name="save" type="submit">
                                            Create
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p>
                        <button class="btn btn-primary btn-sm" data-dismiss="modal" type="button"><i
                                    class="fas fa-times mr-1"></i>Discard
                        </button>
                </div>
            </div>
        </div>
    </div>


    </body>
<?php
}
}
/* {/block "body"} */
}
