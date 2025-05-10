<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $total = 0;
        // Validate the request

        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone,
            'total' => $total,
            'is_paid' => false,
            'status' => 'pending',
        ]);

        foreach (session('cart') as $id => $item)
        {
            $order_item = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            $total += $item['price'] * $item['quantity'];
        }
        $order->total = $total;
        $order->save();
        return redirect()->back()->with('order_success', 'Order created successfully.');
    }

    public function showOrders()
    {
        // Fetch all orders
        $orders = Order::all();
        return view('orders', compact('orders'));
    }

    public function orderDetails($id)
    {
        // Fetch a single order by ID
        $order = Order::with('items.product')->findOrFail($id);
        return view('order_details', compact('order'));
    }
    
    public function markPaid(Request $request, Order $order)
    {
        $order->update(['is_paid' => $request->is_paid]);
        return back()->with('success', 'Order marked successfully.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Order status updated successfully.');
    }
}
