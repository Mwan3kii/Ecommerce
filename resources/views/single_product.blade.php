<x-pageheader></x-pageheader>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Single Product</h5>
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
        @foreach ($product as $prod)
        <div class="single-container">
            <div class="single-image">
                <img src="{{ asset('storage/' . $prod['image']) }}" alt="single product">
                @auth
                <a href="/add-to-cart/{{$prod['id']}}">
                    <button class="single-btn">
                        Add to cart
                    </button>
                </a>
                @else
                <a href="/login">
                    <button class="single-btn">
                        Add to cart
                    </button>
                </a>
                @endauth
            </div>
            <div class="product-description">
                <h2>{{$prod['name']}}</h2>
                <div style="display: flex; gap: 20px;">
                    <del>Ksh{{$prod['price']}}</del>
                    <h3>Ksh{{$prod['price']}}</h3>
                </div>
                <div style="margin-top: 15px;">
                    <span>Special Price</span>
                    Get extra 5% off (price inclusive of discount)
                </div>
                <div>
                    <h5>Description:</h5>
                    <p>{{$prod['description']}}</p>
                </div>
                <h4>Check delivery, payment options and charges at your location</h4>
            </div>
        </div>
        @endforeach
    </section>
    <x-pagefooter></x-pagefooter>
</body>

</html>