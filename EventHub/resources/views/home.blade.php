<!--Extending template layout-->
@extends('layouts.main')

@section('container')

    <section class="eh-section">
        <h2 class="eh-section-title">Find your next event</h2>

        <div class="eh-categories">
            @foreach ([
                ['Music', 'Music', 'music.png'],
                ['Technology', 'Technology', 'technology.png'],
                ['Education', 'Education', 'education.png'],
                ['Sports', 'Sport', 'sports.png'],
                ['Wedding', 'Wedding', 'wedding.png'],
                ['Art', 'Performing & visual arts', 'art.png'],
            ] as [$slug, $label, $icon])
                <a class="eh-category" href="{{ route('events.category', ['category' => $slug]) }}">
                    <img src="{{ asset('img/' . $icon) }}" alt="">
                    <span>{{ $label }}</span>
                </a>
            @endforeach
        </div>
    </section>

    <section class="eh-section">
        <h2 class="eh-section-title">Upcoming events</h2>

        @if ($data->isEmpty())
            <p class="eh-empty">No upcoming events yet. Check back soon.</p>
        @else
            <div class="eh-events">
                @foreach ($data as $event)
                    @include('partials.event-card')
                @endforeach
            </div>
        @endif
    </section>

@endsection
