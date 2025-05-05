<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart($id, Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // dd($product);
        $product = Product::find($id);
        $cart = session()->get('cart', []);

        $quantity = $request->input('quantity', 1);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }
        // Calculate the total price
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        session()->put('total', $total);

        session()->put('cart', $cart);
        return back()->with('add_cart_success', 'Product added to cart!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        // Calculate the total price
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        session()->put('total', $total);

        return redirect()->back()->with('remove_cart_success', 'Product removed successfully!');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('clear_cart_success', 'Cart cleared successfully!');
    }
}
