<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeddingEventRequest;
use App\Models\InvitedGuest;
use App\Models\WeddingEvent;
use Illuminate\Http\Request;

class WeddingEventController extends Controller
{

    public function index()
    {
        $events = WeddingEvent::paginate(20)->toArray();
        return view('wedding-event.index', compact('events'));
    }


    public function create()
    {
        return view('wedding-event.create');
    }


    public function store(CreateWeddingEventRequest  $request)
    {
        $wedding_event = WeddingEvent::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'address' => $request->input('address'),
            'first_contact_person' => $request->input('first_contact_person'),
            'second_contact_person' => $request->input('second_contact_person'),
            'event_center' => $request->input('event_center'),
            'seating_arrangement' => $request->input('seating_arrangement'),
            'banner' => $request->input('banner'),
            'max_guest' => $request->input('max_guest'),
        ]);
        return redirect()->back();
    }


    public function show(WeddingEvent $weddingEvent)
    {
        $guests = InvitedGuest::where('wedding_event_id', $weddingEvent->id)->paginate(100)->toArray();
        dd($guests, $weddingEvent);
        return view('wedding-event.show', compact('weddingEvent', 'guests'));
    }


    public function edit(WeddingEvent $weddingEvent)
    {
        return view('wedding-event.edit', compact('weddingEvent'));
    }


    public function update(Request $request, WeddingEvent $weddingEvent)
    {
        //
    }


    public function destroy(WeddingEvent $weddingEvent)
    {
        //
    }
}
