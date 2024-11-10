<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home')->withoutMiddleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::put('/home/{id}/store', [HomeController::class, 'store'])->name('home.store');

// Group routes for admin middleware-protected actions
Route::group(['middleware' => 'shopAdmin_mw'], function() {

    Route::get('/booking/index', [BookingController::class, 'index'])->name('booking.index');
   
    Route::post('/booking/{id}/changeStatus', [BookingController::class, 'changeStatus'])->name('booking.changeStatus');
    
    Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');
    Route::get('/services/index', [ServiceController::class, 'index'])->name('service.index');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/services/{id}/update', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/services/{id}/delete', [ServiceController::class, 'destroy'])->name('service.delete');
});



