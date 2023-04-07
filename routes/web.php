<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use App\Models\RoleRoute;

function getRoleName($routeName)
{
    $routesData = RoleRoute::where('route_name', $routeName)->get();
    $result = [];
    foreach ($routesData as $routeData) {
        array_push($result, $routeData->role_name);
    }
    return $result;
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/post/add', [PostController::class, 'index'])->name('post.add')->middleware('roles');
Route::post('/post/new', [PostController::class, 'create'])->name('post.new');
Route::get('/post/manage', [PostController::class, 'manage'])->name('post.manage');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'edit'])->name('post.update');
Route::post('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');


 Route::middleware([ 'auth:sanctum',  config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/role/add', [RoleController::class, 'index'])->name('role.add');
    Route::post('/role/new', [RoleController::class, 'create'])->name('role.new');
    Route::get('/role/manage', [RoleController::class, 'manage'])->name('role.manage');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

    Route::get('/company/add',[CompanyController::class,'index'])->name('company.add');
    Route::post('/company/new',[CompanyController::class,'create'])->name('company.new');
    Route::get('/company/manage',[CompanyController::class,'manage'])->name('company.manage');
    Route::get('/company/edit/{id}',[CompanyController::class,'edit'])->name('company.edit');
    Route::post('/company/update/{id}',[CompanyController::class,'update'])->name('company.update');
    Route::get('/company/delete/{id}',[CompanyController::class,'delete'])->name('company.delete');

    Route::get('/department/add',[DepartmentController::class,'index'])->name('department.add');
    Route::post('/department/new',[DepartmentController::class,'create'])->name('department.new');
    Route::get('/department/manage',[DepartmentController::class,'manage'])->name('department.manage');
    Route::post('/department/update/{id}',[DepartmentController::class,'update'])->name('department.update');
    Route::get('/department/delete/{id}',[DepartmentController::class,'delete'])->name('department.delete');

    Route::get('/designation/add',[DesignationController::class,'index'])->name('designation.add');
    Route::post('/designation/new',[DesignationController::class,'create'])->name('designation.new');
    Route::get('/designation/manage',[DesignationController::class,'manage'])->name('designation.manage');
    Route::post('/designation/update/{id}',[DesignationController::class,'update'])->name('designation.update');
    Route::get('/designation/delete/{id}',[DesignationController::class,'delete'])->name('designation.delete');

    Route::get('/employee/add',[EmployeeController::class,'index'])->name('employee.add');
    Route::post('/employee/new',[EmployeeController::class,'create'])->name('employee.new');
    Route::get('/employee/manage',[EmployeeController::class,'manage'])->name('employee.manage');
    Route::get('/employee/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::post('/employee/update/{id}',[EmployeeController::class,'update'])->name('employee.update');
    Route::get('/employee/delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete');

    Route::get('/user/add', [UserController::class, 'index', ])->name('user.add');
    Route::post('/user/new', [UserController::class, 'create'])->name('user.new');
    Route::get('/user/manage', [UserController::class, 'manage'])->name('user.manage');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');


    Route::get('/attendance/{id?}', 'AttendanceController@index')->name('attendance');
    Route::post('/attendance', 'AttendanceController@store')->name('store');

    Route::delete('/attendance/{id?}', 'AttendanceController@attendanceRemove')->name('attendance');
    Route::get('/attendanceView/{id?}', 'AttendanceController@attendanceView')->name('attendanceView');

 });
