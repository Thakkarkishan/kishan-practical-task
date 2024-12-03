<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return redirect(baseUrl().'/dashboard');
});
Route::get('/dashboard',[Home::class,'index']);
Route::post('/employee/list',[EmployeeController::class,'employee_list'])->name('employee/list');
Route::get('/employee/add',[EmployeeController::class,'employee_add'])->name('employee/add');
Route::post('/employee/add-save',[EmployeeController::class,'employee_save'])->name('employee/add-save');
Route::get('/employee/emplyee-view/{id}',[EmployeeController::class,'employee_view'])->name('employee/emplyee-view');
Route::post('/employee/edit',[EmployeeController::class,'employee_update'])->name('employee/edit');
Route::post('/employee/delete',[EmployeeController::class,'employee_delete'])->name('employee/delete');