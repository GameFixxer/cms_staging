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
            <h2 class="section-heading text-uppercase">ID: {$product->getProductId()}-{$product->getProductName()}</h2>
            <h3 class="section-subheading text-muted"></h3>
                <div class="text-center">
                    <h2 class="text-uppercase"></h2>
                    <p class="item-intro text-muted"></p>
                    <form id="updateform" name="updateform" action="" method="post">
                        <div class="row align-items-stretch mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="text-center">
                                        <label> Productname:</label>
                                        <input class="form-control" id="newpagename" type="text"
                                               name="newpagename"
                                               placeholder="Productname"
                                               data-validation-required-message="Please enter your name."/>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> Description:</label>
                                    <input class="form-control" id="newpagedescription" type="text"
                                           name="newpagedescription"
                                           placeholder="Description"
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="text-center">
                                    <div id="submit">
                                        <button class="btn btn-primary btn-group-sm text-uppercase" id="save"
                                                name="save" type="submit" value={$product->getProductId()}>
                                            Update
                                    </div>
                                </div>
                            </div>
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
</body>
{/block}