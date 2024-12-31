<?php

use App\Http\Controllers\admin\DataSalesController;
use App\Http\Controllers\admin\SectorController;
use App\Http\Controllers\admin\TransactionTypeController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\sales\VisitController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['logincheck:admin']], function () {
        // dashboard
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        // sector
        Route::get('/sector', [SectorController::class, 'index'])->name('sector.index');
        Route::post('/sector/store', [SectorController::class, 'store'])->name('sector.store');
        Route::put('/sector/{id}', [SectorController::class, 'update'])->name('sector.update');
        Route::delete('/sector/{id}', [SectorController::class, 'delete'])->name('sector.delete');
        
        // transaction type
        Route::get('/transaction-type', [TransactionTypeController::class, 'index'])->name('transaction.index');
        Route::post('/transaction-type/store', [TransactionTypeController::class, 'store'])->name('transaction.store');
        Route::put('/transaction-type/{id}', [TransactionTypeController::class, 'update'])->name('transaction.update');
        Route::delete('/transaction-type/{id}', [TransactionTypeController::class, 'delete'])->name('transaction.delete');

        // user management
        Route::get('user', [UserManagementController::class, 'index'])->name('user.index');
        Route::post('user/store', [UserManagementController::class, 'store'])->name('user.store');
        Route::put('user/{id}', [UserManagementController::class, 'update'])->name('user.update');
        Route::delete('user/{id}', [UserManagementController::class, 'delete'])->name('user.delete');
        
        // data sales
        Route::get('data-sales', [DataSalesController::class, 'index'])->name('data_sales.index');
        Route::post('data-sales/store', [DataSalesController::class, 'store'])->name('data_sales.store');
        Route::put('data-sales/{id}', [DataSalesController::class, 'update'])->name('data_sales.update');
        Route::delete('data-sales/{id}', [DataSalesController::class, 'delete'])->name('data_sales.delete');
    });
    Route::group(['middleware' => ['logincheck:sales']], function () {
        // dashboard
        Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
        
        // visit
        Route::get('visit', [VisitController::class, 'index'])->name('visit.index');
        Route::post('visit/store', [VisitController::class, 'store'])->name('visit.store');
        Route::put('visit/{id}', [VisitController::class, 'update'])->name('visit.update');
        Route::delete('visit/{id}', [VisitController::class, 'delete'])->name('visit.delete');

    });
});
