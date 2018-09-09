<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id')->attributes['product'];
    }
//    public function getOrderAttribute(){
//        $order_id = $this->order_id;
//        $order = Order::find($order_id);
//        return $this->attributes['order'] = $order;
//    }
    protected $appends = ['product'];
    public function getProductAttribute(){
        $product = Product::find($this->product_id);
        return $product;
    }

    public function getProductsAttribute(){
        $products = Product::where('id','=',$this->product_id)->get();
        return $this->attributes['products'] = $products;
    }
    protected $appends = ['products'];
}
