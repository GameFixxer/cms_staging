<html lang="en">
{extends file="basic.tpl"}
{block name="title"}
    Detail:{$id->getProductName()}
{/block}
{block name="subtitel_h1"}Error 404 Page not found{/block}
{block name="titel"}The page you're looking for doesn't exist{/block}
{block name="titel_button"}Back to home{/block}
{block name="titel_button_href"}"http://localhost:8080/Index.php?cl=home"{/block}
{block name ="body"}
ID: {$id->getProductId()}
<br>
Productname: {$id->getProductName()}
<br>
Description: {$id->getProductDescription()}
<br>
<div class="portfolio-modal modal fade" id={$id->getProductId()} tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg"/></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/01-full.jpg" alt=""/>
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Date: January 2020</li>
                                <li>Client: Threads</li>
                                <li>Category: Illustration</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                        class="fas fa-times mr-1"></i>Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {/block}
</html>