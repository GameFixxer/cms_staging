<html lang="">
{extends file="basic.tpl"}
{block name="subtitel_h1"} {/block}
{block name="titel"}Your Shoppingcard{/block}
{block name="titel_button"}Back to home{/block}
{block name="titel_button_href"}"http://localhost:8080/Index.php?cl=home"{/block}
{block name ="body"}
    <body>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">ShoppingCard</h2>
                <h3 class="section-subheading text-muted">Manage our products</h3>
            </div>
            <form id="deleteUpdateForm" name="deleteUpdateform" action="" method="post">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Articlenumber</th>
                        <th scope="col">Productname</th>
                        <th scope="col">Price</th>
                        <th scope="col">Amount</th>
                        <th scope="col"></th>
                        <th scope="col">Total</th>
                    </tr>
                    {if !empty($productlist)}
                    {$total = 0}
                    {foreach name=aussen item=page from=$productlist}
                    {$total = $total + $page->getPrice()}
                    </thead>
                    <tbody id={$page->getArticleNumber()}>
                    <tr>
                        <th scope="row" id={$page->getArticleNumber()}>{$page->getArticleNumber()}</th>
                        <td>{$page->getName()}</td>
                        <td>{$page->getPrice()}</td>
                        <th scope="col"></th>
                        <th scope="col">
                            <button class="btn btn-primary btn-sm text-uppercase" id="add" data-title={$page->getArticleNumber()} name="add"
                                    type="submit" value={$page->getArticleNumber()}>Add
                            </button>
                            <button class="btn btn-primary btn-sm text-uppercase" id="remove" data-title={$page->getArticleNumber()} name="remove"
                                    type="submit" value={$page->getArticleNumber()}>remove
                            </button>

                        </th>
                    </tr
                    {/foreach}
                    <tr>
                        <th scope="row" id="sum">Total:</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> Total: {$total}</td>
                    </tr
                    {/if}
                    </tbody>
                </table>
            </form>
        </div>
    </section>
    <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-center">
                    <h2 class="text-uppercase">New Product</h2>
                    <p class="item-intro text-muted"></p>
                    <form id="create" name="createform" action="" method="post">
                        <div class="row align-items-stretch mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="text-center">
                                        <input type="hidden" name="save" value="save">
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
                                    <div id="create">
                                        <button class="btn btn-primary btn-group-sm text-uppercase" id="save"
                                                name="save" type="submit">
                                            Create
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p>
                        <button class="btn btn-primary btn-sm" data-dismiss="modal" type="button"><i
                                    class="fas fa-times mr-1"></i>Discard
                        </button>
                </div>
            </div>
        </div>
    </div>


    </body>
{/block}
</html>