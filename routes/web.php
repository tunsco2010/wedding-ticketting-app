<?php

use App\Http\Controllers\InvitedGuestController;
use App\Http\Controllers\WeddingEventController;
use App\Models\WeddingEvent;
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
    $event = WeddingEvent::first();
    return view('guests.rsvp', compact('event'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('events/guests/ticket', [InvitedGuestController::class, 'ticket']);
Route::get('events/guests/ticket/download/{guest}', [InvitedGuestController::class, 'downloadTicket'])->name('downloadTicket')->middleware('auth:sanctum');
Route::get('events/guests/ticket/send/{guest}', [InvitedGuestController::class, 'sendTicket'])->name('sendTicket')->middleware('auth:sanctum');
Route::delete('events/guests/ticket/delete/{invitedGuest}', [InvitedGuestController::class, 'destroy'])->name('deleteGuest')->middleware('auth:sanctum');
Route::get('events/guests/{event}', [InvitedGuestController::class, 'index'])->middleware('auth:sanctum')->name('event-guests');
Route::post('events/guests/import/{weddingEvent}', [InvitedGuestController::class, 'import'])->middleware('auth:sanctum')->name('importGuest');
Route::post('events/guests/delete-all/{weddingEvent}', [InvitedGuestController::class, 'deleteAll'])->middleware('auth:sanctum')->name('deleteAll');
Route::post('events/guests/send-all/{id}', [InvitedGuestController::class, 'sendAllPasscodeBySMS'])->middleware('auth:sanctum')->name('sendPasscodeBySMS');
Route::post('events/guests/send-single/{id}', [InvitedGuestController::class, 'sendPasscodeBySMS'])->middleware('auth:sanctum')->name('sendSinglePasscodeBySMS');

Route::get('events/guests/export/{weddingEvent}', [InvitedGuestController::class, 'export'])->middleware('auth:sanctum')->name('exportGuest');
Route::get('events/guests/rsvp/{slug}', [InvitedGuestController::class, 'rsvp'])->name('event-guests-rsvp');
Route::get('events/guests/rsvp/verify/{guest}', [InvitedGuestController::class, 'verifyRsvp'])->name('event-guests-rsvp-verify');
Route::post('events/guests/rsvp/{weddingEvent}', [InvitedGuestController::class, 'store'])->name('event-guests-rsvp');
Route::resource('events', WeddingEventController::class)->middleware('auth:sanctum');
