<?php
/* Smarty version 3.1.36, created on 2020-06-17 10:40:21
  from '/home/rene/PhpstormProjects/MVC/templates/dist/mailCode.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee9d6f52956d9_90793591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e98a325f9ca4b30286f29e3ef660580437dc368' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/mailCode.tpl',
      1 => 1592383217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9d6f52956d9_90793591 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2970107985ee9d6f52871d7_26178895', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21341512605ee9d6f528ac11_30878740', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "baselayout"} */
class Block_2970107985ee9d6f52871d7_26178895 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_2970107985ee9d6f52871d7_26178895',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_21341512605ee9d6f528ac11_30878740 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_21341512605ee9d6f528ac11_30878740',
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
                            <input class="form-control" id="resetcode" type="text" name="resetcode"
                                   placeholder="Enter your code *" required="required"
                                   data-validation-required-message="Please enter your reset code."/>
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
