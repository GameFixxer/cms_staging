<html lang="en">
{extends file="basic.tpl"}
{block name="title"}{/block}
{block name="subtitel_h1"}Error 404 Page not found{/block}
{block name="titel"}Detail:{$product->getProductName()}{/block}
{block name="titel_button"}Back to home{/block}
{block name="titel_button_href"}"http://localhost:8080/Index.php?cl=home"{/block}
{block name="baselayout"}{/block}
{block name ="body"}
<body>
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Detail page</h2>
            <h3 class="section-subheading text-muted"></h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#model"
                    >
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt=""
                        /></a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Name: {$product->getProductName()}</div>
                        <div class="portfolio-caption-subheading text-muted">Id:{$product->getProductId()}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="form-group">
                    <label class="switch">
                        <input type="checkbox" id="save" name="save" value="{$product->getProductId()}">
                        Update Product<span class="slider round"></span>
                    </label>
                </div>
                <form id="updateform" name="form" action="" method="post">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="hidden" name="page" value="backend">
                                <input class="form-control" id="newpagename" type="text" name="newpagename"
                                       placeholder="Productname"
                                       data-validation-required-message="Please enter your name."/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="newpagedescription" type="text"
                                       name="newpagedescription"
                                       placeholder="Description"
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-lg text-uppercase" id="Submit" type="submit"
                                value="commit">
                            Commit
                        </button>
                    </div>
                </form>
            </div>

        </div>


    </div>
    <div class="text-center">
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger"
           href="http://localhost:8080/Index.php?cl=product&page=list&admin=true">Return to productlist</a>
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
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">{$product->getProductName()}</h2>
                            <p class="item-intro text-muted">ID: {$product->getProductId()}</p>
                            <img class="img-fluid d-block mx-auto"
                                 src="assets/img/portfolio/01-full.jpg" alt=""/>
                            <p>Description: {$product->getProductDescription()}!</p>
                            <ul class="list-inline">
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                        class="fas fa-times mr-1"></i>Close Product

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
{/block}