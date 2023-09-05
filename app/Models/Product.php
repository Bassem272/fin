<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;
    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
