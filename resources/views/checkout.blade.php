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
        @if(session('success'))
            <div class="message-popup">
                <div class="icon">&#10003;</div>
                <span class="message">Success!</span>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        @endif
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
            <div style="display: flex; gap: 200px;">
                <div style="margin-top: 50px; width: 600px;">
                    <h3>Place an Order: Cash on delivery</h3>
                    <form action="/order" method="POST" class="checkout-form" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="text" name="name" placeholder="Full Name" required>
                        </div>
                        <div>
                            <input type="text" name="address" placeholder="Address" required>
                        </div>
                        <div>
                            <input type="text" name="phone" placeholder="Mobile Number" required>
                        </div>
                        <div>
                        <button class="deliver-button" type="submit">
                            Order
                        </button>
                    </form>
                </div>
                {{-- <a href="/payment"> 
                    <button class="deliver-button " style="margin-top: 150px; width: 200px; gap: 10px;">
                        <span>Make payment</span>
                        <div class="fas fa-arrow-right"></div>
                    </button>
                </a> --}}
            </div>
        </div>
        </div>
    </section>
<x-pagefooter></x-pagefooter>
</body>
</html>