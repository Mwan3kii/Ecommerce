{{-- <x-pageheader></x-pageheader> --}}
<div id="popupCart" style="display: none;">
    <div class="cart-section">
        <div class="cart-container">
            <div style="display: flex; justify-content: space-between;">
                <h2>CART</h2>
                <a href="/clear-cart">
                    <button class="clear-cart" type="submit">Clear</button>
                </a>
                <button type="button" class="cart-close">×</button>
            </div>
            @if (session('cart'))
                <div class="cart-list">
                    <ul>
                        @foreach (session('cart') as $id => $item)
                            <li>
                                <h4>{{$item['name']}}</h4>
                                <div>
                                    <input class="cart-quantity" data-sbmincart-idx="0" name="quantity_1" type="text"
                                        pattern="[0-9]*" value="1" autocomplete="off">
                                    <a href="/remove-cart/{{$id}}">
                                        <button type="submit" class="remove-cart">×</button>
                                    </a>
                                </div>
                                <span class="cart-price">Ksh{{$item['price']}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <div class="cart-total">Subtotal: {{$item['price'] * $item['quantity']}}</div>
                    <a href="/checkout">
                        <button class="cart-checkout" type="submit">Check Out</button>
                    </a>
                </div>
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
    </div>
</div>
{{-- <x-pagefooter></x-pagefooter>
</body>

</html> --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const cartButton = document.querySelector('.cart-button');
        const cartCloseButton = document.querySelector('.cart-close');
        const popupCart = document.getElementById('popupCart');

        cartButton.addEventListener('click', function () {
            popupCart.style.display = 'block';
        });
        cartCloseButton.addEventListener('click', function () {
            popupCart.style.display = 'none';
        });
    });
</script> --}}
