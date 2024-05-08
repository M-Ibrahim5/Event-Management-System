@extends('layouts.adminmain')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
    
                <div class="card">
                    <div class="card-header">
                        <h4>Add Event
                            <a href="{{ url('events') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
    
                        <form action="/storeevent" method="post" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="mb-3">
                                <label for="imagePath" class="form-label">Event Image</label>
                                <input type="file" class="form-control" id="imagePath" name="imagePath" accept="image/*" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventName" class="form-label">Event name</label>
                                <input type="text" class="form-control" id="eventName" name="eventName" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventDescription" class="form-label">Event description</label>
                                <textarea class="form-control" id="eventDescription" name="eventDescription" required></textarea>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventLocation" class="form-label">Location</label>
                                <input type="text" class="form-control" id="eventLocation" name="eventLocation" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventCategory" class="form-label">Category</label>
                                <input type="text" class="form-control" id="eventCategory" name="eventCategory" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventStartDate" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="eventStartDate"name="eventStartDate" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventStartTime" class="form-label">Start time</label>
                                <input type="time" class="form-control" id="eventStartTime" name="eventStartTime" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventEndDate" class="form-label">End date</label>
                                <input type="date" class="form-control" id="eventEndDate" name="eventEndDate" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventEndTime" class="form-label">End time</label>
                                <input type="time" class="form-control" id="eventEndTime" name="eventEndTime" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="eventPrice" min="0" name="eventPrice" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="eventCapacity" class="form-label">Capacity</label>
                                <input type="number" class="form-control" id="eventCapacity" min="1" name="eventCapacity" required>
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
                                            Select Sponsor<img src="{{ asset('img/down-arrow.png') }}" alt="downarrow" width="20"
                                                style="margin-left: 200px;">
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
                            </div>
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
                            <input type="hidden" name="sponsorStatus" value="Pending">
                            <input type="hidden" name="eventStatus" value="Pending">
                            <input type="hidden" name="email" value="EventHub@gmail.com">
                    
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection