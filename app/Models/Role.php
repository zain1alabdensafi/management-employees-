<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table ='roles';
    use HasFactory;
    protected $fillable = [
        'type'
    ];
    public function employee()
    {
        return $this->hasMany(Employee::class,'role_id');
    }
}
