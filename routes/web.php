<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Login;
use App\Http\Livewire\Vouchers;
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

Route::get('/login', Login::class)->name('login');
Route::post(
    '/logout',
    function () {
        Auth::logout();

        return redirect()->route('login');
    }
)->name('logout');

Route::middleware(['auth', 'can:agency'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/vouchers', Vouchers::class)->name('finance.vouchers');
});
