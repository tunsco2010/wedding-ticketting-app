<?php

use App\Http\Controllers\WeddingEventController;
use App\Models\InvitedGuest;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('events/guests/{event}', [InvitedGuest::class, 'index'])->middleware('auth:sanctum')->name('event-guests');
Route::get('events/guests/rsvp/{slug}', [InvitedGuest::class, 'index'])->middleware('auth:sanctum')->name('event-guests-rsvp');
Route::resource('events', WeddingEventController::class)->middleware('auth:sanctum');
