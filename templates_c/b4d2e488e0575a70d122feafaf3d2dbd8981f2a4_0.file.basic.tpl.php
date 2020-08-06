<?php
/* Smarty version 3.1.36, created on 2020-08-03 09:57:48
  from '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f27c37cd14d09_93522586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4d2e488e0575a70d122feafaf3d2dbd8981f2a4' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl',
      1 => 1596441467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f27c37cd14d09_93522586 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1047962495f27c37ccf8cf6_34131518', "title");
?>
</title>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20179839495f27c37ccfde09_93296726', "title");
?>
</title>     <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href=<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9509104995f27c37cd01573_95313679', "customize_css");
?>
 rel="stylesheet" />
</head>
<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/navbar-logo.svg" /></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="http://localhost:8080/Index.php?cl=login&page=login&admin=true">Login</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" id="productlist" name="productlist" href="/Index.php?cl=list">Productlist</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" id="shoppingcard" name="productlist" href="/Index.php?cl=card&page=list&admin=true">ShoppingCard</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="http://localhost:8080/Index.php?cl=dashboard&page=list&admin=true">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12776116275f27c37cd03fe3_20770103', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15812513835f27c37cd129b6_25042524', "body");
?>

<!-- Clients-->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/envato.jpg" alt="" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/designmodo.jpg" alt="" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/themeforest.jpg" alt="" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/creative-market.jpg" alt="" /></a>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Privacy Policy</a><a href="#!">Terms of Use</a></div>
        </div>
    </div>
</footer>




<!-- Bootstrap core JS-->
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<!-- Third party plugin JS-->
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"><?php echo '</script'; ?>
>
<!-- Contact form JS-->
<!-- Core theme JS-->
<?php echo '<script'; ?>
 src="js/scripts.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block "title"} */
class Block_1047962495f27c37ccf8cf6_34131518 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1047962495f27c37ccf8cf6_34131518',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "title"} */
class Block_20179839495f27c37ccfde09_93296726 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_20179839495f27c37ccfde09_93296726',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "customize_css"} */
class Block_9509104995f27c37cd01573_95313679 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'customize_css' => 
  array (
    0 => 'Block_9509104995f27c37cd01573_95313679',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"css/styles.css"<?php
}
}
/* {/block "customize_css"} */
/* {block "subtitel_h1"} */
class Block_13926020175f27c37cd05c44_43875312 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_6061689405f27c37cd08535_48169720 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "titel"} */
/* {block "titel_button_href"} */
class Block_16722577085f27c37cd0baa7_13371363 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"message message message"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "titel_button"} */
class Block_12344977015f27c37cd0ecc2_38331499 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "titel_button"} */
/* {block "baselayout"} */
class Block_12776116275f27c37cd03fe3_20770103 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_12776116275f27c37cd03fe3_20770103',
  ),
  'subtitel_h1' => 
  array (
    0 => 'Block_13926020175f27c37cd05c44_43875312',
  ),
  'titel' => 
  array (
    0 => 'Block_6061689405f27c37cd08535_48169720',
  ),
  'titel_button_href' => 
  array (
    0 => 'Block_16722577085f27c37cd0baa7_13371363',
  ),
  'titel_button' => 
  array (
    0 => 'Block_12344977015f27c37cd0ecc2_38331499',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<header class="masthead">
    <div class="container">
        <div class="masthead-subheading"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13926020175f27c37cd05c44_43875312', "subtitel_h1", $this->tplIndex);
?>
</div>
        <div class="masthead-heading text-uppercase"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6061689405f27c37cd08535_48169720', "titel", $this->tplIndex);
?>
</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href=<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16722577085f27c37cd0baa7_13371363', "titel_button_href", $this->tplIndex);
?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12344977015f27c37cd0ecc2_38331499', "titel_button", $this->tplIndex);
?>
</a>
    </div>
</header>
<?php
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_15812513835f27c37cd129b6_25042524 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15812513835f27c37cd129b6_25042524',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block "body"} */
}
