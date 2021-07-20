<?php

namespace App\Imports;

use App\Models\InvitedGuest;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvitedGuestImport implements ToModel,  WithBatchInserts, WithChunkReading, WithHeadingRow, ShouldQueue
{
    private $weddingEvent;
    public function __construct($weddingEvent)
    {
        $this->weddingEvent = $weddingEvent;
    }

    public function model(array $row)
    {
        $slug = mt_rand(100000, 999999);
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(900, 0, null, null, Fill::uniformColor(new Rgb(0, 0, 0), new Rgb(255, 255, 255))),
                new SvgImageBackEnd
            )
        ))->writeString($slug);
        $writer = trim(substr($svg, strpos($svg, "\n") + 1));
        return new InvitedGuest([
            'slug' => $slug,
            'barcode' => $writer,
            'name' => $row['name'],
            'number_of_guest' => $row['number_of_guest'],
            'reserved_for' => $row['reserved_for'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'room_needed' => $row['room_needed'],
            'attending' => $row['attending'],
            'wedding_event_id' => $this->weddingEvent->id,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function batchSize(): int
    {
        return 100;
    }

    /**
     * @inheritDoc
     */
    public function chunkSize(): int
    {
        return 100;
    }
}
