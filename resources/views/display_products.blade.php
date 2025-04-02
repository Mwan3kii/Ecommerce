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
        <div class="products-section">
            <div class="products-div">
                <div class="products-display">
                    @foreach ($products as $product)
                    <div>
                        <div class="product-image">
                            {{-- <a href='/single-productid={{$product['id']}}'> --}}
                            <img src="{{ asset('storage/' . $product['image']) }}" alt="Product Image">
                            <button class="cart-button"> Add to cart </button>
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