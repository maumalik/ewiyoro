<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\RecapController;

use App\Models\Tax;
use App\Models\Pay;

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
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/sppt/belum-bayar', [TaxController::class, 'index'])->name('tax');
Route::post('/sppt/{tax}/belum-bayar', [TaxController::class, 'paytax'])->name('tax.pay');

Route::get('/sppt/sudah-bayar', [PayController::class, 'index'])->name('tax.payed');
Route::post('/sppt/{pay}/sudah-bayar', [PayController::class, 'unpay'])->name('tax.unpayed');

Route::get('/sppt/rekapitulasi-sudah-bayar', [RecapController::class, 'index'])->name('tax.recap');
Route::get('/sppt/{date}/rekapitulasi-sudah-bayar', [RecapController::class, 'detail'])->name('tax.recapdetail');
Route::get('/sppt/detail/{pay}/rekapitulasi-sudah-bayar', [RecapController::class, 'subdetail'])->name('tax.recapsubdetail');

