<?php
/* Smarty version 3.1.36, created on 2020-04-28 14:12:14
  from '/home/rene/PhpstormProjects/MVC/templates/backend_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea81d9e487e47_51432933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71c3e0a1e16194002b2450cc3126f39245b4e242' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/backend_.tpl',
      1 => 1588075739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea81d9e487e47_51432933 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="">
<head>
    <title>Backend</title>
</head>
<body>
Welcome to the backend area <br><br>
Here you can see a list with all existing pages: <br><br>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id']->value, 'page', false, NULL, 'aussen', array (
));
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
<hr/>
<a href="http://localhost:8080/Index.php?page=detail&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
</a>
<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductName();?>

<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductDescription();?>

<br><br>
<form id="form" name="form" action="" method="post">
    <label>
        Delete <input type="checkbox" name="delete" value=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
>

    </label>
    <label>
        <br>
        Update description <input type="checkbox" name="update" value=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
>

    </label>


    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <br><br>
    <br><br>On Update:<br>
    <label for="updatedescription">New Description</label><br>
    <input type="text" id="updatedescription" name="updatedescription">
    <br><br><br><br>
    Create new product <input type="checkbox" name="new" value=<?php echo $_smarty_tpl->tpl_vars['page']->value->getProductId();?>
>
    <br>Productname
    <br><input type="text" name="newpname" size=40 maxlength=40>
    <br>Productdescription
    <br><input type="text" name="newpdescription" size=40 maxlength=40>
    <br><br>
    <input type="submit" value="Commit">
</form>
</body>
</html>
<?php }
}
