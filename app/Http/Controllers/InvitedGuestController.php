<?php

namespace App\Http\Controllers;

use App\Models\InvitedGuest;
use App\Models\WeddingEvent;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvitedGuestController extends Controller
{

    public function index()
    {
        return response()->json(InvitedGuest::all(), 200);
    }

    public function rsvp($slug)
    {
        $event = WeddingEvent::findOrFail($slug);
        return view('guests.rsvp', compact('event'));
    }

    public function verifyRsvp(InvitedGuest $guest)
    {
        return response()->json([$guest]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, WeddingEvent $weddingEvent)
    {

        $slug = mt_rand(100000, 999999);
        $svg = (new Writer(
            new ImageRenderer(
//                new RendererStyle(400, 0, null, null, Fill::uniformColor(new Rgb(153, 50, 204), new Rgb(255, 255, 255))),
                new RendererStyle(200, 0, null, null, Fill::uniformColor(new Rgb(0, 0, 0), new Rgb(255, 255, 255))),
                new SvgImageBackEnd
            )
        ))->writeString($slug);

        $writer = trim(substr($svg, strpos($svg, "\n") + 1));
        $guest = InvitedGuest::create([
            'slug' => $slug,
            'barcode' => $writer,
            'name' => $request->input('name'),
            'number_of_guest' => $request->input('number_of_guest'),
            'reserved_for' => $request->input('reserved_for'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'room_needed' => $request->input('room_needed'),
            'comment' => $request->input('comment'),
            'wedding_event_id' => $weddingEvent->id
        ]);
        $guest->load('weddingEvent');
       // return view('guests.ticket', compact('guest'));
        $name = "{$guest->slug}.svg";
        Storage::disk('ticket')->put($name, $writer);
        $link = url('ticket/'. $name);
        //return view('guests.ticket', compact('guest', 'link'));
        //$html = view('guests.ticket', compact('guest', 'link'))->render();
        $pdf = PDF::loadView('guests.ticket', compact('guest', 'link'));
        return $pdf->setPaper('a4', 'landscape')->stream('document.pdf');
        //$pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($html);
        return $pdf->setPaper('a4', 'landscape')->download('ticket.pdf');
    }

    public function show(InvitedGuest $invitedGuest)
    {
        //
    }


    public function edit(InvitedGuest $invitedGuest)
    {
        //
    }


    public function update(Request $request, InvitedGuest $invitedGuest)
    {
        //
    }


    public function destroy(InvitedGuest $invitedGuest)
    {
        //
    }

    public function ticket()
    {
        return view('guests.ticket');
    }

    private static function generateTicketPDF($guest)
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(400, 0, null, null, Fill::uniformColor(new Rgb(153, 50, 204), new Rgb(255, 255, 255))),
                new SvgImageBackEnd
            )
        ))->writeString($guest->slug);

        $writer = trim(substr($svg, strpos($svg, "\n") + 1));
        $name = "{$guest->slug}.svg";
        Storage::disk('ticket')->put($name, $writer);
        $link = url('ticket/'. $name);
        $html = view('guests.ticket', compact('guest', 'link'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf;
    }
}
