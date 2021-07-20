<?php

use App\Models\InvitedGuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/verify/rsvp/{slug}', function ($slug) {
    return InvitedGuest::with('weddingEvent')->where('slug', $slug)->firstOrFail();
});

Route::post('/verify/rsvp/{slug}', function ($slug) {
    InvitedGuest::with('weddingEvent')->where('slug', $slug)->firstOrFail()->update([
        'status' => 1,
    ]);
    return response()->json(['status' => 'successful'], 200);
});

Route::get('/guests/{id}', function ($id) {
    $quest = InvitedGuest::where('wedding_event_id', $id)->get();
    return response()->json(['status' => 'successful', 'data'=> $quest], 200);
});

Route::get('/guests/in/{id}', function ($id) {
    $quest = InvitedGuest::where('wedding_event_id', $id)->where('status', 1)->get();
    return response()->json(['status' => 'successful', 'data'=> $quest], 200);
});
