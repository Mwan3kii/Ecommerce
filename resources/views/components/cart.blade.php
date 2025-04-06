<div id="popupCart" >
    <div class="cart-section">
        <div class="cart-container">
            <div style="display: flex; justify-content: space-between;">
                <h2>CART</h2>
                <button type="button" class="cart-close">×</button>
            </div>
            <div class="cart-list">
            {{-- @foreach ($cart as $cartItem) --}}
                <ul>
                    <li>
                        {{-- <h4>{{$cartItem['name']}}</h4> --}}
                        <div>
                            <input class="cart-quantity" data-sbmincart-idx="0" name="quantity_1" type="text"
                                pattern="[0-9]*" value="1" autocomplete="off">
                            <button type="button" class="remove-cart">×</button>
                        </div>
                        <span class="cart-price">$299.99</span>
                    </li>
                </ul>
            {{-- @endforeach --}}
            </div>
                <div style="display: flex; justify-content: space-between;">
                    <div class="cart-total">Subtotal: $999.98 USD</div>
                    <a href="checkout.html">
                        <button class="cart-checkout" type="submit">Check Out</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>
