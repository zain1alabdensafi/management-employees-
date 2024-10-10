<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

use Illuminate\Notifications\Notifiable;

class Employee extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable,Notifiable;

    public $table = 'employees';

    protected $fillable = [
        'job_id',
        'department_id',
        'role_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'hiredate',
        'salary',
        'comissions'
    ];

        public function job()
        {
            return $this->belongsTo(Job::class);
        }
    
        public function department()
        {
            return $this->belongsTo(Department::class);
        }

        public function order()
        {
            return $this->hasMany(Order::class,'employee_id');
        }

        public function role()
        {
            return $this->belongsTo(Role::class);
        }
}
