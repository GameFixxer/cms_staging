<?php
/* Smarty version 3.1.36, created on 2020-05-14 10:21:04
  from '/home/rene/PhpstormProjects/MVC/templates/dist/productEditPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ebcff70a3fdf5_88490969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33bd688c8c295517356fda29e40922486e7169f3' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/productEditPage.tpl',
      1 => 1589444461,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebcff70a3fdf5_88490969 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="en">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13179653465ebcff70a0ef80_58843011', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12277997445ebcff70a138e4_32949847', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1058588235ebcff70a16de7_24883796', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3100184075ebcff70a1c261_24705358', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13383896895ebcff70a200c7_97601969', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17106874415ebcff70a23ed5_19002619', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21013199655ebcff70a29830_42333144', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_13179653465ebcff70a0ef80_58843011 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_13179653465ebcff70a0ef80_58843011',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "title"} */
/* {block "subtitel_h1"} */
class Block_12277997445ebcff70a138e4_32949847 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_12277997445ebcff70a138e4_32949847',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_1058588235ebcff70a16de7_24883796 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_1058588235ebcff70a16de7_24883796',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Detail:<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductName();
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_3100184075ebcff70a1c261_24705358 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_3100184075ebcff70a1c261_24705358',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_13383896895ebcff70a200c7_97601969 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_13383896895ebcff70a200c7_97601969',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "baselayout"} */
class Block_17106874415ebcff70a23ed5_19002619 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_17106874415ebcff70a23ed5_19002619',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_21013199655ebcff70a29830_42333144 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_21013199655ebcff70a29830_42333144',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<body>
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Detail page</h2>
            <h3 class="section-subheading text-muted"></h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#model"
                    >
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt=""
                        /></a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Name: <?php echo $_smarty_tpl->tpl_vars['product']->value->getProductName();?>
</div>
                        <div class="portfolio-caption-subheading text-muted">Id:<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="form-group">
                    <label class="switch">
                        <input type="checkbox" id="save" name="save" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
">
                        Update Product<span class="slider round"></span>
                    </label>
                </div>
                <form id="updateform" name="form" action="" method="post">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="hidden" name="page" value="backend">
                                <input class="form-control" id="newpagename" type="text" name="newpagename"
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
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-lg text-uppercase" id="Submit" type="submit"
                                value="commit">
                            Commit
                        </button>
                    </div>
                </form>
            </div>

        </div>


    </div>
    <div class="text-center">
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger"
           href="http://localhost:8080/Index.php?cl=product&page=list&admin=true">Return to productlist</a>
    </div>
</section>
<div class="portfolio-modal modal fade" id="model" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg"/>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['product']->value->getProductName();?>
</h2>
                            <p class="item-intro text-muted">ID: <?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
</p>
                            <img class="img-fluid d-block mx-auto"
                                 src="assets/img/portfolio/01-full.jpg" alt=""/>
                            <p>Description: <?php echo $_smarty_tpl->tpl_vars['product']->value->getProductDescription();?>
!</p>
                            <ul class="list-inline">
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                        class="fas fa-times mr-1"></i>Close Product

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
