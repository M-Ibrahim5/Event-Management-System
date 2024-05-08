<!--Extending template layout-->
@extends('layouts.main')

@section('container')

    <h3>Find your next event</h3>

    <div class="allEvent">
        <div class="eventButton">
            <a class="eventCategory" href="{{ route('events.category', ['category' => 'Music']) }}">
                <img class="eventImage" src="{{ asset('img/music.png') }}" alt="music">
            </a>
            <h6 class="eventTitle">Music</h6>
        </div>
        <div class="eventButton">
            <a class="eventCategory" href="{{ route('events.category', ['category' => 'Technology']) }}">
                <img class="eventImage" src="{{ asset('img/technology.png') }}" alt="art">
            </a>
            <h6 class="eventTitle">Technology</h6>
            <br>
        </div>
        <div class="eventButton">
            <a class="eventCategory" href="{{ route('events.category', ['category' => 'Education']) }}">
                <img class="eventImage" src="{{ asset('img/education.png') }}" alt="art">
            </a>
            <h6 class="eventTitle">Education</h6>
            <br>
        </div>
        <div class="eventButton">
            <a class="eventCategory" href="{{ route('events.category', ['category' => 'Sports']) }}">
                <img class="eventImage" src="{{ asset('img/sports.png') }}" alt="art">
            </a>
            <h6 class="eventTitle">Sport</h6>
            <br>
        </div>
        <div class="eventButton">
            <a class="eventCategory" href="{{ route('events.category', ['category' => 'Wedding']) }}">
                <img class="eventImage" src="{{ asset('img/wedding.png') }}" alt="art">
            </a>
            <h6 class="eventTitle">Wedding</h6>
            <br>
        </div>
        <div class="eventButton">
            <a class="eventCategory" href="{{ route('events.category', ['category' => 'Art']) }}">
                <img class="eventImage" src="{{ asset('img/art.png') }}" alt="art">
            </a>
            <h6 class="eventTitle">Perform & Visual Arts</h6>
            <br>
        </div>
    </div>

   

    <h3>Upcoming Events</h3> <br>
    
    <div class="d-flex flex-row">
        @foreach ($data as $event)
            <div class="card" style="width: 18rem; margin-right: 10px;">
                <img class="card-img-top img-fluid" alt="Responsive image event" src="{{ asset(optional($event)->imagePath) }}" alt="bigpic" style="width:300px; height:300;">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->eventName }}</h5>
                    <p class="card-text">{{ \Carbon\Carbon::parse($event->eventStartDate)->format('F j, Y') }}</p>
                    <p>Rm {{ $event->eventPrice }}</p>
                    <a href="{{ route('events.show', ['events' => $event->id]) }}" class="btn btn-primary">More</a>
                </div>
            </div>
        @endforeach
    </div>



@endsection        