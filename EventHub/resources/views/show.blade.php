<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--Extending template layout-->
@extends('layouts.main')

@section('container')
    {{--     <img class="themepic" src="{{ asset('img/eventoffuture.jpg') }}" alt="bigpic"> --}}
    <img class="img-fluid" alt="Responsive image" src="{{ asset(optional($events)->imagePath) }}" alt="bigpic">

    <div class="eventInfo">
        <div class="eventInfo2">
            <br>
            <h2 style="font-weight: bold">{{ $events->eventName }}</h2>
            <p>{{ $events->eventDescription }}</p>
            <h5>Date and time</h5>
            <h6 style="font-style: italic">Start</h6>
            <p>{{ $events->eventStartDate->format('F j, Y') }}, {{ $events->eventStartTime->format('g:i A') }}</p>
            <h6 style="font-style: italic">End</h6>
            <p>{{ $events->eventEndDate->format('F j, Y') }}, {{ $events->eventEndTime->format('g:i A') }}</p>
            <h5>Capacity</h5>
            <p>{{ $events->eventCapacity }} Pax</p>
            <h5>Sponsor</h5>
            <p>{{ $events->sponsor }}</p>
            <p style="color: red;">*Only {{ $events->eventCapacity - $totalTicketsSold }} Ticket left !</p>
            <h5>Location</h5>
            <p>{{ $events->eventLocation }}</p>
            <h5>Organizer</h5>
            <p>{{ $organizer->f_name }} {{ $organizer->l_name }}
                <br> Contacts : {{ $organizer->email }}
            </p>
        </div>

        <div class="card" id="ticket" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Single Pax</h5>
                <p class="card-text">RM {{ $events->eventPrice }}</p>

                <form action="/session" method="POST">
                    <label for="quantity">Quantity:</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="number" id="quantity" name="quantity" min="1"
                        max="{{ $events->eventCapacity - $totalTicketsSold }}" value="1">
                    <input type="hidden" name="eventPrice" value="{{ $events->eventPrice }}">
                    <input type="hidden" name="eventName" value="{{ $events->eventName }}">
                    <input type="hidden" name="eventId" value="{{ $events->id }}">
                    <br><br>
                    @if (Auth::check() && Auth::user()->email == $organizer->email)
                        <button type="submit" class="btn btn-primary" disabled>Get Tickets</button>
                    @else
                        <button type="submit" class="btn btn-primary">Get Tickets</button>
                    @endif
                </form>
                {{-- --------------------------------- --}}
                @if (Auth::check())
                    <script>
                        var eventId = {{ $events->id }};
                        var email = "{{ Auth::user()->email }}";
                    </script>

                    <div class="product-action-1 show">
                        @if (Auth::check() && Auth::user()->email == $organizer->email)
                            <a aria-label="Add To Favourite" class="action-btn hover-up addToFavourites" href="#"
                                disabled>
                                <img src="{{ asset('img/icons/icon-heart.svg') }}" alt="Heart Icon" style="padding:6px;">
                            </a>
                        @else
                            <a aria-label="Add To Favourite" class="action-btn hover-up addToFavourites"
                                href="{{ route('addToFavourites2', ['eventId' => $events->id, 'email' => Auth::user()->email]) }}">
                                <img src="{{ asset('img/icons/icon-heart.svg') }}" alt="Heart Icon" style="padding:6px;">
                            </a>
                        @endif




                    </div>
            </div>
        @else
            <div class="product-action-1 show">
                <a aria-label="Add To Favourite" class="action-btn hover-up addToFavourites" href="{{ route('login') }}">
                    <img src="{{ asset('img/icons/icon-heart.svg') }}" alt="Heart Icon" style="padding:6px;">
                </a>
            </div>
            @endif
            <h4>
                <a href="{{ route('home') }}" class="btn btn-danger float-start">BACK</a>
            </h4>


        </div>
        <div clas="mmg" style="width:15em; height:5em;">

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


        </div>


    </div>

    </div>
@endsection
