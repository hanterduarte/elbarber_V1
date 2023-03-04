<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price'
    ];
    
    public function category() {

        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function order() {

        return $this->hasMany(Order::class, 'id_products', 'id');
    }

   /* public function orders()
{
    return $this->belongsToMany(Order::class, 'order_products')
        ->withPivot('quantidade', 'preco_unitario')
        ->withTimestamps();
}*/
    /*public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }*/

}
