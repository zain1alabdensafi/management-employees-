<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';
    use HasFactory;
    protected $fillable = [
        'product_id',
        'employee_id',
        'order_date',
        'amount',
        'status'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }
}
