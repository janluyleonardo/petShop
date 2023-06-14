<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/inventories', InventoryController::class);
    Route::resource('/medical', MedicalController::class);
    Route::resource('/sales', SaleController::class);
    Route::get('/print/{id?}', [MedicalController::class, 'print'])->name('print');
    Route::get('export', [InventoryController::class, 'export'])->name('export');
    Route::post('import', [InventoryController::class, 'import'])->name('import');
});
