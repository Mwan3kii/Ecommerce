<x-pageheader></x-pageheader>
<section style="height: 100px;"></section>
<section>
    @if(session('success'))
    <script>
        Swal.fire({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @endif
    <div style="margin-left: 50px; overflow-y: auto;">
        <table class="table table-bordered admin-table">
            <thead class="table-dark">
                <tr>
                    <th>OrderId</th>
                    <th>User id</th>
                    <th>Customer Name</th>
                    <th>Adress</th>
                    <th>Phone number</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="admin-row">
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order['id']}}</td>
                        <td>{{$order['user_id']}}</td>
                        <td>{{$order['customer_name']}}</td>
                        <td>{{$order['address']}}</td>
                        <td>{{$order['phone_number']}}</td>
                        <td>Ksh{{$order['total']}}</td>
                        <td>
                            <form action="/order/{{$order['id']}}/mark-paid" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="is_paid" onchange="this.form.submit()">
                                    <option value="0" {{ $order->is_paid == 0 ? 'selected' : '' }}>Unpaid</option>
                                    <option value="1" {{ $order->is_paid == 1 ? 'selected' : '' }}>Paid</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="/order/{{$order['id']}}/status" method="POST">
                                @csrf
                                @method('PUT') <!-- Because we are updating -->
                                <select name="status" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                            </form>
                        </td>
                        {{-- <td>{{$order['delivery_date']}}</td> --}}
                        <td>
                            <a href="/order/{{$order['id']}}" type="button" class="admin-button">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>