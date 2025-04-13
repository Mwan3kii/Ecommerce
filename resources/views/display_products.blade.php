<x-pageheader></x-pageheader>
    <section style="height: 90px;"></section>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Products</h5>
                </div>
            </div>
        </div>
    </section>
    <section>
        @include('cart')
        @if(session('success'))
            <div class="message-popup">
                <div class="icon">&#10003;</div>
                <span class="message">Success!</span>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        @endif
        <div class="products-section">
            <div class="products-div">
                <div class="products-display">
                    @foreach ($products as $product)
                    <div>
                        <div class="product-image">
                            <a href='/single-product/{{$product['id']}}'>
                                <img src="{{ asset('storage/' . $product['image']) }}" alt="Product Image">
                            </a>
                            {{-- <form action="/add-to-cart/{{$product['id']}}" method="POST">
                                @csrf
                                <button class="cart-button"> Add to cart </button>
                            </form> --}}
                            @auth
                            <a href="/add-to-cart/{{$product['id']}}">
                                <button class="cart-button"> Add to cart </button>
                            </a>
                            @else
                            <a href="/login">
                                <button class="cart-button"> Add to cart </button>
                            </a>
                            @endauth
                            {{-- <a href="/add-to-cart/{{$product['id']}}">
                                <button class="cart-button"> Add to cart </button>
                            {{-- <button class="cart-button"> Add to cart </button> --}}
                        </div>
                        <h4>{{$product['name']}}</h4>
                        <span class="price">
                            <del>Ksh{{$product['price']}}</del>
                            Ksh{{$product['price']}}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </section>   
<x-pagefooter></x-pagefooter>
</body>

</html>