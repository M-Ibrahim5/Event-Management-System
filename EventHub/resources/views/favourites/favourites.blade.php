<!--Extending template layout-->
@extends('layouts.main')

@section('title', 'Favourites · EventHub')

@section('container')
    <a href="{{ route('home') }}" class="eh-back">&larr; All events</a>

    <h2 class="eh-section-title">Your favourites</h2>

    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    @php $favouriteEvents = $eventDetails->filter(); @endphp

    @if ($favouriteEvents->isNotEmpty())
        <div class="eh-list">
            @foreach ($favouriteEvents as $events)
                <article class="eh-row">
                    <div class="eh-row__img">
                        <img src="{{ asset($events->imagePath) }}" alt="" loading="lazy" onerror="this.remove()">
                    </div>
                    <div>
                        <h3 class="eh-row__title">{{ $events->eventName }}</h3>
                        <p class="eh-row__meta">{{ $events->eventStartDate->format('D, j M Y') }},
                            {{ $events->eventStartTime->format('g:i A') }}</p>
                        <p class="eh-row__meta">{{ $events->eventLocation }}</p>
                    </div>
                    <div class="eh-row__actions">
                        <a href="{{ route('events.show', ['events' => $events->id]) }}" class="btn btn-primary btn-sm">View details</a>
                        <a href="{{ route('removeFavourites', ['eventId' => $events->id]) }}"
                            class="btn btn-outline-secondary btn-sm removeFavourites">Remove</a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <p class="eh-empty">You haven't saved any events yet. Tap the heart on an event to keep it here.</p>
    @endif
@endsection
