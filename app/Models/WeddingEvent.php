<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class WeddingEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date', 'address',
        'first_contact_person', 'second_contact_person',
        'event_center', 'seating_arrangement', 'banner', 'max_guest'
    ];

//    public function setDateAttribute($input)
//    {
//        $this->attributes['date'] = empty($input) ? date('Y-m-d', now()) : Date('Y-m-d', strtotime($input));
//    }

    public function guests()
    {
        return $this->belongsTo(InvitedGuest::class, 'wedding_event_id');
    }

    public static function generateSlug(){
        return Uuid::uuid4();
    }

}
