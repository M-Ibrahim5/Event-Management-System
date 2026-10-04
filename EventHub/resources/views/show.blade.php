<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--Extending template layout-->
@extends('layouts.main')

@section('container')
    @php
        $ticketsLeft = max(0, $events->eventCapacity - $totalTicketsSold);
        $isOrganizer = Auth::check() && Auth::user()->email == $organizer->email;
    @endphp

    <a href="{{ route('home') }}" class="eh-back">&larr; All events</a>

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
                    <dd>{{ $events->eventStartDate->format('D, j M Y') }}<br>
                        <span>{{ $events->eventStartTime->format('g:i A') }}</span></dd>
                </div>
                <div class="eh-fact">
                    <dt>Ends</dt>
                    <dd>{{ $events->eventEndDate->format('D, j M Y') }}<br>
                        <span>{{ $events->eventEndTime->format('g:i A') }}</span></dd>
                </div>
                <div class="eh-fact">
                    <dt>Location</dt>
                    <dd>{{ $events->eventLocation }}</dd>
                </div>
                <div class="eh-fact">
                    <dt>Capacity</dt>
                    <dd>{{ $events->eventCapacity }} people</dd>
                </div>
                @if ($events->sponsor)
                    <div class="eh-fact">
                        <dt>Sponsor</dt>
                        <dd>{{ $events->sponsor }}</dd>
                    </div>
                @endif
                <div class="eh-fact">
                    <dt>Organizer</dt>
                    <dd>{{ $organizer->f_name }} {{ $organizer->l_name }}<br>
                        <span>{{ $organizer->email }}</span></dd>
                </div>
            </dl>
        </div>

        <aside class="eh-ticket" id="ticket">
            <h2 class="eh-ticket__name">Single pax</h2>
            <p class="eh-ticket__price">RM {{ number_format($events->eventPrice, 2) }}</p>

            @if ($ticketsLeft === 0)
                <p class="eh-ticket__left eh-ticket__left--out">Sold out</p>
            @elseif ($ticketsLeft <= 10)
                <p class="eh-ticket__left eh-ticket__left--low">Only {{ $ticketsLeft }} tickets left</p>
            @else
                <p class="eh-ticket__left">{{ $ticketsLeft }} tickets left</p>
            @endif

            <form action="/session" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="eventPrice" value="{{ $events->eventPrice }}">
                <input type="hidden" name="eventName" value="{{ $events->eventName }}">
                <input type="hidden" name="eventId" value="{{ $events->id }}">

                <label for="quantity" class="eh-ticket__label">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control" min="1"
                    max="{{ $ticketsLeft }}" value="1" @disabled($ticketsLeft === 0)>

                <div class="eh-ticket__actions">
                    <button type="submit" id="getTicket" class="btn btn-primary"
                        @disabled($isOrganizer || $ticketsLeft === 0)>Get tickets</button>

                    @if (Auth::check())
                        @if ($isOrganizer)
                            <span class="eh-fav addToFavourites is-disabled" aria-label="Organizers can't favourite their own event">
                                <img src="{{ asset('img/icons/icon-heart.svg') }}" alt="">
                            </span>
                        @else
                            <a class="eh-fav addToFavourites" aria-label="Add to favourites"
                                href="{{ route('addToFavourites2', ['eventId' => $events->id, 'email' => Auth::user()->email]) }}">
                                <img src="{{ asset('img/icons/icon-heart.svg') }}" alt="">
                            </a>
                        @endif
                    @else
                        <a class="eh-fav addToFavourites" aria-label="Log in to add to favourites" href="{{ route('login') }}">
                            <img src="{{ asset('img/icons/icon-heart.svg') }}" alt="">
                        </a>
                    @endif
                </div>
            </form>

            @if ($isOrganizer)
                <p class="eh-ticket__note">You organize this event, so ticket purchases are turned off.</p>
            @endif
        </aside>
    </div>

    @if (Auth::check())
        <script>
            var eventId = {{ $events->id }};
            var email = "{{ Auth::user()->email }}";
        </script>
    @endif

    @if (Session::has('status') || Session::has('error'))
        <script>
            @if (Session::has('status'))
                swal("status", "{{ Session::get('status') }}", 'success', {
                    button: "OK!",
                    timer: 3000,
                    dangerMode: true,
                });
            @elseif (Session::has('error'))
                swal("error", "{{ Session::get('error') }}", 'error', {
                    button: "OK!",
                    timer: 3000,
                    dangerMode: true,
                });
            @endif
        </script>
    @endif
@endsection
