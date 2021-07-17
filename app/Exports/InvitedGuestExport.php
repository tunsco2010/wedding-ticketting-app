<?php

namespace App\Exports;

use App\Models\InvitedGuest;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvitedGuestExport implements FromView, WithEvents, ShouldAutoSize, WithStyles
{
    private $weddingEvent;
    public function __construct($weddingEvent)
    {
        $this->weddingEvent = $weddingEvent;
    }

//    public function collection()
//    {
//        return InvitedGuest::where('wedding_event_id', $this->weddingEvent->id)
//            ->select('slug', 'name',  'email', 'phone', 'number_of_guest', 'reserved_for', 'attending','room_needed', 'comment')
//            ->get();
//    }

    public function view(): View
    {
        $guests = InvitedGuest::where('wedding_event_id', $this->weddingEvent->id)
            ->select('slug', 'name',  'email', 'phone', 'number_of_guest', 'reserved_for', 'attending','room_needed', 'comment')
            ->get();
        return view('guests.export', compact('guests'));
    }

    /**
     * @inheritDoc
     */
    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('Tunde Awopegba');
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'C'  => ['font' => ['size' => 16]],
        ];
    }
}
