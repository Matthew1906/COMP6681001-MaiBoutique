<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Home -> Get All Products
    public function index()
    {
        $products = Product::paginate(8);
        return view('pages.home', ['products' => $products]);
    }

    // Search for products
    public function search(Request $request)
    {
        $params = $request->query('query', "");
        $products = Product::where('name', 'like', '%' . $params . '%')
            ->orWhere('description', 'like', '%' . $params . '%')
            ->paginate(8);
        return view('pages.home', ['products' => $products, 'search' => true]);
    }

    // Get product based on id
    public function show($id)
    {
        $product = Product::find($id);
        $order = Cart::where('productid', $id)->where('userid', Auth::id())->first();
        return view('pages.detail', ['edit' => $order, "product" => $product, "quantity" => $order ? $order->quantity : 0]);
    }

    // Get add product form
    public function create()
    {
        return view('pages.add-product');
    }

    // Validate and save new product
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:products|min:5|max:20',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'stock' => 'required|numeric|min:1'
        ]);
        $new_product = new Product;
        $new_product->name = $req->name;
        $new_product->description = $req->description;
        $new_product->price = $req->price;
        $new_product->stock = $req->stock;
        $path = $req->file('image')->getRealPath();
        $image = file_get_contents($path);
        $new_product->image = base64_encode($image);
        $new_product->save();
        return redirect(route('products.index'));
    }

    // Delete product by id
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect(route('products.index'));
    }
}
