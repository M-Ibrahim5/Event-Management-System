<!--Extending template layout-->
@extends('layouts.adminmain')

@section('container')
<div>
    <h1 style="padding-left: 100px; display: inline-flex; font-weight: bold;">
        {{ $events->eventName }}
    </h1>
</div>
<div class="eventDetailsContainer">
    <div class="eventInfo">
        <div class="eventInfo2" style="margin-left: 0.8em;">
            <br>
            <p>{{ $events->eventDescription }}</p>
            <h5>Date and time</h5>
                <h6 style="font-style: italic">Start</h6>
                    <p>{{ $events->eventStartDate->format('F j, Y') }}, {{ $events->eventStartTime->format('g:i A') }}</p>
                <h6 style="font-style: italic">End</h6>
                    <p>{{ $events->eventEndDate->format('F j, Y') }}, {{ $events->eventEndTime->format('g:i A') }}</p>
            <h5>Location</h5>
                <p>{{ $events->eventLocation }}</p>
             <h5>Organizer</h5>
            <h5>Sales</h5>
                <p>Total Ticket Sold: {{ $totalTicketsSold }} Pax</p>
                <p>Total Sales: RM {{ $totalAmountSold }}</p>
        </div>
    </div>
    <!--<img class="detailpic" src="{{ asset('img/eventoffuture.jpg') }}" alt="bigpic" style="width: 45%; height: auto;">-->

</div>
    <br><br>

    <div class="buttons">
        <form action="/events" method="GET" style="margin-left: 95px; display: inline-flex;">
            @csrf     
            <button type='submit' class="btn btn-primary btn-large" data-toggle="tooltip" id="back">
                Back
            </button>
        </form>
        <br><br>
    </div>
@endsection  