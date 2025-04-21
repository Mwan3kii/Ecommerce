<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $total = 0;

        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone,
            'total' => $total,
            'is_paid' => false,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Order created successfully.');
    }

    public function showOrders()
    {
        // Fetch all orders
        $orders = Order::all();
        return view('orders', compact('orders'));
    }

    public function show($id)
    {
        // Fetch a single order by ID
        $order = Order::findOrFail($id);
        return view('orders', compact('order'));
    }
    
    public function markPaid(Order $order)
    {
        $order->update(['is_paid' => true]);
        return back();
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return back();
    }
}
