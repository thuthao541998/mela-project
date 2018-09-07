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
    protected $appends = ['product'];
    public function getProductAttribute(){
        $product = Product::find($this->product_id);
        return $product;
    }
}
