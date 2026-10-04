@extends('layouts.adminmain')

@section('title', 'Sponsorship requests · EventHub Admin')

@section('container')
    <div class="eh-pagehead">
        <div>
            <h1>Sponsorship Requests</h1>
            <p>Organizers applying for a sponsor on their event.</p>
        </div>
    </div>

    <!--Search Bar-->
    <form class="eh-toolbar" role="search" method="GET" action="{{ url('/sponsor2') }}">
        <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Search requests" aria-label="Search requests">
        <button class="btn btn-dark" type="submit">Search</button>
        <a class="btn btn-outline-secondary" href="{{ url('/sponsor2') }}">Clear</a>
    </form>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    @if ($data->count() == 0)
        <p class="eh-empty">No sponsorship requests to review.</p>
    @else
        <div class="allEvents eh-panel">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Event</th>
                        <th scope="col">Category</th>
                        <th scope="col">Start date</th>
                        <th scope="col">Price (RM)</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Event status</th>
                        <th scope="col">Sponsor status</th>
                        <th scope="col"><span class="visually-hidden">Actions</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $request)
                        <tr>
                            <td>
                                {{ $request->eventName }}
                                <span class="eh-sub">{{ $request->eventLocation }}</span>
                            </td>
                            <td>{{ $request->eventCategory }}</td>
                            <td class="eh-nowrap">{{ $request->eventStartDate->format('j M Y') }}</td>
                            <td>{{ $request->eventPrice }}</td>
                            <td>{{ $request->eventCapacity }}</td>
                            <td><span class="eh-status eh-status--{{ strtolower($request->eventStatus) }}">{{ $request->eventStatus }}</span></td>
                            <td><span class="eh-status eh-status--{{ strtolower($request->sponsorStatus ?? '') }}">{{ $request->sponsorStatus }}</span></td>
                            <td>
                                <div class="eh-actions-cell">
                                    <form action="{{ url('updateSponsorStatus/' . $request->id . '/accepted') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" id="accept">Accept</button>
                                    </form>
                                    <form action="{{ url('updateSponsorStatus/' . $request->id . '/rejected') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" id="reject">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
