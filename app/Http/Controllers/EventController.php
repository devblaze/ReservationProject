<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $events = Event::all();
        return view('event.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('event.create', ['venues' => Venue::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Event::create($this->validateData($request + [
            'user_id' => auth()->user()->id
        ]));

    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Renderable
     */
    public function show(Request $request): Renderable
    {
        $event = Event::find($request->id);
        return view('event.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Renderable
     */
    public function edit(Event $event): Renderable
    {
        return view('event.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Event  $event
     * @return Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event  $event
     * @return Response
     */
    public function destroy(Event $event)
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validateData(Request $request): array
    {
        return $request->validate([
            'name'      => 'required',
            'type'      => 'required',
            'venue_id'  => 'required',
            'end_time'  => 'required'
        ]);
    }
}
