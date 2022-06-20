<?php

use App\Http\Livewire\AgencyLivewire;
use App\Http\Livewire\ApplicantsLivewire;
use App\Http\Livewire\ApplicationFromLivewire;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Login;
use App\Http\Livewire\Users;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::middleware(['can:agency'])->group(function () {
        Route::get('/vouchers', Vouchers::class)->name('finance.vouchers');
        Route::get('/applicants', ApplicantsLivewire::class)->name('applicants');
        Route::get('/applicant/form', ApplicationFromLivewire::class)->name('applicant.form');
    });

    Route::middleware(['can:admin'])->group(function () {
        Route::get('/users', Users::class)->name('users');
        Route::get('/agencies', AgencyLivewire::class)->name('agencies');
    });
});
