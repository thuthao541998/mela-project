<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function getTotalPriceWithFormat(){
        return sprintf('%s', number_format($this->product->price * $this->quantity, 0));
    }
}
