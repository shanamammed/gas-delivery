<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\OrderController;
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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [LoginController::class, 'postLogin'])->name('adminLoginPost');
/*middleware starts from here*/
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('adminLogout');
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/services', [ServiceController::class, 'index'])->name('services');
        Route::get('/services/add', [ServiceController::class, 'add'])->name('serviceAdd');
        Route::post('/services/addService', [ServiceController::class, 'addService'])->name('serviceCreate');
        Route::get('/services/details/{id}', [ServiceController::class, 'details'])->name('serviceDetails');
        Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->name('serviceEdit');
        Route::post('/services/updateService', [ServiceController::class, 'updateService'])->name('serviceUpdate');
        Route::get('/services/delete/{id}', [ServiceController::class, 'delete'])->name('serviceDestroy');

        Route::get('/orders/pending', [OrderController::class, 'pending'])->name('pendingOrders');
        Route::get('/orders/approved', [OrderController::class, 'approved'])->name('approvedOrders');
        Route::get('/orders/completed', [OrderController::class, 'completed'])->name('completedOrders');
        Route::get('/orders/cancelled', [OrderController::class, 'cancelled'])->name('cancelledOrders');
         Route::get('/orders/details/{id}', [OrderController::class, 'details'])->name('orderDetails');
    });
});
