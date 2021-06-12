<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

class VenueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address = Address::factory()->create();
        return [
            'name' => $this->faker->word,
            'subareas' => $this->faker->randomNumber(3),
            'address_id' => $address->id
        ];
    }
}
