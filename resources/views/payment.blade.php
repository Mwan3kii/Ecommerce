<x-pageheader></x-pageheader>
<section style="height: 90px;"></section>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Payment</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="payment-section">
        <div class="payment-div">
            <div style="margin-top: 30px; width: 800px;">
                {{-- <h3>Payment</h3> --}}
                <div style="display: flex; gap: 200px;">
                    <div>
                        <span class="payment">
                            <img src="images/pesapal.png" alt="pesapal logo">
                        </span>
                        <p class="payment-p">Checkout via pesapal</p>
                    </div>
                    <form class="payment-form">
                        <div>
                            <input type="text" name="fullname" placeholder="Card Number" required>
                        </div>
                        <div>
                            <input type="text" name="phone" placeholder="CVV" required>
                        </div>
                        <div>
                            <input type="text" name="town" placeholder="Card Holder Name" required>
                        </div>
                        <div>
                            <input type="text" name="town" placeholder="Valid Thru" required>
                        </div>
                        <button class="payment-button">
                            Make payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <x-pagefooter></x-pagefooter>
</body>
</html>