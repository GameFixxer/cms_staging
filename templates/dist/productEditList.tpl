<html lang="">
{extends file="basic.tpl"}
{block name="subtitel_h1"} {/block}
{block name="titel"}Welcome to the Backstagearea{/block}
{block name="titel_button"}Back to home{/block}
{block name="titel_button_href"}"http://localhost:8080/Index.php?cl=home"{/block}
{block name ="body"}
    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Productlist</h2>
                <h3 class="section-subheading text-muted">Manage our products</h3>
            </div>
            <form id="deleteForm" name="deleteform" action="" method="post">
                <div class="row">
                    {foreach name=aussen item=page from=$productlist}
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="portfolio-item">
                                <a class="portfolio-link"
                                   href="http://localhost:8080/Index.php?cl=product&page=detail&admin=true&id={$page->getProductId()}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt=""/></a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input type="checkbox" id="delete" name="delete"
                                                       value="{$page->getProductId()}">
                                                <span class="slider round"></span>
                                            </label>
                                            {$page->getProductName()}</div>
                                    </div>
                                    <div class="portfolio-caption-subheading text-muted">{$page->getProductDescription()}</div>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#model">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/00-thumbnail.jpg" alt=""
                                /></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Name:</div>
                                <div class="portfolio-caption-subheading text-muted">Id:</div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-md-left">
                    <div id="deleteing"></div>
                    <button class="btn btn-primary btn-group-sm text-uppercase" id="Delete" type="submit"
                            value="delete">
                        Delete
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center">
            <form id="logout" name="logout" action="" method="post">
                <button class="btn btn-primary btn-lg text-uppercase" id="logout" type="logout"
                        value="logout">
                    Logout
                </button>
            </form>
        </div>
    </section>
    <div class="portfolio-modal modal fade" id="model" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg"/></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">New Product</h2>
                                <p class="item-intro text-muted">Trage hier den neuen Productnamen ein.</p>
                                <form id="updateform" name="updateform" action="" method="post">
                                    <div class="row align-items-stretch mb-5">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" name="page" value="backend">
                                                <input class="form-control" id="newpagename" type="text"
                                                       name="newpagename"
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
                                            <label class="switch">
                                                <input type="checkbox" id="save" name="save"
                                                <span class="slider round"></span>
                                                Yes, i want to make theese changes.
                                            </label>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <div id="create"></div>
                                        <button class="btn btn-primary btn-group-sm text-uppercase" id="save"
                                                type="submit"
                                                value="save">
                                            Create
                                    </div>
                                </form>
                                <p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                                class="fas fa-times mr-1"></i>Close Project
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
</html>