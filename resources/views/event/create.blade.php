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
                                <input type="text" class="form-control" id="name" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" placeholder="1234 Main St">
                            </div>
                            <label for="inputState">Venue</label>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($venues as $venue)
                                            <option id="{{ $venue->id }}">{{ $venue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1 text-center justify-content-center align-items-end">
                                    <button type="submit" class="btn btn-primary">Info</button>
                                </div>
                                <div class="form-group col-md-1 text-center justify-content-center align-items-end">
                                    <button type="submit" class="btn btn-success">New</button>
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
