<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function multiimg()
    {
        return $this->hasMany(MultiImg::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function wishlist() {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }

    public function orderitem() {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }
}
