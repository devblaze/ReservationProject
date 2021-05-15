@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            @foreach($events as $event)
                <div class="col my-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1769f8b6c08%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1769f8b6c08%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">Description</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                {{ $event->venue->address->city->name .", " . $event->venue->address->city->country }}
                            </li>
                            <li class="list-group-item">
                                Ending: {{ \Carbon\Carbon::parse($event->end_time)->format('d/m/Y H:i') }}
                            </li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('event_show', $event->id) }}" class="btn btn-success">
                                Check in before
                                <br>
                                {{ \Carbon\Carbon::parse($event->end_time)->format('d/m/Y H:i') }}
                            </a>
                            <p class="text-danger">Not available seats</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $events->links() }}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection
