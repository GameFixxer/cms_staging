<?php
/* Smarty version 3.1.36, created on 2020-08-05 14:25:43
  from '/home/rene/PhpstormProjects/MVC/templates/dist/detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2aa547428843_69431036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90966215ccbf741cdd6326d672363f3f9f0a0c19' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/detail.tpl',
      1 => 1596441541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2aa547428843_69431036 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="en">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9423330825f2aa5473fd8f6_07463738', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3665789295f2aa547401754_31590188', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16073515785f2aa547404d75_68159581', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20862966955f2aa54740d802_64023427', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5591754905f2aa547410160_77501860', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13174733575f2aa547412a80_68225418', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15477017255f2aa5474151a0_18000789', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_9423330825f2aa5473fd8f6_07463738 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9423330825f2aa5473fd8f6_07463738',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "title"} */
/* {block "subtitel_h1"} */
class Block_3665789295f2aa547401754_31590188 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_3665789295f2aa547401754_31590188',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_16073515785f2aa547404d75_68159581 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_16073515785f2aa547404d75_68159581',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Detail:<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_20862966955f2aa54740d802_64023427 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_20862966955f2aa54740d802_64023427',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_5591754905f2aa547410160_77501860 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_5591754905f2aa547410160_77501860',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "baselayout"} */
class Block_13174733575f2aa547412a80_68225418 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_13174733575f2aa547412a80_68225418',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_15477017255f2aa5474151a0_18000789 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15477017255f2aa5474151a0_18000789',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>  <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Detail page</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#model"
                        ><div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt=""
                            /></a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Name: <?php echo $_smarty_tpl->tpl_vars['page']->value->getName();?>
</div>
                            <div class="portfolio-caption-subheading text-muted">Id:<?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
</div>
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
                </div>
            </div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="http://localhost:8080/Index.php?cl=list">Return to productlist</a>
        </div>


    </section>
    <div class="portfolio-modal modal fade" id="model" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal" ><img src="assets/img/close-icon.svg"/>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['page']->value->getName();?>
</h2>
                                <p class="item-intro text-muted">ID: <?php echo $_smarty_tpl->tpl_vars['page']->value->getArticleNumber();?>
</p>
                                <img class="img-fluid d-block mx-auto"
                                     src="assets/img/portfolio/01-full.jpg" alt=""/>
                                <p>Description: <?php echo $_smarty_tpl->tpl_vars['page']->value->getDescription();?>
!</p>
                                <ul class="list-inline">
                                    <li></li>
                                    <li></li>
                                    <li></li>
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
    </body>
<?php
}
}
/* {/block "body"} */
}
