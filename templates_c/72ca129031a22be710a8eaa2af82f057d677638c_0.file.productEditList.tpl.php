<?php
/* Smarty version 3.1.36, created on 2020-06-16 10:42:03
  from '/home/rene/PhpstormProjects/MVC/templates/dist/productEditList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee885db8c6230_94182992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72ca129031a22be710a8eaa2af82f057d677638c' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/productEditList.tpl',
      1 => 1592296431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee885db8c6230_94182992 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9099765465ee885db8860f7_05796017', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17171720995ee885db889658_25683242', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17506461555ee885db88c4d6_13261767', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19143925805ee885db88f2b8_96739341', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9018240985ee885db8933f1_41982822', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_9099765465ee885db8860f7_05796017 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_9099765465ee885db8860f7_05796017',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_17171720995ee885db889658_25683242 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_17171720995ee885db889658_25683242',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Welcome to the Backstagearea<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_17506461555ee885db88c4d6_13261767 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_17506461555ee885db88c4d6_13261767',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_19143925805ee885db88f2b8_96739341 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_19143925805ee885db88f2b8_96739341',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_9018240985ee885db8933f1_41982822 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9018240985ee885db8933f1_41982822',
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
                            <button type="button" class="btn btn-primary btn-sm"  id="create" data-toggle="modal"
                                    data-target="#model">
                                Create
                            </button>
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
                        <td>
                            <button class="btn btn-primary btn-sm text-uppercase" id="delete" data-title=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
 name="delete"
                                    type="submit" value=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
>Delete
                            </button>
                        </td>
                        <th scope="col"><a class="btn btn-primary btn-sm text-uppercase" data-title=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
 id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>

                                           name="edit" href="http://localhost:8080/Index.php?cl=product&page=detail&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
&admin=true"
                                           type="submit">Edit
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
            <a href="/Index.php?cl=dashboard&admin=true" class="list-group-item list-group-item-action">Return to Dashboard</a>
            <form id="logout" name="logout" action="" method="post">
                <a class="btn btn-primary btn-lg text-uppercase"
                   name="edit" href="/Index.php?cl=login&page=logout&admin=true"
                   type="submit"> Logout
                </a>
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
