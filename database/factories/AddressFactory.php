<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\QueryException;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $city = City::firstWhere('id', $this->faker->numberBetween(1, 100));
        if (!$city) {
            $city = City::factory()->create();
        }

        return [
            'region' => $this->faker->name,
            'street_name' => $this->faker->streetName,
            'number' => $this->faker->randomNumber(3),
            'postal_code' => $this->faker->postcode,
            'city_id' => $city->id
        ];
    }
}
