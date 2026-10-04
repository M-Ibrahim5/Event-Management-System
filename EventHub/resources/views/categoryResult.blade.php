@extends('layouts.main')

@section('container')

    <a href="{{ route('home') }}" class="eh-back">&larr; All events</a>

    @if ($results->isEmpty())
        <p class="eh-empty">No events in this category yet. Check back soon.</p>
    @else
        <h2 class="eh-section-title">{{ $category }} events</h2>
        <div class="eh-events">
            @foreach ($results as $event)
                @include('partials.event-card')
            @endforeach
        </div>
    @endif

@endsection
