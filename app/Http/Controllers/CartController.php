<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use function Sodium\add;

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

    public function addToCartApi()
    {
        $id = Input::get('id');
        $quantity = Input::get('quantity');
        if ($id == null || $quantity == null) {
            return response()->json(['msg' => 'Thông tin không hợp lệ'], 404);
        }
        $product = Product::find($id);
        if ($product == null || $product->status != 1) {
            return response()->json(['msg' => 'Sản phẩm không tồn tại hoặc đã bị xoá!'], 404);
        }
        $cart = new Cart();
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            if (array_key_exists($id, $cart->items)) {
                $quantity += $cart->items[$id]->quantity;
            }
        }
        $item = new CartItem();
        $item->product = $product;
        $item->product->price = $product->price;
        $item->quantity = $quantity;
        $cart->items[$id] = $item;
        $cart->count = Cart::calculateTotalItem($cart);
        $cart->total_money = $cart->getTotalMoney();
        Session::put('cart', $cart);
        return response()->json(['msg' => 'Thêm vào giỏ hàng thành công', 'cart' => $cart,'items'=>$cart->items], 200);
    }


    public function showCart()
    {
        $cart = new Cart();
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            $items = $cart->items;
        }
        return view('client.cart.cart')->with('cart', $cart)->with('items', $items);
    }
}
