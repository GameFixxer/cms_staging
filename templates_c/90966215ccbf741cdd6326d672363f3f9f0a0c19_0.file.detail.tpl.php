<?php
/* Smarty version 3.1.36, created on 2020-05-12 11:33:29
  from '/home/rene/PhpstormProjects/MVC/templates/dist/detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eba6d6958e5d5_69522568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90966215ccbf741cdd6326d672363f3f9f0a0c19' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/detail.tpl',
      1 => 1589275821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eba6d6958e5d5_69522568 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html lang="en">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8850930975eba6d69573391_15736118', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2366734415eba6d69579e94_65210831', "subtitel_h1");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3556616655eba6d6957ca87_22487847', "titel");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_401560325eba6d6957f631_50592000', "titel_button");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1798127805eba6d69582697_15054264', "titel_button_href");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1704447285eba6d69584c80_87960887', "body");
?>

</html><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "title"} */
class Block_8850930975eba6d69573391_15736118 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_8850930975eba6d69573391_15736118',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Detail:<?php echo $_smarty_tpl->tpl_vars['id']->value->getProductName();?>

<?php
}
}
/* {/block "title"} */
/* {block "subtitel_h1"} */
class Block_2366734415eba6d69579e94_65210831 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitel_h1' => 
  array (
    0 => 'Block_2366734415eba6d69579e94_65210831',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error 404 Page not found<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_3556616655eba6d6957ca87_22487847 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel' => 
  array (
    0 => 'Block_3556616655eba6d6957ca87_22487847',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
The page you're looking for doesn't exist<?php
}
}
/* {/block "titel"} */
/* {block "titel_button"} */
class Block_401560325eba6d6957f631_50592000 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button' => 
  array (
    0 => 'Block_401560325eba6d6957f631_50592000',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Back to home<?php
}
}
/* {/block "titel_button"} */
/* {block "titel_button_href"} */
class Block_1798127805eba6d69582697_15054264 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titel_button_href' => 
  array (
    0 => 'Block_1798127805eba6d69582697_15054264',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"http://localhost:8080/Index.php?cl=home"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "body"} */
class Block_1704447285eba6d69584c80_87960887 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1704447285eba6d69584c80_87960887',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

ID: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductId();?>

<br>
Productname: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductName();?>

<br>
Description: <?php echo $_smarty_tpl->tpl_vars['id']->value->getProductDescription();?>

<br>
<div class="portfolio-modal modal fade" id=<?php echo $_smarty_tpl->tpl_vars['id']->value->getProductId();?>
 tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg"/></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/01-full.jpg" alt=""/>
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
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

    <?php
}
}
/* {/block "body"} */
}
