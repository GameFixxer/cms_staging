<?php
/* Smarty version 3.1.36, created on 2020-06-16 13:20:48
  from '/home/rene/PhpstormProjects/MVC/templates/dist/mailCode.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee8ab1087f691_77799099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e98a325f9ca4b30286f29e3ef660580437dc368' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/mailCode.tpl',
      1 => 1592304387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee8ab1087f691_77799099 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17693171705ee8ab1086d2a6_29259868', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17545395995ee8ab10870c95_74585565', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "baselayout"} */
class Block_17693171705ee8ab1086d2a6_29259868 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_17693171705ee8ab1086d2a6_29259868',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_17545395995ee8ab10870c95_74585565 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17545395995ee8ab10870c95_74585565',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section" id="mailCode">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">A Mail has been send.</h2>
                <h3 class="section-subheading text-muted">Mind checking the spam folder if you can find the mail.</h3>
            </div>
            <form novalidate="novalidate" method="post" id="contactForm" name="sentMessage">
                <?php if ((isset($_smarty_tpl->tpl_vars['loginMessage']->value))) {?>
                    <?php echo $_smarty_tpl->tpl_vars['loginMessage']->value;?>

                <?php }?>
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="page" value="backend">
                            <input class="form-control" id="email" type="email" name="email"
                                   placeholder="Your E-Mail *" required="required"
                                   data-validation-required-message="Please enter your email address."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div id="resetpassword">
                        <button class="btn btn-primary btn-xl text-uppercase" id="resetpassword"
                                name="resetpassword" type="submit" value="resetpassword">
                            Commit
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
