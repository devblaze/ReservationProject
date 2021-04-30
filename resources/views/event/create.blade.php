@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create your event') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('event_store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="A name for the event">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Birthday Party, Rave Party, Cinema Night">
                            </div>
                            <label for="inputState">Venue</label>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <select id="venue" name="venue" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id }}">{{ $venue->id }}{{ $venue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1 text-center justify-content-center align-items-end">
                                    <a href="{{ route('venue_show', $venue->id) }}" class="btn btn-primary">Info</a>
                                </div>
                                <div class="form-group col-md-1 text-center justify-content-center align-items-end">
                                    <a href="{{ route('venue_create') }}" class="btn btn-success">New</a>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
