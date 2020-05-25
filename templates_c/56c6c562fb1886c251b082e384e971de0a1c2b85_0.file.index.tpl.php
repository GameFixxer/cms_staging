<?php
/* Smarty version 3.1.36, created on 2020-05-15 12:59:15
  from '/home/rene/PhpstormProjects/MVC/templates/dist/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ebe7603f37e93_37289798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56c6c562fb1886c251b082e384e971de0a1c2b85' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/index.tpl',
      1 => 1589540336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe7603f37e93_37289798 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15779931595ebe7603f22b47_94453925', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5183815385ebe7603f25037_19989828', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_627243985ebe7603f27091_62565923', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11651896835ebe7603f29352_98565326', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14768359805ebe7603f2b468_15199041', "body");
?>

</html>
<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_15779931595ebe7603f22b47_94453925 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_15779931595ebe7603f22b47_94453925',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_5183815385ebe7603f25037_19989828 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_5183815385ebe7603f25037_19989828',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Here you will find everything you need<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_627243985ebe7603f27091_62565923 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_627243985ebe7603f27091_62565923',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_11651896835ebe7603f29352_98565326 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_11651896835ebe7603f29352_98565326',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_14768359805ebe7603f2b468_15199041 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_14768359805ebe7603f2b468_15199041',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Productlist</h2>
                <h3 class="section-subheading text-muted">All available products are here.</h3>
            </div>
            <div class="row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productList']->value, 'page', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link"
                           href="http://localhost:8080/Index.php?cl=detail&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
">
                            <div class="portfolio-hover" id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
>
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt=""/></a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();?>
</div>
                            <div class="portfolio-caption-subheading text-muted"><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductDescription();?>
</div>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        </div>
    </section>
    </body>
<?php
}
}
/* {/block "body"} */
}
