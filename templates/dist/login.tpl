{extends file="basic.tpl"}
{block name="baselayout"}{/block}
{block name ="body"}
    <body>
    <section class="page-section" id="login">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Login Area</h2>
                <h3 class="section-subheading text-muted">I am not a robot. I am not a monkey. I will not dance, even if
                    the beat is funky.</h3>
            </div>
            <form novalidate="novalidate" method="post" id="contactForm" name="sentMessage">
                {if isset($loginMessage)}
                    {$loginMessage}
                {/if}
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="page" value="backend">
                            <input class="form-control" id="username" type="text" name="username"
                                   placeholder="Your Username *" required="required"
                                   data-validation-required-message="Please enter your name."/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" type="password" name="password"
                                   placeholder="Your Passwort *" required="required"
                                   data-validation-required-message="Please enter your email address."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div id="login">
                        <button class="btn btn-primary btn-xl text-uppercase" id="login"
                                name="login" type="submit" value="login">
                            Login
                    </div>
                </div>
            </form>

            <div class="text-center">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#model">
                        <button class="btn btn-primary btn-xl text-uppercase" id="Submit" type="Submit"
                                value="Submit">
                            Create Account
                        </button>
                    </a>
                    <div class="portfolio-caption">
                    </div>
                </div>
            </div>

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
                                <!-- LoginForm-->
                                <h2 class="text-uppercase"></h2>
                                <form id="createuserform" name="createuserform" action="" method="post">
                                    <p class="item-intro text-muted">Create your very own account! </p>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <label> Your Username:</label>
                                            <input class="form-control" id="newUsername" type="text"
                                                   name="newUsername"
                                                   placeholder="Username"
                                                   data-validation-required-message="Please enter your username."/>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Your Password </label>
                                        <input class="form-control" id="newUserPassword" type="text"
                                               name="newUserPassword"
                                               placeholder="Password"
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="text-center">
                                            <button class="btn btn-primary btn-group-sm text-uppercase" id="createUser"
                                                    name="createUser" type="submit" value="createUser">
                                                Create

                                    </div>
                                </form>
                                <ul class="list-inline">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                            class="fas fa-times mr-1"></i>Discard

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