<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(): Renderable
    {
        $events = Event::paginate(6);
        return view('event.index', ['events' => $events]);
    }

    public function create(): Renderable
    {
        return view('event.create', ['venues' => Venue::all()]);
    }

    public function store(Request $request)
    {
        $request['venue_id'] = $this->validateVenue($request->venue_id);
        Event::create($this->validateData($request) + ['user_id' => auth()->user()->id, 'end_time' => "2002-02-02 20:00:00"]);
        return redirect(route('event_list'));
    }

    public function list(): Renderable
    {
        $userEventList = Event::where('user_id', auth()->user()->id)->paginate(6);
        return view('event.list')->with('eventList', $userEventList);
    }

    public function show(Request $request): Renderable
    {
        $event = Event::find($request->id);
        return view('event.show', compact('event'));
    }

    public function edit(Event $event): Renderable
    {
        return view('event.edit');
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Request $request)
    {
        $event = Event::find($request->id);

        $event->safeDelete($request);

        return redirect(route('event_list'));
    }

    public function clearMessage(): void
    {
        session()->forget('type');
        session()->forget('message');
    }

    public function validateData(Request $request): array
    {
        return $request->validate([
            'name'      => 'required',
            'type'      => 'required',
            'venue_id'  => 'required'
        ]);
    }

    private function validateVenue(int $venueId): string
    {
        if ($venueId <= 0) return 0;

        return (string)Venue::find($venueId)->id;
    }
}
