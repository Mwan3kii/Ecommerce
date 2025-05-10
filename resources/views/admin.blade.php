<x-pageheader></x-pageheader>
<section style="height: 100px;"></section>
<section>
    
    <div style="margin-left: 50px; overflow-y: auto;">
        <table class="table table-bordered admin-table">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="admin-row">
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product['id']}}</td>
                        <td><img src="{{ asset('storage/' . $product['image']) }}" class="admin-img"></td>
                        <td>{{$product['name']}}</td>
                        <td>Ksh{{$product['price']}}</td>
                        <td>
                            <form action="/update-quantity/{{ $product['id'] }}" method="POST" class="cart-form" onchange="this.form.submit()">
                                @csrf
                                @method('PUT')
                                <input class="cart-quantity" data-sbmincart-idx="0" name="quantity" type="text"pattern="[0-9]*" value="{{ $product['quantity'] }}" autocomplete="off"></td>
                            </form>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="/product-detail/{{$product['id']}}" type="button" class="admin-button">Edit</a>
                                
                                <form action="/delete-product/{{ $product['id'] }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="admin-button">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>