<x-pageheader></x-pageheader>
    <section style="height: 90px;"></section>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Create a new product</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="prod-section">
        <div class="main-prod">
            <div class="prod-container">
                <form action="/create-product" method="POST" class="prod-form" enctype="multipart/form-data">
                    @csrf
                    <div class="prod-div">
                        <input type="text" name="productname" placeholder="Product name" required>
                    </div>
                    <div class="prod-div">
                        <input type="text" name="description" placeholder="Description" required>
                    </div>
                    <div class="prod-div">
                        <input type="number" name="price" placeholder="Price" required>
                    </div>
                    <div class="prod-div">
                        <input type="file" name="image" accept="image/*;capture=camera" placeholder="Attach image" required>
                    </div>
                    <div style="text-align: center; margin-top: 1.5em;">
                        <button class="prod-button" type="submit">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <x-pagefooter></x-pagefooter>
</body>

</html>