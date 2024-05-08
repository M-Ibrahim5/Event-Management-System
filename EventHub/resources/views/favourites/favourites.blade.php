<!--Extending template layout-->
@extends('layouts.main')

@section('container')
    <h3>Your Favourites list</h3><br>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <div class="card-header" style="background-color:#fff; border:none;">
                    {{-- <h4>
                        <a href="#" class="btn btn-danger float-start" onclick="goBack()">BACK</a>
                    </h4>

                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script> --}}
                    <h4>
                        <a href="{{ route('home') }}" class="btn btn-danger float-start">BACK</a>
                    </h4>

                </div>
                <div class="container my-5">
                    <div class="card shadow">
                        <div class="card-body">

                            @if ($eventDetails->count() > 0)
                                @foreach ($eventDetails as $events)
                                    <div class="row eventData justify-content-center align-items-center"
                                        style="margin:2em 0em 2em 0em; padding:2px;">
                                        <div class="col-md-3">
                                            <h6>{{ $events->eventName }}</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>{{ $events->eventLocation }}</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>{{ $events->eventStartDate->format('F j, Y') }},
                                                {{ $events->eventStartTime->format('g:i A') }}</h6>
                                        </div>
                                        {{-- if want to add tiecket sold out!! --}}
                                        <div class="col-md-3">
                                            <a href="{{ route('events.show', ['events' => $events->id]) }}"
                                                class="btn btn-success" style="width: 5em">More</a>


                                            <a href="{{ route('removeFavourites', ['eventId' => $events->id]) }}">
                                                <button type="button" class="btn btn-danger removeFavourites"> <i
                                                        class="fa fa-trash">
                                                        Remove</i></button>
                                            </a>

                                        </div>

                                    </div>
                                @endforeach
                            @else
                                <h4>There's no product in your favourites</h4>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
