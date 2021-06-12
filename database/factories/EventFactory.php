<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        $venue = Venue::factory()->create([
            'user_id' => $user->id
        ]);
        return [
            'name' => $this->faker->company,
            'type' => $this->faker->word,
            'status' => "active",
            'end_time' => $this->faker->dateTime,
            'venue_id' => $venue->id,
            'user_id' => $user->id
        ];
    }
}
