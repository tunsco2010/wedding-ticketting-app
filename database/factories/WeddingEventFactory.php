<?php

namespace Database\Factories;

use App\Models\WeddingEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeddingEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WeddingEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => WeddingEvent::generateSlug(),
            'name' => 'Michelle & David',
            'date' => '24-07-2021',
            'address' => 'Oritamefa Baptist Church, Queen Elizabeth II Road, Total Garden, Ibadan, Nigeria',
            'first_contact_person' => 'Femi',
            'second_contact_person' => 'Tunde',
            'event_center' => 'Emeritus Professor Theophilus Oladipo Ogunlesi Hall, Ibadan, Nigeria.',
            'seating_arrangement' => 'Round Table', 'banner' => null, 'max_guest'=> 600
        ];
    }
}
