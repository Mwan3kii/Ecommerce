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
                                    <td><form action="/update-quantity/{{ $id}}" method="POST" class="cart-form" onchange="this.form.submit()">
                                        @csrf
                                        @method('PUT')
                                        <input class="cart-quantity" name="quantity" type="text" value="{{ $item['quantity'] }}"></td>
                                    </form>
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
            <div class="cart-total">Total: Ksh {{ session('total') }}</div>
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