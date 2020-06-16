{extends file="basic.tpl"}
{block name="baselayout"}{/block}
{block name ="body"}
    <body>
    <section class="page-section" id="mailCode">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">A Mail has been send.</h2>
                <h3 class="section-subheading text-muted">Mind checking the spam folder if you can find the mail.</h3>
            </div>
            <form novalidate="novalidate" method="post" id="contactForm" name="sentMessage">
                {if isset($loginMessage)}
                    {$loginMessage}
                {/if}
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="page" value="backend">
                            <input class="form-control" id="email" type="email" name="email"
                                   placeholder="Your E-Mail *" required="required"
                                   data-validation-required-message="Please enter your email address."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div id="resetpassword">
                        <button class="btn btn-primary btn-xl text-uppercase" id="resetpassword"
                                name="resetpassword" type="submit" value="resetpassword">
                            Commit
                    </div>
                </div>
            </form>

            <div class="text-center">

                <a href="/Index.php?cl=login&page=login&admin=true" class="list-group-item list-group-item-action">Return to login</a>

            </div>
        </div>
        </div>

        </div>
    </section>
    </body>
{/block}