<?php

namespace App\Http\Controllers;

use App\Exports\InvitedGuestExport;
use App\Imports\InvitedGuestImport;
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
use Maatwebsite\Excel\Facades\Excel;

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

    public function deleteAll($weddingEvent)
    {
        try {
           InvitedGuest::where('wedding_event_id', $weddingEvent)->delete();
            return back()->with(['message' => 'Records deleted successfully']);
        } catch (\Exception $e) {
            return back()->with(['error_message' => $e->getMessage()]);
        }
    }

    public function import(Request $request, WeddingEvent $weddingEvent)
    {
        $request->validate([
            'guests'=> 'required|mimes:csv,xlsx'
        ]);
        try {
            Excel::import(new InvitedGuestImport($weddingEvent), request()->file('guests'));
            return back()->with(['message'=>'Records imported successfully']);
        } catch (\Exception $e) {
            return back()->with(['message' => $e->getMessage()]);
        }
    }

    public function export(Request $request, WeddingEvent $weddingEvent){
        return Excel::download(new InvitedGuestExport($weddingEvent), 'guest_list.xlsx');
    }

    public function store(Request $request, WeddingEvent $weddingEvent)
    {

        $slug = mt_rand(100000, 999999);
        $svg = (new Writer(
            new ImageRenderer(
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
        $pdf = PDF::loadView('guests.ticket', compact('guest'));
        $name = $guest->slug . '.pdf';
        return $pdf->setPaper('a4', 'landscape')->download($name);
    }

    public function downloadTicket(InvitedGuest $guest){
        $guest->load('weddingEvent');
        $pdf = PDF::loadView('guests.ticket', compact('guest'));
        $name = $guest->name . '_'.$guest->slug . '.pdf';
        return $pdf->setPaper('a4', 'landscape')->download($name);
    }

    public function sendTicket(InvitedGuest $guest){

        try {
            $guest->load('weddingEvent');

            $pdf = PDF::loadView('guests.ticket', compact('guest'));
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

    public function sendAllPasscodeBySMS(Request $request, $weddingEvent){
        try {
            $guests = InvitedGuest::where('wedding_event_id', $weddingEvent)->get();
            $successful = 0;
            $failed = 0;
            foreach ($guests as $guest) {
                if (!empty($guest->phone)) {
                    $eBulkSMS = new SendSMS();
                    $res = $eBulkSMS->sendSMS('M & D-2021', $this->getTextMessage($guest), $guest->phone);
                    if ($res) {
                        $successful++;
                    } else {
                        $failed++;
                    }
                }
            }
            return back()->with(['message' => "{$successful} SMS sent successfully and {$failed} failed."]);
        } catch (\Exception $e) {
            return back()->with(['message' => $e->getMessage()]);
        }
    }
    public function  sendPasscodeBySMS($id){

        $guest = InvitedGuest::findOrFail($id);
        if(!empty($guest->phone)){
            $eBulkSMS = new SendSMS();
            $eBulkSMS->sendSMS('Michelle-DAVID-2021', $this->getTextMessage($guest), $guest->phone);
            return back()->with(['message' => 'SMS sent successfully']);
        }
        return back()->with(['error_message'=> 'Could not send sms, check the phone number an try again']);
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
        $invitedGuest->forceDelete();
        return back()->with(['message' => 'Deleted successfully']);
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

    private function getTextMessage($guest)
    {
        return "Hello {$guest->name}, kindly present to the wedding team this PASSCODE: {$guest->slug} for your entrance and seat reservation. Warm regards, Michelle & David.";
    }
}
