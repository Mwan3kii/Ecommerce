<x-pageheader></x-pageheader>
<section style="height: 90px;"></section>

<section>
    <div style="margin-left: 50px; overflow-y: auto;">
        <table class="table table-bordered admin-table">
            <thead class="table-dark">
                <tr>
                    <th>OrderId</th>
                    <th>ProductId</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody class="admin-row">
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$item->product_id}}</td>
                        <td>{{$item->product->name}}</td>
                        <td><img src="{{ asset('storage/' . $item->product->image) }}" alt="Product Image" style="width: 50px; height: 50px;"></td>
                        <td>{{$item['quantity']}}</td>
                        <td>{{$item['price']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>