<?php
/* Smarty version 3.1.36, created on 2020-06-17 11:07:21
  from '/home/rene/PhpstormProjects/MVC/templates/dist/setNewPassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee9dd49c52146_55304921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45404c15d198e03b1d2c8886fd3974440e2e657b' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/setNewPassword.tpl',
      1 => 1592384704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9dd49c52146_55304921 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19747095105ee9dd49c48959_80699427', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2570429265ee9dd49c4b961_87683692', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "baselayout"} */
class Block_19747095105ee9dd49c48959_80699427 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_19747095105ee9dd49c48959_80699427',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_2570429265ee9dd49c4b961_87683692 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2570429265ee9dd49c4b961_87683692',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section" id="login">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Login Area</h2>
                <h3 class="section-subheading text-muted">II am not a robot. I am not a monkey. I will not dance, even if
                    the beat is funky.</h3>
            </div>
            <form novalidate="novalidate" method="post" id="contactForm" name="sentMessage">
                <?php if ((isset($_smarty_tpl->tpl_vars['errorMessage']->value))) {?>
                    <?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>

                <?php }?>
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="password" type="text" name="password"
                                   placeholder="Your new password *" required="required"
                                   data-validation-required-message="Please enter your new password"/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div id="resetpassword">
                        <button class="btn btn-primary btn-xl text-uppercase" id="resetpassword"
                                name="resetpassword" type="submit" value="resetpassword">
                            change password
                    </div>
                </div>
            </form>

            <div class="text-center">

                <a href="/Index.php?cl=login&page=login&admin=true" class="list-group-item list-group-item-action">Return to login</a>

            </div>
        </div>
        </div>

        </div>
    </section>
    </body>
<?php
}
}
/* {/block "body"} */
}
