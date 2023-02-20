<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;


class Product extends Model
{
    use HasFactory;
    
    public function category() {

        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function order() {

        return $this->belongsTo(Order::class, 'id_products', 'id');
    }

}
