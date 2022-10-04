<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookingController;

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


Route::group(['prefix' => 'admin'], function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');

    Route::get('/booking', [BookingController::class, 'index'])->name('admin.booking.index');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('admin.booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('admin.booking.store');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('admin.booking.show');
    Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('admin.booking.edit');
    Route::put('/booking/{id}', [BookingController::class, 'update'])->name('admin.booking.update');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('admin.booking.destroy');


});

