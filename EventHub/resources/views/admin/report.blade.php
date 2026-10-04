@extends('layouts.adminmain')

@section('title', 'Event report · EventHub Admin')

@section('container')
    <a href="/events" class="eh-back">&larr; Back to events</a>

    <div class="eh-pagehead">
        <div>
            <h1>{{ $events->eventName }}</h1>
            <p>Event report &middot; <span class="eh-status eh-status--{{ strtolower($events->eventStatus) }}">{{ $events->eventStatus }}</span></p>
        </div>
    </div>

    <div class="eh-stats">
        <div class="eh-stat">
            <p class="eh-stat__label">Tickets sold</p>
            <p class="eh-stat__value">{{ $totalTicketsSold }} <small class="fs-6 fw-normal text-muted">of {{ $events->eventCapacity }}</small></p>
        </div>
        <div class="eh-stat">
            <p class="eh-stat__label">Total sales</p>
            <p class="eh-stat__value">RM {{ number_format((float) $totalAmountSold, 2) }}</p>
        </div>
    </div>

    <dl class="eh-facts">
        <div class="eh-fact" style="grid-column: 1 / -1;">
            <dt>About this event</dt>
            <dd class="fw-normal">{{ $events->eventDescription }}</dd>
        </div>
        <div class="eh-fact">
            <dt>Starts</dt>
            <dd>{{ $events->eventStartDate->format('D, j M Y') }}<br><span>{{ $events->eventStartTime->format('g:i A') }}</span></dd>
        </div>
        <div class="eh-fact">
            <dt>Ends</dt>
            <dd>{{ $events->eventEndDate->format('D, j M Y') }}<br><span>{{ $events->eventEndTime->format('g:i A') }}</span></dd>
        </div>
        <div class="eh-fact">
            <dt>Location</dt>
            <dd>{{ $events->eventLocation }}</dd>
        </div>
        <div class="eh-fact">
            <dt>Ticket price</dt>
            <dd>RM {{ number_format($events->eventPrice, 2) }}</dd>
        </div>
    </dl>

    <div class="buttons mt-4">
        <form action="/events" method="GET">
            <button type="submit" class="btn btn-primary" id="back">Back</button>
        </form>
    </div>
@endsection
