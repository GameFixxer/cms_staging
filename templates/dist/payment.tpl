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

                </div>
                <br/>
                <h3>Payment</h3>
                <div class="row">

                    <br/>
                    <div class="col-50">

                        <br/>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa " style="font-size:36px ; color:navy;"></i>
                            <i class="fa fa-cc-amex" style="font-size:36px ; color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="font-size:36px ; color:red;"></i>
                            <i class="fa fa-cc-discover" style="font-size:36px ; color:orange;"></i>
                            <br/>
                        </div>
                    </div><br>
                    <div class="col-50 offset-1" >
                        <br/>
                        <label for="fname">Sonstige Methoden</label>
                        <div class="icon-container">
                            <i class="fab fa-paypal" style="font-size:36px ; color:blue;"></i>
                            <i class="fab fa-cc-amazon-pay"style="font-size:36px ; color:#454d55;"></i>
                            <i class="fab fa-cc-apple-pay" style="font-size:36px"></i>
                            <i class="fab fa-google-wallet" style="font-size:36px ; color: #0f6674"></i>"
                        </div>
                    </div>

                    <form id="payment" action="" style="display:none" method="post">
                        <div class="row">
                            <div class="col-50">
                                <br/>

                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                <label for="ccnum">Credit card number</label>
                                <input type="text" id="ccnum" name="cardnumber"
                                       placeholder="1111-2222-3333-4444">
                                <label for="expmonth">Exp Month</label>
                                <input type="text" id="expmonth" name="expmonth" placeholder="September">

                                <div class="row">
                                    <div class="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="expyear" name="expyear" placeholder="2018">
                                    </div>
                                    <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="352">
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
