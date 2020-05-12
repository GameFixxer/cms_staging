<?php
/* Smarty version 3.1.36, created on 2020-05-12 11:39:19
  from '/home/rene/PhpstormProjects/MVC/templates/dist/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eba6ec7b94fe9_94557387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56c6c562fb1886c251b082e384e971de0a1c2b85' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/index.tpl',
      1 => 1589276357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eba6ec7b94fe9_94557387 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16585299965eba6ec7b61537_44102872', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17846948825eba6ec7b673a1_36867903', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10434839625eba6ec7b6c985_01908520', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8244368735eba6ec7b72012_66029903', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12726883245eba6ec7b780c3_28369674', "body");
?>

</html>
<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_16585299965eba6ec7b61537_44102872 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_16585299965eba6ec7b61537_44102872',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_17846948825eba6ec7b673a1_36867903 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_17846948825eba6ec7b673a1_36867903',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
The page you're looking for doesn't exist<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_10434839625eba6ec7b6c985_01908520 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_10434839625eba6ec7b6c985_01908520',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_8244368735eba6ec7b72012_66029903 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_8244368735eba6ec7b72012_66029903',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_12726883245eba6ec7b780c3_28369674 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12726883245eba6ec7b780c3_28369674',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Productlist</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
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
                            <a class="portfolio-link" data-toggle="modal"
                               href="http://localhost:8080/Index.php?cl=detail&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
#<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
">
                                <div class="portfolio-hover">
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
                    <div class="portfolio-modal modal fade" id=""<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
 tabindex="-1" role="dialog"
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
                                                <h2 class="text-uppercase">Project Name</h2>
                                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet
                                                    consectetur.</p>
                                                <img class="img-fluid d-block mx-auto"
                                                     src="assets/img/portfolio/01-full.jpg" alt=""/>
                                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet,
                                                    consectetur
                                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus
                                                    dignissimos deserunt
                                                    repellat aperiam quasi sunt officia expedita beatae cupiditate,
                                                    maiores
                                                    repudiandae,
                                                    nostrum, reiciendis facere nemo!</p>
                                                <ul class="list-inline">
                                                    <li>Date: January 2020</li>
                                                    <li>Client: Threads</li>
                                                    <li>Category: Illustration</li>
                                                </ul>
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
