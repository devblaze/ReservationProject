<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserAccountController;
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
Route::get('/clearMessage', [EventController::class, 'clearMessage'])->name('clear_message');

Auth::routes();

Route::middleware('auth')->group(static function () {

    /**
     * User account routes.
     */
    Route::get('/profile', [UserAccountController::class, 'profile'])->name('user_profile');
    Route::get('/reservation', [UserAccountController::class, 'reservation'])->name('user_reservation');

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
    Route::post('/event/create', [EventController::class, 'store'])->name('event_store');
    Route::get('/event/create', [EventController::class, 'create'])->name('event_create');
    Route::get('/event/list', [EventController::class, 'list'])->name('event_list');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event_edit');
    Route::get('/event/{id}/cancel', [EventController::class, 'cancel'])->name('event_cancel');
    Route::get('/event/{id}/delete', [EventController::class, 'destroy'])->name('event_delete');
    Route::get('/event/{id}', [EventController::class, 'show'])->name('event_show');

    /**
     * Venue routes.
     */
    Route::get('/venue', [VenueController::class, 'index'])->name('venue_index');
    Route::post('/venue/create', [VenueController::class, 'store'])->name('venue_store');
    Route::get('/venue/create', [VenueController::class, 'create'])->name('venue_create');
    Route::get('/venue/list', [VenueController::class, 'list'])->name('venue_list');
    Route::get('/venue/{venue}', [VenueController::class, 'show'])->name('venue_show');
    Route::get('/venue/{venue}/edit', [VenueController::class, 'edit'])->name('venue_edit');
});
