<?php

use App\Http\Controllers\BalanceReplenishmentController;
use App\Http\Controllers\DepozitController;
use App\Http\Controllers\TransactionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'middleware' => 'auth'
], function () {
    
    Route::get('balance', [BalanceReplenishmentController::class, 'create'])->name('balance.replenishment.create');
    Route::post('balance', [BalanceReplenishmentController::class, 'store'])->name('balance.replenishment.store');

    Route::resource('depozit', DepozitController::class)->only(['create', 'store', 'index']);

    Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');

});