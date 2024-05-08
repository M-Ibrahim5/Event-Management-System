<!--Extending template layout-->
@extends('layouts.createmain')

@section('container')
    <a href="{{ route('organization.showEvent') }}">
        <button type="button" class="btn btn-info mb-3">Back</button>
    </a>
    <h3>Edit Event</h3>

    <form action="/updateEvent/{{ $data->id }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="imagePath" class="form-label">Event Image</label>
            <input type="file" class="form-control" id="imagePath" name="imagePath" accept="image/*"
                onchange="previewImage()">
        </div>

        <div class="mb-3">
            <label for="eventName" class="form-label">Event name</label>
            <input type="text" class="form-control" id="eventName" name="eventName" value="{{ $data->eventName }}"
                required>
        </div>

        <div class="mb-3">
            <label for="eventDescription" class="form-label">Event description</label>
            <textarea class="form-control" id="eventDescription" name="eventDescription" required>{{ $data->eventDescription }}</textarea>
        </div>

        <div class="mb-3">
            <label for="eventLocation" class="form-label">Location</label>
            <input type="text" class="form-control" id="eventLocation" name="eventLocation"
                value="{{ $data->eventLocation }}" required>
        </div>

        <div class="mb-3">
            <label for="eventCategory" class="form-label">Category</label>
            <input type="text" class="form-control" id="eventCategory" name="eventCategory"
                value="{{ $data->eventCategory }}" required>
        </div>

        <div class="mb-3">
            <label for="eventStartDate" class="form-label">Start date</label>
            <input type="date" class="form-control" id="eventStartDate" name="eventStartDate"
                value="{{ $data->eventStartDate->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="eventStartTime" class="form-label">Start time</label>
            <input type="time" class="form-control" id="eventStartTime" name="eventStartTime"
                value="{{ date('H:i', strtotime($data->eventStartTime)) }}" required>
        </div>

        <div class="mb-3">
            <label for="eventEndDate" class="form-label">End date</label>
            <input type="date" class="form-control" id="eventEndDate" name="eventEndDate"
                value="{{ $data->eventEndDate->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="eventEndTime" class="form-label">End time</label>
            <input type="time" class="form-control" id="eventEndTime" name="eventEndTime"
                value="{{ date('H:i', strtotime($data->eventEndTime)) }}" required>
        </div>

        <div class="mb-3">
            <label for="eventPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="eventPrice" min="0" name="eventPrice"
                value="{{ $data->eventPrice }}" required>
        </div>

        <div class="mb-3">
            <label for="eventCapacity" class="form-label">Capacity</label>
            <input type="number" class="form-control" id="eventCapacity" min="1" name="eventCapacity"
                value="{{ $data->eventCapacity }}" required>
        </div>
        <div class="mb-3">
            <label for="eventSponsor" class="form-label">Sponsor</label>
            <h7>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sponsorship Name</th>
                            <th scope="col">Sponsorship Description</th>
                            <th scope="col">Max Sponsorship Amount(RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sponsorships as $sponsor)
                            <tr>
                                <td>{{ $sponsor->sponsorName }}</td>
                                <td>{{ $sponsor->sponsorDescription }}</td>
                                <td>{{ $sponsor->sponsorAmount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </h7>
            <h10>
                <b>*note: Sponsorship application will be approve/reject by the admin and may take up to 7 working days
                    .</b>
            </h10>
            <li class="nav-item dropdown">
                <div class="dropdown">
                    <a class="mt-3 nav-link" href="#" style="border: 3px solid black; width: 350px; padding: 2px;"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false" id="selectedSponsor">
                        Selected: {{ $data->sponsor }}<img src="{{ asset('img/down-arrow.png') }}" alt="downarrow" width="20"
                            style="margin-left: 140px;">
                    </a>

                    <ul class="dropdown-menu" style="width: 350px;">
                        @foreach ($sponsorships as $sponsor)
                            <li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="updateSponsor(event, '{{ $sponsor->sponsorName }}')">
                                    {{ $sponsor->sponsorName }}
                                </a>
                            </li>

            </li>
            @endforeach
            </ul>

            </li>

            <!-- Hidden input field with id="sponsor" -->
            <input type="hidden" class="form-control" id="sponsor" name="sponsor" required>

            <script>
                function updateSponsor(event, sponsorName) {
                    event.preventDefault(); // Prevent the default behavior (page refresh)

                    // Update the text of the dropdown button
                    document.getElementById('selectedSponsor').innerText = 'Selected: ' + sponsorName;

                    // Update the value of the hidden input field
                    document.getElementById('sponsor').value = sponsorName;
                }
            </script>

            {{-- <input type="number" class="form-control" id="eventCapacity" min="1" name="eventCapacity" required>  --}}
        </div>

        <!-- Hidden Input Example -->
        
        <input type="hidden" name="SponsorStatus" value="Pending">
        <input type="hidden" name="eventStatus" value="Pending">
        <input type="hidden" name="imagePath" value={{ $data->pathImage }}>
        {{-- <input type="hidden" name="id" value="{{ $$data->id }}"> --}}


        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
