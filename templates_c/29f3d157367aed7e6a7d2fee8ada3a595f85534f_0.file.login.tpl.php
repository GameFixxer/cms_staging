<?php
/* Smarty version 3.1.36, created on 2020-05-12 16:52:59
  from '/home/rene/PhpstormProjects/MVC/templates/dist/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ebab84b3bbf69_61271763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29f3d157367aed7e6a7d2fee8ada3a595f85534f' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/login.tpl',
      1 => 1589295075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebab84b3bbf69_61271763 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9914141195ebab84b3b3de7_37321977', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18879682185ebab84b3b9756_71549064', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "baselayout"} */
class Block_9914141195ebab84b3b3de7_37321977 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_9914141195ebab84b3b3de7_37321977',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_18879682185ebab84b3b9756_71549064 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_18879682185ebab84b3b9756_71549064',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section class="page-section" id="login">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Login Area</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <form novalidate="novalidate" method="post" id="contactForm" name="sentMessage">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="page" value="backend">
                            <input class="form-control" id="username" type="text" name="username"
                                   placeholder="Your Username *" required="required"
                                   data-validation-required-message="Please enter your name."/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" type="password" name="password"
                                   placeholder="Your Passwort *" required="required"
                                   data-validation-required-message="Please enter your email address."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div id="success"></div>
                    <button class="btn btn-primary btn-xl text-uppercase" id="Submit" type="Submit"
                            value="Submit" >
                        login
                    </button>
                </div>
            </form>
        </div>
    </section>
<?php
}
}
/* {/block "body"} */
}
