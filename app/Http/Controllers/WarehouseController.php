<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function getAllEmployees()
    {
        // جلب بيانات الموظفين من قاعدة البيانات
        $employees = Employee::all();
        return $employees;
    }
}
