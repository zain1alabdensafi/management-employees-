<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class,'logout'])->name('logout');

Route::get('/home', function () {
    return view('Admin.home');
})->middleware('checkrole');;
Route::get('/user/home', function () {
    return view('User.home');
})->name('user.home');

Route::get('/add_employee', function () {
    return view('Admin.add_employee');
})->middleware('checkrole');

Route::post('/add_employee', [AdminController::class, 'add_employee'])->name('add_employee')->middleware('checkrole');
Route::get('/add_department',function(){
    return view('Admin.add_department');
})->name('add_department')
->middleware('checkrole');;
Route::post('/add_department',[DepartmentController::class,'add_department'])->name('add_department')->middleware('checkrole');;  
Route::get('/edit_department',function(){
    return view('Admin.edit_department');
})->name('edit_department')
->middleware('checkrole');;
Route::post('/edit_department',[DepartmentController::class,'edit_department'])->name('edit_department')->middleware('checkrole');;
Route::get('/edit_employee',function(){
    return view('Admin.edit_employee');
})->name('edit_employee')->middleware('checkrole');;
Route::post('/edit_employee',[EmployeeController::class,'edit_employee'])->name('edit_employee')->middleware('checkrole');;
Route::get('/delete_employee',function(){
    return view('Admin.delete_employee');
})->name('delete_employee')->middleware('checkrole');;
Route::post('/delete_employee',[EmployeeController::class,'delete_employee'])->name('delete_employee')->middleware('checkrole');;
Route::get('all_employees',[EmployeeController::class,'all_employees'])->name('all_employees');
Route::get('/search_employees',function(){
    return view('search_employees');
})->name('search_employees');
Route::post('/search_employees',[EmployeeController::class,'search_employees'])->name('search_employees');
Route::get('all_departments',[DepartmentController::class,'all_departments'])->name('all_departments');
Route::get('/delete_department',function(){
    return view('Admin.delete_department');
})->name('delete_department')->middleware('checkrole');
Route::post('/delete_department',[DepartmentController::class,'delete_department'])->name('delete_department')->middleware('checkrole');
Route::get('/all_product',[ProductController::class,'all_product'])->name('all_product');
Route::get('/edit_product',function(){
    return view('Admin.edit_product');
})->name('edit_product')->middleware('checkrole');
Route::post('/edit_product',[ProductController::class,'edit_product'])->name('edit_product')->middleware('checkrole');
Route::get('/employees_hiredate',function(){
    return view('employees_hiredate');
})->name('employees_hiredate');
Route::post('/employees_hiredate',[EmployeeController::class,'employees_hiredate'])->name('employees_hiredate');
Route::get('/range_salary',[EmployeeController::class,'range_salary'])->name('range_salary');
Route::get('/employees_most_order',function(){
    return view('employees_most_order');
})->name('employees_most_order');
Route::post('/employees_most_order',[EmployeeController::class,'employees_most_order'])->name('employees_most_order');
Route::get('/products_most_sells',function(){
    return view('products_most_sells');
})->name('products_most_sells');
Route::post('/products_most_sells',[ProductController::class,'products_most_sells'])->name('products_most_sells');
Route::get('/add_product',function(){
    return view('Admin.add_product');
})->name('add_product')->middleware('checkrole');
Route::post('/add_product',[ProductController::class,'add_product'])->name('add_product')->middleware('checkrole');
Route::get('/delete_product',function(){
    return view('Admin.delete_product');
})->name('delete_product')->middleware('checkrole');
Route::post('/delete_product',[ProductController::class,'delete_product'])->name('delete_product')->middleware('checkrole');

// routes/api.php في الـ Data Warehouse
Route::get('/employees', [WarehouseController::class, 'getAllEmployees'])->name('employees');


Route::get('/exportPDF', [EmployeeController::class,'exportPDF'])->name('exportPDF');

Route::get('/', function () {
    return view('welcome');
});
