<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\QueryException;

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
        $startDate = 'now';
        $endDate = '+2 years';
        $timezone = null;

        $user = User::firstWhere('id', $this->faker->numberBetween(1, 100));
        if (!$user) {
            $user = User::factory()->create();
        }

        $venue = Venue::firstWhere('user_id', $user->id);
        if (!$venue) {
            $venue = Venue::factory()->create([
                'user_id' => $user->id
            ]);
        }

        return [
            'name' => $this->faker->company,
            'type' => "Party of " . $this->faker->creditCardType,
            'description' => $this->faker->sentence(6, true),
            'end_time' => $this->faker->dateTimeBetween($startDate, $endDate, $timezone),
            'venue_id' => $venue->id,
            'user_id' => $user->id
        ];
    }
}
