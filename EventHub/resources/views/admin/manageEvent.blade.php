@extends('layouts.adminmain')

@section('title', 'Events · EventHub Admin')

@section('container')
    <div class="eh-pagehead">
        <div>
            <h1>Events</h1>
            <p>Every event on the platform, whatever its status.</p>
        </div>
        <a href='/createevent' class="btn btn-primary">Add Event</a>
    </div>

    <!--Search Bar-->
    <form class="eh-toolbar" role="search" method="GET" action="{{ url('/events') }}">
        <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Search events" aria-label="Search events">
        <button class="btn btn-dark" type="submit">Search</button>
        <a class="btn btn-outline-secondary" href="{{ url('/events') }}">Clear</a>
    </form>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="allEvents eh-panel">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
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
                        <th scope="row">{{ $event->id }}</th>
                        <td>
                            <a href="{{ url('editevent/' . $event->id) }}">{{ $event->eventName }}</a>
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
                                <a href="{{ url('report/' . $event->id) }}" class="btn btn-outline-secondary btn-sm">View</a>
                                <a href="{{ url('editevent/' . $event->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                <form action="{{ url('deleteevent/' . $event->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="9" class="text-center text-muted py-5">No events found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
