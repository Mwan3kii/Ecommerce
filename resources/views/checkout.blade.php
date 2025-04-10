<x-pageheader></x-pageheader>
<section style="height: 90px;"></section>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Checkout</h5>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="checkout-section">
            <h3>Checkout</h3>
            <div style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered checkout-table">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="checkout-row">
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $item)
                                <tr> 
                                    <td><img src="{{ asset('storage/' . $item['image']) }}" class="checkout-img"></td>
                                    <td>{{$item['name']}}</td>
                                    <td><input class="cart-quantity" data-sbmincart-idx="0" name="quantity_1" type="text"
                                            pattern="[0-9]*" value="1" autocomplete="off"></td>
                                    <td>Ksh{{$item['price']}}</td>
                                    <td><a href="/remove-cart/{{$id}}"><button type="button" class="remove-cart">×</button></a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No products added to cart</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="cart-total">Total: Ksh</div>
            <div style="display: flex;">
                <div style="margin-top: 50px; width: 600px;">
                    <h3>Delivery details</h3>
                    <form class="checkout-form">
                        <div class="checkout-input">
                            <input type="text" name="fullname" placeholder="Full Name" required>
                        </div>
                        <div class="checkout-input">
                            <input type="text" name="phone" placeholder="Mobile Number" required>
                        </div>
                        <div class="checkout-input">
                            <input type="text" name="town" placeholder="Town/City" required>
                        </div>
                        <button class="deliver-button">
                            Deliver To This Address
                        </button>
                    </form>
                </div>
                <div style="margin-top: 50px; width: 650px;">
                    <h3>Payment</h3>
                    <span class="payment">
                        <img src="images/pesapal.png" alt="pesapal logo">
                    </span>
                    <form class="checkout-form">
                        <div class="checkout-input">
                            <input type="text" name="fullname" placeholder="Card Number" required>
                        </div>
                        <div class="checkout-input">
                            <input type="text" name="phone" placeholder="CVV" required>
                        </div>
                        <div class="checkout-input">
                            <input type="text" name="town" placeholder="Card Holder Name" required>
                        </div>
                        <div class="checkout-input">
                            <input type="text" name="town" placeholder="Valid Thru" required>
                        </div>
                        <button class="payment-button">
                            Make payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
<x-pagefooter></x-pagefooter>
</body>
</html>