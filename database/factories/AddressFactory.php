<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $city = City::factory()->create();
        return [
            'region' => $this->faker->locale,
            'street_name' => $this->faker->address,
            'number' => $this->faker->randomNumber(2),
            'postal_code' => $this->faker->postcode,
            'city_id' => $city->id
        ];
    }
}
