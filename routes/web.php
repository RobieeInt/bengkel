<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'admin.auth')->name('admin.login');
Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'authenticate'])->name('admin.login.auth');


Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function () {

    //logout
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    // route to dashbaord
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/booking', [BookingController::class, 'index'])->name('admin.booking.index');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('admin.booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('admin.booking.store');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('admin.booking.show');
    Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('admin.booking.edit');
    Route::put('/booking/{id}', [BookingController::class, 'update'])->name('admin.booking.update');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('admin.booking.destroy');

    //route get service detail
    Route::get('get-detail', [BookingController::class, 'getServiceDetail'])->name('getDetail');
    //change status
    Route::put('/changeStatus/{id}', [BookingController::class, 'changeStatus'])->name('changeStatus');

});

