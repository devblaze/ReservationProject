@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create your venue') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('venue_store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="ex. New York Mall, Home of John, Jason Park">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="ex. Germany, Greece, Italy">
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="ex. Berlin, Athens, Rome">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="region">Region</label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="ex. Friedrichstadt, Plaka, Ripa">
                            </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="street_name">Address</label>
                                    <input type="text" class="form-control" id="street_name" name="street_name" placeholder="Street name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="number">Number</label>
                                    <input type="text" class="form-control" id="number" name="number" placeholder="123">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="postal_code">Zip</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="54321">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subareas">Number of event areas</label>
                                <input type="text" class="form-control" id="subareas" name="subareas" placeholder="Subareas that are available">
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
