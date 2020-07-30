<?php
/* Smarty version 3.1.36, created on 2020-07-24 16:27:39
  from '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f1aefdb9bb327_54845867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4d2e488e0575a70d122feafaf3d2dbd8981f2a4' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl',
      1 => 1595576135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1aefdb9bb327_54845867 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18421166095f1aefdb9a4630_58442577', "title");
?>
</title>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9429022005f1aefdb9a7218_90374186', "title");
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17740774525f1aefdb9a9f04_23073389', "customize_css");
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
                <li class="nav-item"><a class="nav-link js-scroll-trigger" id="productlist" name="productlist" href="http://localhost:8080/Index.php?cl=list#portfolio">Productlist</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" id="shoppingcard" name="productlist" href="http://localhost:8080/Index.php?cl=list#portfolio">ShoppingCard</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="http://localhost:8080/Index.php?cl=dashboard&page=list&admin=true">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11734918865f1aefdb9acf98_50780038', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_934668785f1aefdb9b9348_77301803', "body");
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
class Block_18421166095f1aefdb9a4630_58442577 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_18421166095f1aefdb9a4630_58442577',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "title"} */
class Block_9429022005f1aefdb9a7218_90374186 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9429022005f1aefdb9a7218_90374186',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "customize_css"} */
class Block_17740774525f1aefdb9a9f04_23073389 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'customize_css' => 
  array (
    0 => 'Block_17740774525f1aefdb9a9f04_23073389',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"css/styles.css"<?php
}
}
/* {/block "customize_css"} */
/* {block "subtitel_h1"} */
class Block_19239002795f1aefdb9aed44_35139572 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_18956821465f1aefdb9b1344_78659276 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "titel"} */
/* {block "titel_button_href"} */
class Block_11019813165f1aefdb9b38f1_97933375 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"message message message"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "titel_button"} */
class Block_2394520615f1aefdb9b5e70_98322926 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "titel_button"} */
/* {block "baselayout"} */
class Block_11734918865f1aefdb9acf98_50780038 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_11734918865f1aefdb9acf98_50780038',
  ),
  'subtitel_h1' => 
  array (
    0 => 'Block_19239002795f1aefdb9aed44_35139572',
  ),
  'titel' => 
  array (
    0 => 'Block_18956821465f1aefdb9b1344_78659276',
  ),
  'titel_button_href' => 
  array (
    0 => 'Block_11019813165f1aefdb9b38f1_97933375',
  ),
  'titel_button' => 
  array (
    0 => 'Block_2394520615f1aefdb9b5e70_98322926',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<header class="masthead">
    <div class="container">
        <div class="masthead-subheading"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19239002795f1aefdb9aed44_35139572', "subtitel_h1", $this->tplIndex);
?>
</div>
        <div class="masthead-heading text-uppercase"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18956821465f1aefdb9b1344_78659276', "titel", $this->tplIndex);
?>
</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href=<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11019813165f1aefdb9b38f1_97933375', "titel_button_href", $this->tplIndex);
?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2394520615f1aefdb9b5e70_98322926', "titel_button", $this->tplIndex);
?>
</a>
    </div>
</header>
<?php
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_934668785f1aefdb9b9348_77301803 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_934668785f1aefdb9b9348_77301803',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block "body"} */
}
