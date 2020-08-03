<?php
/* Smarty version 3.1.36, created on 2020-08-03 09:59:03
  from '/home/rene/PhpstormProjects/MVC/templates/dist/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f27c3c7224d30_81993336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56c6c562fb1886c251b082e384e971de0a1c2b85' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/index.tpl',
      1 => 1596441541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f27c3c7224d30_81993336 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5043257725f27c3c71ff9c7_23649090', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14228472135f27c3c72029b8_13318917', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11758208925f27c3c7205313_36229818', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3664659115f27c3c7207b83_93485257', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11517281685f27c3c720a3d1_20806853', "body");
?>

</html>
<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "subtitel_h1"} */
class Block_5043257725f27c3c71ff9c7_23649090 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_5043257725f27c3c71ff9c7_23649090',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_14228472135f27c3c72029b8_13318917 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_14228472135f27c3c72029b8_13318917',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Here you will find everything you need<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_11758208925f27c3c7205313_36229818 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_11758208925f27c3c7205313_36229818',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_3664659115f27c3c7207b83_93485257 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_3664659115f27c3c7207b83_93485257',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_11517281685f27c3c720a3d1_20806853 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_11517281685f27c3c720a3d1_20806853',
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productlist']->value, 'page', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <object class="portfolio-item" id="<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
" data-title=<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
>
                            <a class="portfolio-link"
                               href=/Index.php?cl=detail&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
>
                                <div class="portfolio-hover"
                                     data-title=<?php echo $_smarty_tpl->tpl_vars['page']->value->getName();?>
 id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
>
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt=""/></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $_smarty_tpl->tpl_vars['page']->value->getName();?>
</div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $_smarty_tpl->tpl_vars['page']->value->getDescription();?>
</div>
                            </div>
                            <form id="updateform" name="updateform" action="" method="post">
                            <td>
                                <button class="btn btn-primary btn-sm text-uppercase" id="add" data-title=<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
 name="add"
                                        type="submit" value=<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
>Add
                                </button>
                            </td>
                                </form>
                        </object>
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
