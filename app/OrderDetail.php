<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function getProductsAttribute(){
        $products = Product::where('id','=',$this->product_id)->get();
        return $this->attributes['products'] = $products;
    }
    protected $appends = ['products'];
}
