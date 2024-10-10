<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $table = 'departments';
    use HasFactory;
    protected $fillable = [
        'department_name' 
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class,'department_id');
    }
}
