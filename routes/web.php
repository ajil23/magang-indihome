<?php

use App\Http\Controllers\admin\SectorController;
use App\Http\Controllers\admin\TransactionTypeController;
use App\Http\Controllers\AdminController;
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
    });
    Route::group(['middleware' => ['logincheck:sales']], function () {
        Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
    });
});
