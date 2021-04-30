<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class VenueController extends Controller
{
    public function index()
    {
        //
    }

    public function create(): Renderable
    {
        return view('venue.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request['venueName'] = $request->name;
        $city    = City::firstOrCreate($this->validateCity($request));
        $address = Address::firstOrCreate($this->validateAddress($request) + ['city_id' => $city->id]);
        Venue::create($this->validateVenue($request) + ['user_id' => auth()->user()->id, 'address_id' => $address->id]);
        return redirect()->route('event_index');
    }

    public function list(): Renderable
    {
        $userVenueList = auth()->user()->venues;
        return view('venue.list')->with('venueList', $userVenueList);
    }

    public function show(Venue $venue): Renderable
    {
        return view('venue.show', ['venue' => $venue]);
    }

    public function edit(Venue $venue)
    {
        //
    }

    public function update(Request $request, Venue $venue)
    {
        //
    }

    public function destroy(Venue $venue)
    {
        //
    }

    private function validateCity(Request $request): array
    {
        $request['name']      = $request->city;
        return $request->validate([
            'name'    => 'required',
            'country' => 'required'
        ]);
    }

    private function validateAddress(Request $request): array
    {
        return $request->validate([
            'region'      => 'required',
            'street_name' => 'required',
            'number'      => 'required',
            'postal_code' => 'required',
            'comments'    => 'max:255'
        ]);
    }

    private function validateVenue(Request $request): array
    {
        $request['name'] = $request->venueName;
        return $request->validate([
            'name'     => 'required',
            'subareas' => 'max:255'
        ]);
    }
}
