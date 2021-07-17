<?php

namespace App\Models;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitedGuest extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'barcode', 'name', 'status', 'number_of_guest', 'reserved_for', 'email', 'phone', 'room_needed', 'comment', 'attending', 'wedding_event_id'];


    public function getQrCodeAttribute()
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(192, 0, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd
            )
        ))->writeString($this->slug);

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }

    public function weddingEvent(){
        return $this->belongsTo(WeddingEvent::class, 'wedding_event_id');
    }

}
