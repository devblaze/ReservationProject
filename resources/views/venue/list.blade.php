@extends('layouts.app')

@section('content')
    All your Venues
    <div class="row">
        <div class="col">
            <div class="row">
                @foreach($venueList as $venue)
                    <div class="col my-3">
                        <div class="card" style="width: 18rem;">
                            <div data-toggle="modal" data-target="#exampleModal">
                                <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1769f8b6c08%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1769f8b6c08%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                            </div>

                            <!-- Pop up -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Venue - {{ $venue->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form method="POST" action="{{ route('venue_update') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $venue->name }}" placeholder="{{ $venue->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" class="form-control" id="country" name="country" value="{{ $venue->address->city->country }}" placeholder="{{ $venue->address->city->country }}">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="{{ $venue->address->city->name }}" placeholder="{{ $venue->address->city->name }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="region">Region</label>
                                                        <input type="text" class="form-control" id="region" name="region" value="{{ $venue->address->region }}" placeholder="{{ $venue->address->region }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="street_name">Address</label>
                                                        <input type="text" class="form-control" id="street_name" name="street_name" value="{{ $venue->address->street_name }}" placeholder="{{ $venue->address->street_name }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="number">Number</label>
                                                        <input type="text" class="form-control" id="number" name="number" value="{{ $venue->address->number }}" placeholder="{{ $venue->address->number }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="postal_code">Zip</label>
                                                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $venue->address->postal_code }}" placeholder="{{ $venue->address->postal_code }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="subareas">Number of event areas</label>
                                                    <input type="text" class="form-control" id="subareas" name="subareas" value="{{ $venue->subareas }}" placeholder="{{ $venue->subareas }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">{{ $venue->name }}</h5>
                                <p class="card-text">
                                    {{ $venue->address->street_name . " " . $venue->address->number . ", "}}
                                    {{ $venue->address->region . " " . $venue->address->postal_code }}
                                </p>
                                <p class="card-text">
                                    {{ $venue->address->city->name . ", " . $venue->address->city->country }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $venueList->links() }}
            </div>

        </div>
    </div>
@endsection
