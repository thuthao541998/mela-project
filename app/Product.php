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

    public function getDiscountPriceWithFormatAttribute()
    {
        if ($this->discount == 0) {
            return sprintf('%s', number_format($this->price, 0));
        }
        return sprintf('%s', number_format(($this->price - ($this->price * $this->discount / 100)), 0));
    }
    public function getDiscountPriceStringAttribute()
    {
        $price = '';
        if ($this->discount == 0) {
            $price = sprintf('%s (vnd)', number_format($this->price, 0));
            return $this->attributes['discountPriceString'] = $price;
        }
        $price = sprintf('%s (vnd)', number_format(($this->price - ($this->price * $this->discount / 100)), 0));
        return $this->attributes['discountPriceString'] = $price;

    }
    public function getOriginalPriceStringAttribute()
    {
        $price = sprintf('%s (vnd)', number_format($this->price, 0));
        return $this->attributes['originalPriceString'] = $price;
    }
    public function getOriginalPriceWithFormatAttribute()
    {
        return sprintf('%s', number_format($this->price, 0));
    }
    public function getTotalPriceWithFormatAttribute()
    {
        return sprintf('%s', number_format($this->price * (100-$this->discount)/100, 0));
    }
    public function getDiscountPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }
    public function isNew()
    {
        // sản phẩm được tạo trong vòng bảy ngày thì là sản phẩm mới.
        return time() - (60 * 60 * 24 * 7) < strtotime($this->created_at);
    }
    public function isDiscount()
    {
        return $this->discount > 0;
    }
    public function getBlockStyleAttribute()
    {
        if ($this->isNew() && $this->isDiscount()) {
            return ' block2-labelnewsale';
        } else if ($this->isNew()) {
            return ' block2-labelnew';
        } else if ($this->isDiscount()) {
            return ' block2-labelsale';
        } else {
            return '';
        }
    }
    protected $appends = ['original_price_string','discount_price_string'];

}
