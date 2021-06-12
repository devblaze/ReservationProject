@extends('layouts.app')

@section('content')
    All your Event
    <div class="row">
        <div class="col">
            <div class="row">
                @foreach($eventList as $event)
                    <div class="col my-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1769f8b6c08%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1769f8b6c08%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="card-text">{{ $event->type }}</p>
                            </div>
                            @if ($event->status === "active")
                                <a href="{{ route('event_cancel', $event->id) }}" class="btn btn-secondary mb-1"><i class="fas fa-ban"></i> Cancel</a>
                            @elseif ($event->status === "canceled")
                                <a href="{{ route('event_edit', $event->id) }}" class="btn btn-primary mb-1"><i class="fas fa-edit"></i> Edit</a>
                                <a href="{{ route('event_cancel', $event->id) }}" class="btn btn-success mb-1"><i class="fas fa-check"></i> Activate</a>
                            @endif
                            <a href="{{ route('event_delete', $event->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $eventList->links() }}
            </div>
        </div>
    </div>
@endsection
