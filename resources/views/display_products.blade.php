<x-pageheader></x-pageheader>
{{-- <x-cart></x-cart> --}}
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
        <div class="products-section">
            <div class="products-div">
                <div class="products-display">
                    @foreach ($products as $product)
                    <div>
                        <div class="product-image">
                            <a href='/single-product/{{$product['id']}}'>
                                <img src="{{ asset('storage/' . $product['image']) }}" alt="Product Image">
                            </a>
                            {{-- <form action="/add-to-cart/{{$product['id']}}" method="GET">
                                @csrf
                                <button class="cart-button"> Add to cart </button>
                            </form> --}}
                            <a href="/add-to-cart/{{$product['id']}}">
                                <button class="cart-button"> Add to cart </button>
                            </a>
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