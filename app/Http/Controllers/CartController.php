<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Order;
use App\OrderDetail;
use App\Product;
use Foo\DataProviderIssue2922\SecondHelloWorldTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $item->product->dicountPriceString = $product->discountPriceString;
        $cart->items[$id] = $item;
        $cart->count = Cart::calculateTotalItem($cart);
        Session::put('cart', $cart);
        return redirect('/cart');
    }
    public function updateCart()
    {
        $cart = new Cart();
        $products = Input::get('products');
        if (is_array($products)) {
            foreach (array_keys($products) as $key) {
                $product = Product::find($key);
                if ($product == null || $product->status != 1) {
                    return view('admin.404.404');
                }
                $item = new CartItem();
                $item->product = $product;
                $item->quantity = $products[$key];
                $cart->items[$key] = $item;
            }
        }
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

    public function removeCart($id)
    {
        Cart::getRemoveItem($id);
        return redirect('/cart');
    }
    public function checkoutCart()
    {
        if (Session::has('cart')) {
            try {
                DB::beginTransaction();
                $cart = Session::get('cart');
                $ship_name = Input::get('ship_name');
                $ship_address = Input::get('ship_address');
                $ship_phone = Input::get('ship_phone');
                $total_price = Input::get('total_price');
                $order = new Order();
                $order->ship_name = $ship_name;
                $order->ship_address = $ship_address;
                $order->ship_phone = $ship_phone;
                $order->total_price = 0;
                $order->save();
                $order_id = $order->id;
                $order_details = array();
                foreach ($cart->items as $item) {
                    $product = Product::find($item->product->id);
                    if ($product == null || $product->status != 1) {
                        return view('admin.404.404');
                    }
                    $quantity = $item->quantity;
                    $order_detail = new OrderDetail();
                    $order_detail->order_id = $order_id;
                    $order_detail->product_id = $product->id;
                    $order_detail->quantity = $quantity;
                    $order_detail->unit_price = $product->discountPrice;
                    $order->total_price += $order_detail->unit_price * $order_detail->quantity;
                    $order_detail->save();
                    array_push($order_details, $order_detail);
                }
                $order->save();
                DB::commit();
                // clear session cart.
                Session::remove('cart');
                // send mail or sms.
                return view('client.order-success')->with('order', $order)->with('order_details', $order_details);
            } catch (\Exception $exception) {
                DB::rollBack();
                return 'Có lỗi xảy ra.' . $exception->getMessage();
            }
        } else {
            return view('cart')->with('message', 'Hiện tại chưa có sản phẩm nào trong giỏ hàng.');
        }
    }
}
