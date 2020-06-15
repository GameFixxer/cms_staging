<?php
/* Smarty version 3.1.36, created on 2020-06-12 13:06:10
  from '/home/rene/PhpstormProjects/MVC/templates/dist/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee361a2eabb84_08388167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29f3d157367aed7e6a7d2fee8ada3a595f85534f' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/login.tpl',
      1 => 1591959969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee361a2eabb84_08388167 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17372355105ee361a2e2d324_14027600', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15150481865ee361a2e31ac5_62672216', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "baselayout"} */
class Block_17372355105ee361a2e2d324_14027600 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_17372355105ee361a2e2d324_14027600',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_15150481865ee361a2e31ac5_62672216 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15150481865ee361a2e31ac5_62672216',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section" id="login">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Login Area</h2>
                <h3 class="section-subheading text-muted">I am not a robot. I am not a monkey. I will not dance, even if
                    the beat is funky.</h3>
            </div>
            <form novalidate="novalidate" method="post" id="contactForm" name="sentMessage">
                <?php if ((isset($_smarty_tpl->tpl_vars['loginMessage']->value))) {?>
                    <?php echo $_smarty_tpl->tpl_vars['loginMessage']->value;?>

                <?php }?>
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
                    <div id="login">
                        <button class="btn btn-primary btn-xl text-uppercase" id="login"
                                name="login" type="submit" value="login">
                            Login
                    </div>
                </div>
            </form>

            <div class="text-center">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#model">
                        <button class="btn btn-primary btn-xl text-uppercase" id="Submit" type="Submit"
                                value="Submit">
                            Create Account
                        </button>
                    </a>
                    <div class="portfolio-caption">
                    </div>
                </div>
            </div>

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
                                <!-- LoginForm-->
                                <h2 class="text-uppercase"></h2>
                                <form id="createuserform" name="createuserform" action="" method="post">
                                    <p class="item-intro text-muted">Create your very own account! </p>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <label> Your Username:</label>
                                            <input class="form-control" id="newUsername" type="text"
                                                   name="newUsername"
                                                   placeholder="Username"
                                                   data-validation-required-message="Please enter your username."/>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Your Password </label>
                                        <input class="form-control" id="newUserPassword" type="text"
                                               name="newUserPassword"
                                               placeholder="Password"
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="text-center">
                                            <button class="btn btn-primary btn-group-sm text-uppercase" id="createUser"
                                                    name="createUser" type="submit" value="createUser">
                                                Create

                                    </div>
                                </form>
                                <ul class="list-inline">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                            class="fas fa-times mr-1"></i>Discard

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
