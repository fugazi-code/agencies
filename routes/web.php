<?php

use App\Http\Livewire\CasesLivewire;
use App\Http\Livewire\ComplaintFormLivewire;
use App\Http\Livewire\DepriveLivewire;
use App\Http\Livewire\Login;
use App\Http\Livewire\MapLivewire;
use App\Http\Livewire\ReportLivewire;
use App\Http\Livewire\RescueRemoteLivewire;
use App\Http\Livewire\RescuesLivewire;
use App\Http\Livewire\Users;
use App\Http\Livewire\Reporting;
use App\Http\Livewire\VoucherV2Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AgencyLivewire;
use App\Http\Livewire\VoucherLivewire;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\ApplicantsLivewire;
use App\Http\Livewire\ApplicantDocsLivewire;
use App\Http\Livewire\OFWMonitoringLivewire;
use App\Http\Livewire\ApplicationFromLivewire;
use App\Http\Controllers\VouchersExportController;

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
Route::get('vouchers/export', [VouchersExportController::class, 'export'])->name('vouchers.export-excel');

Route::get('/login', Login::class)->name('login');
Route::post(
    '/logout',
    function () {
        $agency = auth()->user()->agency_id;
        Auth::logout();

        return redirect()->route('login', ['agency' => $agency]);
    }
)->name('logout');

Route::get('report', Reporting::class)->name('report');
Route::get('rescue-report', RescueRemoteLivewire::class)->name('rescue');
Route::get('complaint', ComplaintFormLivewire::class)->name('complaint-form-livewire');


Route::middleware(['auth'])->group(function () {
    Route::get('/', DashboardLivewire::class)->name('dashboard');

    Route::get('/applicant/form', ApplicationFromLivewire::class)->name('applicant.form');
    Route::get('/applicant/docs', ApplicantDocsLivewire::class)->name('applicant-docs-livewire');

    Route::middleware(['can:agency'])->group(function () {
        Route::get('/vouchers', VoucherLivewire::class)->name('finance.vouchers');
        Route::get('/vouchers-v2', VoucherV2Livewire::class)->name('finance.vouchers-v2');
        Route::get('/applicants', ApplicantsLivewire::class)->name('applicants');
    });

    Route::middleware(['can:admin'])->group(callback: function () {
        Route::get('/users', Users::class)->name('users');
        Route::get('/cases', CasesLivewire::class)->name('cases');
        Route::get('/reports', ReportLivewire::class)->name('report');
        Route::get('/mapview', MapLivewire::class)->name('map');
        Route::get('/rescues', RescuesLivewire::class)->name('rescues');
        Route::get('/agencies', AgencyLivewire::class)->name('agencies');
        Route::get('/ofw-monitoring', OFWMonitoringLivewire::class)->name('ofw.monitoring');
        Route::get('/deprive', DepriveLivewire::class)->name('deprive');
    });
});
