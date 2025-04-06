<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function createProduct (Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'productname.required' => 'Title is required',
            'description.required' => 'Content is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be a valid image file',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image size must not exceed 2MB',
        ]);

        // Handle the image upload and post creation logic here

        Product::create([
            'name' => $request->productname,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->file('image')->store('images', 'public'),
        ]);

        return redirect('/products')->with('success', 'Product created successfully!');
    }

    public function showProducts()
    {
        $products = Product::all();
        // return view('display_products', compact('products'));
        return view('display_products', ['products' => $products]);
    }

    public function showSingleProduct($id)
    {
        // $product = Product::findOrFail($id);
        // $product = Product::where('id', $id)->firstOrFail();
        $product = Product::where('id', $id)->get();
        return view('single_product', ['product' => $product]);
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);
        // return view('cart', ['cart' => $cart]);
        return view('components.cart');
    }

    public function addToCart($id)
    {
        // $product = Product::findOrFail($id);
        $product = Product::where('id', $id)->get();
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);
        return view('components.cart', ['cart' => $cart]);
        // return redirect('/products')->with('success', 'Product added to cart!');
    }
}
