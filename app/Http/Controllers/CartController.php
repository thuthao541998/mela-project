<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart()
    {
        $id = Input::get('id');
        $quantity = Input::get('quantity');
        if ($id == null || $quantity == null) {
            return view('admin.404.404');// làm trang lỗi 400, bad request.
        }
        $product = Product::find($id);
        if ($product == null || $product->status != 1) {
            return view('admin.404.404');
        }
        // validate quantity.
        $cart = new Cart();
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            if (array_key_exists($id, $cart->items)) {
                $quantity += $cart->items[$id]->quantity;
            }
        }
        $item = new CartItem();
        $item->product = $product;
        $item->quantity = $quantity;
        $cart->items[$id] = $item;
        Session::put('cart', $cart);
        return redirect('/cart');
    }

    public function showCart()
    {
        $cart = new Cart();
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }
        return view('client.cart.cart')->with('cart', $cart);
    }
}
