<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    function __construct()
    {
        $this->items = array();
    }
    function getTotalMoney(){
        $total_money = 0;
        foreach ($this->items as $item){
            $total_money += $item->product->price * $item->quantity;
        }
        return $total_money;
    }
    function getTotalMoneyWithFormat(){
        return sprintf('%s', number_format($this->getTotalMoney(), 0));
    }
}
