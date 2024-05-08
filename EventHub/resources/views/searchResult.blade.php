@extends('layouts.main')

@section('container')
    <h3>Search Results</h3>
    <br>
    <div class="d-flex flex-row">
        @foreach ($results as $event)
            <div class="card" style="width: 18rem; margin-right: 10px;">
                <img src="{{ asset(optional($event)->imagePath) }}" class="card-img-top" alt="event">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->eventName }}</h5>
                    <p class="card-text">{{ $event->eventStartDate->format('F j, Y') }}</p>
                    <p>Rm {{ $event->eventPrice }}</p>
                    <a href="{{ route('events.show', ['events' => $event->id]) }}" class="btn btn-primary">More</a>
                </div>
            </div>
        @endforeach
    </div>


@endsection   