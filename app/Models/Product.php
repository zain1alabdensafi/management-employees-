<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';
    use HasFactory;
    protected $fillable = [
        'product_name',
        'quantity'
    ];
    public function order()
    {
        return $this->hasMany(Order::class,'product_id');
    }
}
