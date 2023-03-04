<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_products', 'price'
    ];

    public function products() {

	    return $this->belogsto(Product::class, 'id_products','id');

    }
}
