@extends('layouts.main')

@section('title', 'Search · EventHub')

@section('container')
    <a href="{{ route('home') }}" class="eh-back">&larr; All events</a>

    <h2 class="eh-section-title">
        @if (filled($keyword))
            Results for &ldquo;{{ $keyword }}&rdquo;
        @else
            All events
        @endif
    </h2>

    @if ($results->isEmpty())
        <p class="eh-empty">No events match that search. Try a different name, or browse a category on the home page.</p>
    @else
        <div class="eh-events">
            @foreach ($results as $event)
                @include('partials.event-card')
            @endforeach
        </div>
    @endif
@endsection
