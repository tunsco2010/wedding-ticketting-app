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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class InvitedGuestController extends Controller
{

    public function index()
    {
        $guests = InvitedGuest::all();
        return view('guests.index', compact('guests'));
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
//                new RendererStyle(400, 0, null, null, Fill::uniformColor(new Rgb(104, 19, 25), new Rgb(255, 255, 255))),
                new RendererStyle(900, 0, null, null, Fill::uniformColor(new Rgb(0, 0, 0), new Rgb(255, 255, 255))),
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
        $name = "{$guest->slug}.svg";
        Storage::disk('ticket')->put($name, $writer);
        $link = url('ticket/'. $name);
        $pdf = PDF::loadView('guests.ticket', compact('guest', 'link'));
        $name = $guest->slug . '.pdf';
        return $pdf->setPaper('a4', 'landscape')->download($name);
    }

    public function downloadTicket(InvitedGuest $guest){
        $guest->load('weddingEvent');
        $link = url('ticket/'. $guest->slug.'.svg');
        $pdf = PDF::loadView('guests.ticket', compact('guest', 'link'));
        $name = $guest->name . '_'.$guest->slug . '.pdf';
        return $pdf->setPaper('a4', 'landscape')->download($name);
    }

    public function sendTicket(InvitedGuest $guest){

        try {
            $guest->load('weddingEvent');
            $link = url('ticket/' . $guest->slug . '.svg');
            $pdf = PDF::loadView('guests.ticket', compact('guest', 'link'));
            Mail::send('guests.email.ticket', compact('guest'), function ($message)
            use ($pdf, $guest) {
                if (filter_var($guest->email, FILTER_VALIDATE_EMAIL)) {
                    $message->to($guest->email, $guest->name);
                } else {
                    $message->to('tundeawopegba@gmail.com');
                }
                $message->subject('Ticket for' . $guest->name);
                $message->attachData($pdf->output(), $guest->name . '_ticket.pdf', [
                    'mime' => 'application/pdf',
                ]);
            });
            if (Mail::failures()) {
                return back()->with(['error' => 'Mail not sent']);
            }
            return back()->with(['message' => 'Mail sent successfully']);
        } catch (\Exception $e) {
            return back()->with(['message' => $e->getMessage()]);
        }
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
        $guest = InvitedGuest::first();
        return view('guests.ticket',compact('guest') );
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
