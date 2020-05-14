<?php
/* Smarty version 3.1.36, created on 2020-05-14 12:12:44
  from '/home/rene/PhpstormProjects/MVC/templates/dist/productEditList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ebd199c489147_07094029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72ca129031a22be710a8eaa2af82f057d677638c' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/productEditList.tpl',
      1 => 1589450983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebd199c489147_07094029 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9103482025ebd199c454011_49855824', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20432816655ebd199c45c153_19086055', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12493240855ebd199c461a78_19298611', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5058277955ebd199c467b76_15294239', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13338154025ebd199c46eaa5_68408941', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_9103482025ebd199c454011_49855824 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_9103482025ebd199c454011_49855824',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_20432816655ebd199c45c153_19086055 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_20432816655ebd199c45c153_19086055',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Welcome to the Backstagearea<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_12493240855ebd199c461a78_19298611 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_12493240855ebd199c461a78_19298611',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_5058277955ebd199c467b76_15294239 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_5058277955ebd199c467b76_15294239',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_13338154025ebd199c46eaa5_68408941 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_13338154025ebd199c46eaa5_68408941',
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
            <form id="deleteForm" name="deleteform" action="" method="post">
                <div class="row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productlist']->value, 'page', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="portfolio-item">
                                <a class="portfolio-link"
                                   href="http://localhost:8080/Index.php?cl=product&page=detail&admin=true&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt=""/></a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input type="checkbox" id="delete" name="delete"
                                                       value="<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
">
                                                <span class="slider round"></span>
                                            </label>
                                            <?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();?>
</div>
                                    </div>
                                    <div class="portfolio-caption-subheading text-muted"><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductDescription();?>
</div>
                                </div>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#model">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/00-thumbnail.jpg" alt=""
                                /></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Name:</div>
                                <div class="portfolio-caption-subheading text-muted">Id:</div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-md-left">
                    <div id="deleteing"></div>
                    <button class="btn btn-primary btn-group-sm text-uppercase" id="Delete" type="submit"
                            value="delete">
                        Delete
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center">
            <form id="logout" name="logout" action="" method="post">
                <button class="btn btn-primary btn-lg text-uppercase" id="logout" type="logout"
                        value="logout">
                    Logout
                </button>
            </form>
        </div>
    </section>
    <div class="portfolio-modal modal fade" id="model" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg"/></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">New Product</h2>
                                <p class="item-intro text-muted">Trage hier den neuen Productnamen ein.</p>
                                <form id="updateform" name="updateform" action="" method="post">
                                    <div class="row align-items-stretch mb-5">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" name="page" value="backend">
                                                <input class="form-control" id="newpagename" type="text"
                                                       name="newpagename"
                                                       placeholder="Productname"
                                                       data-validation-required-message="Please enter your name."/>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="newpagedescription" type="text"
                                                       name="newpagedescription"
                                                       placeholder="Description"
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" id="save" name="save"
                                                <span class="slider round"></span>
                                                Yes, i want to make theese changes.
                                            </label>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <div id="create"></div>
                                        <button class="btn btn-primary btn-group-sm text-uppercase" id="save"
                                                type="submit"
                                                value="save">
                                            Create
                                    </div>
                                </form>
                                <p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                                class="fas fa-times mr-1"></i>Close Project
                                    </button>
                            </div>
                        </div>
                    </div>
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
