<?php
/* Smarty version 3.1.36, created on 2020-08-11 10:36:54
  from '/home/rene/PhpstormProjects/MVC/templates/dist/order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f3258a698a9c5_92636581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71cf296ca0ec6b8e8fda3e10764af044b927c93c' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/order.tpl',
      1 => 1597135013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3258a698a9c5_92636581 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17901555285f3258a6977d59_94673706', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_441838405f3258a697ad08_89808635', "body");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "basic.tpl");
}
/* {block "baselayout"} */
class Block_17901555285f3258a6977d59_94673706 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_17901555285f3258a6977d59_94673706',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_441838405f3258a697ad08_89808635 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_441838405f3258a697ad08_89808635',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <section class="page-section" id="order">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Check Out</h2>
                <h3 class="section-subheading text-muted">I am not a robot. I am not a monkey. I will not dance, even if
                    the beat is funky.</h3>
            </div>
            <div class="col-75">
                <div class="text-left">
                    <div class="dropdown">
                        <button onclick="addressList()" class="dropbtn">Dropdown</button>
                        <div id="myDropdown" class="dropdown-content">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value, 'address', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['address']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->do_else = false;
?>
                                <a href="/Index.php?cl=order&page=payment&admin=true"><?php echo $_smarty_tpl->tpl_vars['address']->value->getStreet();?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value->getPostcode();?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value->getTown();?>
</a>
                                <br />
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </div>
                    </div>
                    <div id="checkout">
                        <button class="btn btn-primary btn-sm text-uppercase" onclick="myFunction()">New Address</button>
                    </div>
                </div>
                <br />
            <div class="row">

                    <form id="newAddress" action="" style = "display:none" method="post">
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <br />
                                <label for="lastname"><i class="fa fa-user"></i> lastname</label>
                                <input type="text" id="lastname" name="lastname" placeholder="John">
                                <br />
                                <label for="firstname"><i class="fa fa-user"></i> firstname</label>
                                <input type="text" id="firstname" name="firstname" placeholder="M. Doe">
                                <br />
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com">
                                <br />
                                <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="address" name="address" placeholder="542 W. 15th Street">
                                <br />
                                <label for="town"><i class="fa fa-institution"></i> town</label>
                                <input type="text" id="town" name="town" placeholder="New York">
                                <br />
                                <div class="row">
                                    <div class="col-50">
                                        <label for="country">country</label>
                                        <input type="text" id="country" name="country" placeholder="NY">
                                    </div>
                                    <div class="col-50">
                                        <label for="postcode">postcode</label>
                                        <input type="text" id="postcode" name="postcode" placeholder="10001">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as
                            billing
                        </label>
                        <input type="submit" value="Continue to checkout" class="btn">
                    </form>

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
