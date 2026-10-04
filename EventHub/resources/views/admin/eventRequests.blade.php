@extends('layouts.adminmain')

@section('title', 'Event requests · EventHub Admin')

@section('container')
    <div class="eh-pagehead">
        <div>
            <h1>Event Requests</h1>
            <p>Review events submitted by organizers and accept or reject them.</p>
        </div>
    </div>

    <!--Search Bar-->
    <form class="eh-toolbar" role="search" method="GET" action="{{ url('/requests') }}">
        <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Search requests" aria-label="Search requests">
        <button class="btn btn-dark" type="submit">Search</button>
        <a class="btn btn-outline-secondary" href="{{ url('/requests') }}">Clear</a>
    </form>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="allEvents eh-panel">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Category</th>
                    <th scope="col">Dates</th>
                    <th scope="col">Time</th>
                    <th scope="col">Price (RM)</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Status</th>
                    <th scope="col"><span class="visually-hidden">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $event)
                    <tr>
                        <td>
                            {{ $event->eventName }}
                            <span class="eh-sub">{{ $event->eventLocation }}</span>
                        </td>
                        <td>{{ $event->eventCategory }}</td>
                        <td class="eh-nowrap">
                            {{ $event->eventStartDate->format('j M Y') }}
                            @if (! $event->eventStartDate->isSameDay($event->eventEndDate))
                                <span class="eh-sub">to {{ $event->eventEndDate->format('j M Y') }}</span>
                            @endif
                        </td>
                        <td class="text-nowrap">{{ $event->eventStartTime->format('g:i A') }} &ndash; {{ $event->eventEndTime->format('g:i A') }}</td>
                        <td>{{ $event->eventPrice }}</td>
                        <td>{{ $event->eventCapacity }}</td>
                        <td><span class="eh-status eh-status--{{ strtolower($event->eventStatus) }}">{{ $event->eventStatus }}</span></td>
                        <td>
                            <div class="eh-actions-cell">
                                <form action="{{ url('details/' . $event->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary btn-sm">View</button>
                                </form>
                                <form action="{{ url('updateStatus/' . $event->id . '/accepted') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" id="accept">Accept</button>
                                </form>
                                <form action="{{ url('updateStatus/' . $event->id . '/rejected') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" id="reject">Reject</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center text-muted py-5">No event requests to review.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
