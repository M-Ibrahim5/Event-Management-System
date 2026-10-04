<!--Extending template layout-->
@extends('layouts.adminmain')

@section('title', 'Review event · EventHub Admin')

@section('container')
    <a href="/requests" class="eh-back">&larr; Back to event requests</a>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif

    <div class="eh-hero">
        <img src="{{ asset($events->imagePath) }}" alt="{{ $events->eventName }}" onerror="this.remove()">
    </div>

    <div class="eh-detail">
        <div class="eh-detail__main">
            <p class="eh-detail__category">{{ $events->eventCategory }}</p>
            <h1 class="eh-detail__title">{{ $events->eventName }}</h1>
            <p class="eh-detail__desc">{{ $events->eventDescription }}</p>

            <dl class="eh-facts">
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
                    <dt>Capacity</dt>
                    <dd>{{ $events->eventCapacity }} people</dd>
                </div>
            </dl>
        </div>

        <aside class="eh-ticket">
            <h2 class="eh-ticket__name">Ticket price</h2>
            <p class="eh-ticket__price">RM {{ number_format($events->eventPrice, 2) }}</p>
            <p class="eh-ticket__left">Current status:
                <span class="eh-status eh-status--{{ strtolower($events->eventStatus) }}">{{ $events->eventStatus }}</span></p>

            <div class="buttons d-grid gap-2">
                <form action="{{ url('update-status/' . $events->id . '/accepted') }}" method="POST" class="d-grid">
                    @csrf
                    <button type="submit" class="btn btn-success" id="accept">Accept</button>
                </form>
                <form action="{{ url('update-status/' . $events->id . '/rejected') }}" method="POST" class="d-grid">
                    @csrf
                    <button type="submit" class="btn btn-danger" id="reject">Reject</button>
                </form>
                <form action="/requests" method="GET" class="d-grid">
                    <button type="submit" class="btn btn-outline-secondary" id="back">Back</button>
                </form>
            </div>
        </aside>
    </div>
@endsection
