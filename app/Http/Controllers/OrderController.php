<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    // Get all contents of the cart
    public function index($user_id)
    {
        $cart = Cart::where('userid', $user_id)->get();
        $total_price = collect($cart)->reduce(function ($acc, $new) {
            return $acc + $new->product->price * $new->quantity;
        });
        $total_qty = collect($cart)->reduce(function ($acc, $new) {
            return $acc + $new->quantity;
        });
        return view('pages.cart', ['cart' => $cart, 'total_price' => $total_price ? $total_price : 0, 'total_qty' => $total_qty ? $total_qty : 0]);
    }

    // Add new product to the cart or update quantity of ordered item in the cart
    public function update($user_id, $product_id, Request $request)
    {
        $product = Product::find($product_id);
        $order = Cart::where('productid', $product_id)->where('userid', $user_id)->first();
        if ($order) {
            $product->stock += $order->quantity;
        }
        $request->validate(['quantity' => 'required|integer|min:1|max:' . $product->stock]);
        if ($order) {
            Cart::where('productid', $product_id)->where('userid', $user_id)->update(['quantity' => $request->quantity]);
        } else {
            $new_cart = new Cart;
            $new_cart->userid = $user_id;
            $new_cart->productid = $product_id;
            $new_cart->quantity = $request->quantity;
            $new_cart->save();
        }
        $product->stock -= $request->quantity;
        $product->save();
        return redirect(route('orders.index', ['user_id' => $user_id]));
    }

    // Remove product from cart
    public function destroy($user_id, $product_id)
    {
        $product = Product::find($product_id);
        $order = Cart::where('productid', $product_id)->where('userid', $user_id)->first();
        $product->stock += $order->quantity;
        Cart::where('productid', $product_id)->where('userid', $user_id)->delete();
        $product->save();
        return redirect(route('orders.index', ['user_id' => $user_id]));
    }

}
