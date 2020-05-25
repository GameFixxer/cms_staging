<html lang="">
{extends file="basic.tpl"}
{block name="subtitel_h1"} {/block}
{block name="titel"}Here you will find everything you need{/block}
{block name="titel_button"}Back to home{/block}
{block name="titel_button_href"}"http://localhost:8080/Index.php?cl=home"{/block}
{block name ="body"}
    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Productlist</h2>
                <h3 class="section-subheading text-muted">All available products are here.</h3>
            </div>
            <div class="row">
                {foreach name=aussen item=page from=$productList}
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link"
                           href=/Index.php?cl=detail&id={$page->getProductId()}">
                            <div class="portfolio-hover" data-title={$page->getProductName()} id={$page->getProductId()}>
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt=""/></a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{$page->getProductName()}</div>
                            <div class="portfolio-caption-subheading text-muted">{$page->getProductDescription()}</div>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
        </div>
    </section>
    </body>
{/block}
</html>
