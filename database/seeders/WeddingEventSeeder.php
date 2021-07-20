<?php

namespace Database\Seeders;

use App\Models\WeddingEvent;
use Illuminate\Database\Seeder;

class WeddingEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       WeddingEvent::create([
           'slug' => WeddingEvent::generateSlug(),
           'name' => 'Michelle & David',
           'bride' => 'Michelle',
           'groom' => 'David',
           'start_time' => '1:00PM',
           'end_time' => '5:00PM',
           'date' => date_create('24 July 2021'),
           'address' => 'Oritamefa Baptist Church, Queen Elizabeth II Road, Total Garden, Ibadan, Nigeria',
           'first_contact_person' => 'Femi',
           'second_contact_person' => 'Tunde',
           'event_center' => 'Emeritus Professor Theophilus Oladipo Ogunlesi Hall, Ibadan, Nigeria.',
           'seating_arrangement' => 'Round Table',
           'banner' => null,
           'max_guest'=> 600
       ]);
    }
}
