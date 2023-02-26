<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id'];

    public function products() {

	    return $this->belogs(Product::class, 'id_products');

    }

}
