<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

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
        Event::create($this->validateData($request)
            + [
                'user_id' => auth()->user()->id,
                'end_time' => '2002-02-02 20:00:00'
            ]);
        return redirect(route('event_list'));
    }

    public function list(): Renderable
    {
        $userEventList = Event::where('user_id', auth()->user()->id)->paginate(6);
        return view('event.list')->with('eventList', $userEventList);
    }

    /**
     * @throws \Exception
     */
    public function show(Request $request): Renderable
    {
        $event = Event::find($request->id);

        $now = Carbon::now();
        $to = Carbon::createFromFormat('Y-m-d H:s:i', $event->getAttributes()['updated_at']);
        $event->last_updated = CarbonInterval::seconds($to->diffInSeconds($now))
            ->cascade()
            ->forHumans(null, false, 1);

        $event->arrayTest = collect([
                ["x" => 0, "y" => 0, "w" => 2, "h" => 2, "i" => "0"],
                ["x" => 2, "y" => 0, "w" => 2, "h" => 5, "i" => "1"],
                ["x" => 4, "y" => 0, "w" => 2, "h" => 3, "i" => "2"],
                ["x" => 6, "y" => 0, "w" => 2, "h" => 3, "i" => "3"],
                ["x" => 8, "y" => 0, "w" => 2, "h" => 3, "i" => "4"],
                ["x" => 10, "y" => 0, "w" => 2, "h" => 3, "i" => "5"],
                ["x" => 0, "y" => 5, "w" => 2, "h" => 5, "i" => "6"],
                ["x" => 2, "y" => 5, "w" => 2, "h" => 5, "i" => "7"],
                ["x" => 4, "y" => 5, "w" => 2, "h" => 5, "i" => "8"],
                ["x" => 6, "y" => 5, "w" => 2, "h" => 4, "i" => "10"],
                ["x" => 8, "y" => 4, "w" => 2, "h" => 4, "i" => "11"],
                ["x" => 10, "y" => 4, "w" => 2, "h" => 4, "i" => "12"],
                ["x" => 0, "y" => 10, "w" => 2, "h" => 5, "i" => "13"],
                ["x" => 2, "y" => 10, "w" => 2, "h" => 5, "i" => "14"],
                ["x" => 4, "y" => 8, "w" => 2, "h" => 4, "i" => "15"],
                ["x" => 6, "y" => 8, "w" => 2, "h" => 4, "i" => "16"],
                ["x" => 8, "y" => 10, "w" => 2, "h" => 5, "i" => "17"],
                ["x" => 10, "y" => 4, "w" => 2, "h" => 2, "i" => "18"],
                ["x" => 0, "y" => 9, "w" => 2, "h" => 3, "i" => "19"],
                ["x" => 2, "y" => 6, "w" => 2, "h" => 2, "i" => "20"]
            ]);

        return view('event.show', compact('event'));
    }

    public function seats()
    {
        return json_encode([
            ["x" => 0, "y" => 0, "w" => 2, "h" => 2, "i" => "0"],
            ["x" => 2, "y" => 0, "w" => 2, "h" => 5, "i" => "1"],
            ["x" => 4, "y" => 0, "w" => 2, "h" => 3, "i" => "2"],
            ["x" => 6, "y" => 0, "w" => 2, "h" => 3, "i" => "3"],
            ["x" => 8, "y" => 0, "w" => 2, "h" => 3, "i" => "4"],
            ["x" => 10, "y" => 0, "w" => 2, "h" => 3, "i" => "5"],
            ["x" => 0, "y" => 5, "w" => 2, "h" => 5, "i" => "6"],
            ["x" => 2, "y" => 5, "w" => 2, "h" => 5, "i" => "7"],
            ["x" => 4, "y" => 5, "w" => 2, "h" => 5, "i" => "8"],
            ["x" => 6, "y" => 5, "w" => 2, "h" => 4, "i" => "10"],
            ["x" => 8, "y" => 4, "w" => 2, "h" => 4, "i" => "11"],
            ["x" => 10, "y" => 4, "w" => 2, "h" => 4, "i" => "12"],
            ["x" => 0, "y" => 10, "w" => 2, "h" => 5, "i" => "13"],
            ["x" => 2, "y" => 10, "w" => 2, "h" => 5, "i" => "14"],
            ["x" => 4, "y" => 8, "w" => 2, "h" => 4, "i" => "15"],
            ["x" => 6, "y" => 8, "w" => 2, "h" => 4, "i" => "16"],
            ["x" => 8, "y" => 10, "w" => 2, "h" => 5, "i" => "17"],
            ["x" => 10, "y" => 4, "w" => 2, "h" => 2, "i" => "18"],
            ["x" => 0, "y" => 9, "w" => 2, "h" => 3, "i" => "19"],
            ["x" => 2, "y" => 6, "w" => 2, "h" => 2, "i" => "20"]
        ]);
    }

    public function edit(Event $event): Renderable
    {
        return view('event.edit');
    }

    public function update(Request $request, Event $event)
    {
        $test = Event::updateOrCreate();
    }

    public function destroy(Request $request): Redirector
    {
        $event = Event::find($request->id);

        session($event->safeDelete(auth()->user()));

        return redirect(route('event_list'));
    }

    public function cancel(Request $request): RedirectResponse
    {
        $event = Event::find($request->id);

        $result = $event->switchEventStatus(auth()->user());

        session()->put($result);

        return redirect(route('event_list'));
    }

    public function clearMessage(): void
    {
        session()->forget('type');
        session()->forget('message');
        session()->forget('messageTimer');
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
