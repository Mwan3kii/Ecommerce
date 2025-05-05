<x-pageheader></x-pageheader>
    <section style="height: 90px;"></section>
    <section class="prod-section">
        
        <div class="main-prod">
            <div class="prod-container">
                <form action="/update-product/{{$product['id']}}" method="POST" class="prod-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="prod-div">
                        <label>Name:</label>
                        <input type="text" name="productname" placeholder="Product name" value="{{$product['name']}}" required>
                    </div>
                    <div class="prod-div">
                        <label>Description:</label>
                        <input type="text" name="description" placeholder="Description" value="{{$product['description']}}" required>
                    </div>
                    <div class="prod-div">
                        <label>Price</label>
                        <input type="number" name="price" placeholder="Price" value="{{$product['price']}}" required>
                    </div>
                    <div class="prod-div">
                        <label>Current Image:</label>
                        <img src="{{ asset('storage/' . $product['image']) }}">
                    </div>
                    <div class="prod-div">
                        <label>Update image</label>
                        <input type="file" name="image" accept="image/*;capture=camera" placeholder="Attach image" value="{{$product['image']}}" required>
                    </div>
                    <div style="text-align: center; margin-top: 1.5em;">
                        <button class="prod-button" type="submit">
                            Submit changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>