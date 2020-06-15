<?php
/* Smarty version 3.1.36, created on 2020-06-15 14:39:55
  from '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee76c1bec8092_65618097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4d2e488e0575a70d122feafaf3d2dbd8981f2a4' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/dist/basic.tpl',
      1 => 1592224794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee76c1bec8092_65618097 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6817241895ee76c1bea89a8_37359042', "title");
?>
</title>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_520666795ee76c1beae088_39871355', "title");
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11476389265ee76c1beb2af4_44411801', "customize_css");
?>
 rel="stylesheet" />
</head>
<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/navbar-logo.svg" /></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="http://localhost:8080/Index.php?cl=login&admin=true">Login</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" id="productlist" name="productlist" href="http://localhost:8080/Index.php?cl=list#portfolio">Productlist</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="http://localhost:8080/Index.php?cl=dashboard&page=list&admin=true">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10405016025ee76c1beb6016_80811556', "baselayout");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3001989025ee76c1bec5956_87757110', "body");
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
class Block_6817241895ee76c1bea89a8_37359042 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6817241895ee76c1bea89a8_37359042',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "title"} */
class Block_520666795ee76c1beae088_39871355 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_520666795ee76c1beae088_39871355',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block "title"} */
/* {block "customize_css"} */
class Block_11476389265ee76c1beb2af4_44411801 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'customize_css' => 
  array (
    0 => 'Block_11476389265ee76c1beb2af4_44411801',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"css/styles.css"<?php
}
}
/* {/block "customize_css"} */
/* {block "subtitel_h1"} */
class Block_9429152715ee76c1beb8108_45515320 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "subtitel_h1"} */
/* {block "titel"} */
class Block_15786090405ee76c1bebaef3_56226512 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "titel"} */
/* {block "titel_button_href"} */
class Block_20207052375ee76c1bebdc60_46015351 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
"message message message"<?php
}
}
/* {/block "titel_button_href"} */
/* {block "titel_button"} */
class Block_9592246945ee76c1bec0b47_03646448 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
message message message<?php
}
}
/* {/block "titel_button"} */
/* {block "baselayout"} */
class Block_10405016025ee76c1beb6016_80811556 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'baselayout' => 
  array (
    0 => 'Block_10405016025ee76c1beb6016_80811556',
  ),
  'subtitel_h1' => 
  array (
    0 => 'Block_9429152715ee76c1beb8108_45515320',
  ),
  'titel' => 
  array (
    0 => 'Block_15786090405ee76c1bebaef3_56226512',
  ),
  'titel_button_href' => 
  array (
    0 => 'Block_20207052375ee76c1bebdc60_46015351',
  ),
  'titel_button' => 
  array (
    0 => 'Block_9592246945ee76c1bec0b47_03646448',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<header class="masthead">
    <div class="container">
        <div class="masthead-subheading"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9429152715ee76c1beb8108_45515320', "subtitel_h1", $this->tplIndex);
?>
</div>
        <div class="masthead-heading text-uppercase"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15786090405ee76c1bebaef3_56226512', "titel", $this->tplIndex);
?>
</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href=<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20207052375ee76c1bebdc60_46015351', "titel_button_href", $this->tplIndex);
?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9592246945ee76c1bec0b47_03646448', "titel_button", $this->tplIndex);
?>
</a>
    </div>
</header>
<?php
}
}
/* {/block "baselayout"} */
/* {block "body"} */
class Block_3001989025ee76c1bec5956_87757110 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_3001989025ee76c1bec5956_87757110',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block "body"} */
}
