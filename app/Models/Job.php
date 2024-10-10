<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $table = 'jobs';
    use HasFactory;
    protected $fillable = [
        'job_name',
        'min_salary',
        'max_salary'
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class,'job_id');
    }
}
