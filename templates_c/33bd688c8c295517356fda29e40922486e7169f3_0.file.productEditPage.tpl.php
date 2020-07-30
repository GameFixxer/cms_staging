<?php
/* Smarty version 3.1.36, created on 2020-07-30 11:53:57
  from '/home/rene/PhpstormProjects/MVC/templates/dist/productEditPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2298b5b5ac73_59658213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33bd688c8c295517356fda29e40922486e7169f3' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/productEditPage.tpl',
      1 => 1596101824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2298b5b5ac73_59658213 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="en">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15402601925f2298b5b3d473_42476034', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3414070425f2298b5b40312_49524089', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5496066155f2298b5b433a0_31558225', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_706663275f2298b5b49825_18996895', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15565210235f2298b5b4c3f9_53582693', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3489021565f2298b5b4f038_30775556', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4365255235f2298b5b51847_49673562', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_15402601925f2298b5b3d473_42476034 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_15402601925f2298b5b3d473_42476034',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "title"} */
/* {block "subtitel_h1"} */
class Block_3414070425f2298b5b40312_49524089 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_3414070425f2298b5b40312_49524089',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_5496066155f2298b5b433a0_31558225 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_5496066155f2298b5b433a0_31558225',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Detail:<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductName();
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_706663275f2298b5b49825_18996895 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_706663275f2298b5b49825_18996895',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_15565210235f2298b5b4c3f9_53582693 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_15565210235f2298b5b4c3f9_53582693',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "baselayout"} */
class Block_3489021565f2298b5b4f038_30775556 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_3489021565f2298b5b4f038_30775556',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_4365255235f2298b5b51847_49673562 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4365255235f2298b5b51847_49673562',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<body>
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">ID: <?php echo $_smarty_tpl->tpl_vars['product']->value->getArticleNumber();?>
-<?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</h2>
            <h3 class="section-subheading text-muted"></h3>
                <div class="text-center">
                    <h2 class="text-uppercase"></h2>
                    <p class="item-intro text-muted"></p>
                    <form id="updateform" name="updateform" action="" method="post">
                        <div class="row align-items-stretch mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="text-center">
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
                                    <div id="submit">
                                        <button class="btn btn-primary btn-group-sm text-uppercase" id="save"
                                                name="save" type="submit" value=<?php echo $_smarty_tpl->tpl_vars['product']->value->getArticleNumber();?>
>
                                            Update
                                    </div>
                                </div>
                            </div>
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
</body>
<?php
}
}
/* {/block "body"} */
}
