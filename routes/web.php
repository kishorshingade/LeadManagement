<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\CustomersController;
use App\Http\Controllers\admin\LeadsController;
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

Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('home');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('/customers', CustomersController::class);
    Route::get('/getCustomersTableData', [CustomersController::class, 'getCustomersTableData'])->name('getCustomersTableData');

    Route::resource('/employee', EmployeeController::class);
    Route::get('/getBrandsTableData', [EmployeeController::class, 'getBrandsTableData'])->name('getBrandsTableData');

    Route::resource('/leads', LeadsController::class);
    Route::get('/getLeadsTableData', [LeadsController::class, 'getLeadsTableData'])->name('getLeadsTableData');
});
