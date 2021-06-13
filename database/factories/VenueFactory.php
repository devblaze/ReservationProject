<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\City;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\QueryException;

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
        $address = Address::firstWhere('id', $this->faker->numberBetween(1, 100));
        if (!$address) {
            $address = Address::factory()->create();
        }

        return [
            'name' => $this->faker->word,
            'subareas' => $this->faker->randomNumber(3),
            'address_id' => $address->id
        ];
    }
}
