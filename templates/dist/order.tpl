{extends file="basic.tpl"}
{block name="baselayout"}{/block}
{block name ="body"}
    <body>
    <section class="page-section" id="order">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Check Out</h2>
                <h3 class="section-subheading text-muted">I am not a robot. I am not a monkey. I will not dance, even if
                    the beat is funky.</h3>
            </div>
            <div class="col-75">
                <div class="text-left">
                    <div class="dropdown">
                        <button onclick="addressList()" class="dropbtn">Dropdown</button>
                        <div id="myDropdown" class="dropdown-content">
                            {foreach name=aussen item=address from=$order}
                                <a href="/Index.php?cl=order&page=payment&admin=true">{$address->getStreet()} {$address->getPostcode()} {$address->getTown()}</a>
                                <br />
                            {/foreach}

                        </div>
                    </div>
                    <div id="checkout">
                        <button class="btn btn-primary btn-sm text-uppercase" onclick="myFunction()">New Address</button>
                    </div>
                </div>
                <br />
            <div class="row">

                    <form id="newAddress" action="" style = "display:none" method="post">
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <br />
                                <label for="lastname"><i class="fa fa-user"></i> lastname</label>
                                <input type="text" id="lastname" name="lastname" placeholder="John">
                                <br />
                                <label for="firstname"><i class="fa fa-user"></i> firstname</label>
                                <input type="text" id="firstname" name="firstname" placeholder="M. Doe">
                                <br />
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com">
                                <br />
                                <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="address" name="address" placeholder="542 W. 15th Street">
                                <br />
                                <label for="town"><i class="fa fa-institution"></i> town</label>
                                <input type="text" id="town" name="town" placeholder="New York">
                                <br />
                                <div class="row">
                                    <div class="col-50">
                                        <label for="country">country</label>
                                        <input type="text" id="country" name="country" placeholder="NY">
                                    </div>
                                    <div class="col-50">
                                        <label for="postcode">postcode</label>
                                        <input type="text" id="postcode" name="postcode" placeholder="10001">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as
                            billing
                        </label>
                        <input type="submit" value="Continue to checkout" class="btn">
                    </form>

            </div>

        </div>
        </div>

        </div>
    </section>
    </body>

{/block}
