<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;

    public function getBrand()
    {
        $brand = Brand::find($this->brandId);
        return $brand->name;
    }
    public function getCategory()
    {
        $category = Category::find($this->categoryId);
        return $category->name;
    }
    public function getPrice(){
       return $this->price;
    }
}
