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
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, webp',
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

    public function adminProducts()
    {
        $products = Product::all();
        // return view('display_products', compact('products'));
        return view('admin', ['products' => $products]);
    }

    public function showProductDetails($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product_details', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'productname' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload and post creation logic here

        Product::where('id', $id)->update([
            'name' => $request->productname,
            'description' => $request->description,
            'price' => $request->price,
            // Handle image update logic here
            'image' => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null,
        ]);

        return redirect('/single-product/' . $id)->with('update_success', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect()->back()->with('delete_success', 'Product deleted successfully!');
    }

    public function searchProducts(Request $request)
    {
        $search = $request->input('search');
        // $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        $products = Product::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);
        return view('display_products', ['products' => $products]);
    }
}
