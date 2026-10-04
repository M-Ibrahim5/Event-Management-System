@extends('layouts.adminmain')

@section('title', 'Admin home · EventHub Admin')

@section('container')
    <div class="eh-pagehead">
        <div>
            <h1>Admin home</h1>
            <p>What needs your attention right now.</p>
        </div>
    </div>

    <div class="Requests eh-stats">
        <div class="eh-stat">
            <p class="eh-stat__label">Pending requests</p>
            <p class="eh-stat__value">{{ $count }}</p>
            <p class="eh-footnote mt-2 mb-3">
                @if ($count == 0)
                    You're all caught up.
                @else
                    {{ $count }} {{ \Illuminate\Support\Str::plural('event', $count) }} waiting for review.
                @endif
            </p>
            <a href="/requests" class="btn btn-primary">View</a>
        </div>
        <a class="eh-stat text-decoration-none text-reset" href="/events">
            <p class="eh-stat__label">Live events</p>
            <p class="eh-stat__value">{{ $liveEvents }}</p>
        </a>
        <a class="eh-stat text-decoration-none text-reset" href="/sponsors">
            <p class="eh-stat__label">Sponsorships</p>
            <p class="eh-stat__value">{{ $sponsorCount }}</p>
        </a>
        <a class="eh-stat text-decoration-none text-reset" href="/accounts">
            <p class="eh-stat__label">Accounts</p>
            <p class="eh-stat__value">{{ $accountCount }}</p>
        </a>
    </div>
@endsection
