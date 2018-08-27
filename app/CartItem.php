<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function getTotalPriceWithFormat(){
        return sprintf('%s', number_format($this->product->discountPrice * $this->quantity,0));
    }
}
