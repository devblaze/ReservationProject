<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class EventTest extends TestCase
{
    public function testEventPageUserAccess(): void
    {
        $user = User::factory()->make();
        Auth::login($user);

        $response = $this->get(route('event_list'));

        $response->assertStatus(200);
    }

    public function testEventDatabaseNotEmpty(): void
    {
        $eventsCount = Event::count();

        $this->assertDatabaseCount('events', $eventsCount);
    }

    public function testHasSearch(): void
    {
        $response = Event::search();

        self::assertEquals($response->count(), Event::count());
    }

    public function testEventFactory(): void
    {
        $event = Event::factory()->make();

        self::assertTrue((bool)$event);
    }
}
