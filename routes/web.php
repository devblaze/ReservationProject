<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VenueController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [EventController::class, 'index'])->name('event_index');
//Route::get('/event/show/{id}', [EventController::class, 'show'])->name('event_checkin');

Auth::routes();

Route::middleware('auth')->group(static function () {

    /**
     * Home test route.
     */
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /**
     * Reservation routes.
     */
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation_index');
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservation_create');
    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservation_edit');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservation_show');

    /**
     * Event routes.
     */
    Route::get('/event/create', [EventController::class, 'create'])->name('event_create');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event_edit');
    Route::get('/event/{id}', [EventController::class, 'show'])->name('event_show');

    /**
     * Venue routes.
     */
    Route::get('/venue', [VenueController::class, 'index'])->name('venue_index');
    Route::get('/venue/create', [VenueController::class, 'create'])->name('venue_create');
    Route::get('/venue/{id}/edit', [VenueController::class, 'edit'])->name('venue_edit');
    Route::get('/venue/{id}', [VenueController::class, 'show'])->name('venue_show');
});
