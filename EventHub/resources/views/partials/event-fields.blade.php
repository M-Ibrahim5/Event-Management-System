{{--
    Shared event form fields (organizer create/edit + admin add).
    Expects: $sponsorships, optional $event (model, when editing), optional $imageRequired (bool).
--}}
@php
    $event = $event ?? null;
    $imageRequired = $imageRequired ?? false;
    $val = fn ($field, $fallback = '') => old($field, $event?->{$field} ?? $fallback);
@endphp

<h2 class="eh-form-section">Basics</h2>

<div class="mb-3">
    <label for="imagePath" class="form-label">Event image</label>
    <input type="file" class="form-control" id="imagePath" name="imagePath" accept="image/*"
        @required($imageRequired) onchange="previewEventImage(this)">
    <p class="eh-help">Landscape photos work best. Every image is shown cropped to the same 21:9 banner.</p>
    @if ($event && $event->imagePath)
        <img class="eh-imgpreview" id="imagePreview" src="{{ asset($event->imagePath) }}" alt="Current event image"
            onerror="this.remove()">
    @else
        <img class="eh-imgpreview d-none" id="imagePreview" alt="Selected image preview">
    @endif
</div>

<div class="mb-3">
    <label for="eventName" class="form-label">Event name</label>
    <input type="text" class="form-control" id="eventName" name="eventName" value="{{ $val('eventName') }}" required>
</div>

<div class="mb-3">
    <label for="eventDescription" class="form-label">Description</label>
    <textarea class="form-control" id="eventDescription" name="eventDescription" rows="4" required>{{ $val('eventDescription') }}</textarea>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label for="eventLocation" class="form-label">Location</label>
        <input type="text" class="form-control" id="eventLocation" name="eventLocation" value="{{ $val('eventLocation') }}" required>
    </div>
    <div class="col-md-6">
        <label for="eventCategory" class="form-label">Category</label>
        <input type="text" class="form-control" id="eventCategory" name="eventCategory" list="eventCategories"
            value="{{ $val('eventCategory') }}" autocomplete="off" required>
        <datalist id="eventCategories">
            @foreach (['Music', 'Technology', 'Education', 'Sports', 'Wedding', 'Art'] as $category)
                <option value="{{ $category }}"></option>
            @endforeach
        </datalist>
        <p class="eh-help">Pick one of the suggestions so the event shows up under that category.</p>
    </div>
</div>

<h2 class="eh-form-section">Date and time</h2>

<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label for="eventStartDate" class="form-label">Start date</label>
        <input type="date" class="form-control" id="eventStartDate" name="eventStartDate"
            value="{{ old('eventStartDate', $event?->eventStartDate?->format('Y-m-d')) }}" required>
    </div>
    <div class="col-sm-6">
        <label for="eventStartTime" class="form-label">Start time</label>
        <input type="time" class="form-control" id="eventStartTime" name="eventStartTime"
            value="{{ old('eventStartTime', $event?->eventStartTime?->format('H:i')) }}" required>
    </div>
    <div class="col-sm-6">
        <label for="eventEndDate" class="form-label">End date</label>
        <input type="date" class="form-control" id="eventEndDate" name="eventEndDate"
            value="{{ old('eventEndDate', $event?->eventEndDate?->format('Y-m-d')) }}" required>
    </div>
    <div class="col-sm-6">
        <label for="eventEndTime" class="form-label">End time</label>
        <input type="time" class="form-control" id="eventEndTime" name="eventEndTime"
            value="{{ old('eventEndTime', $event?->eventEndTime?->format('H:i')) }}" required>
    </div>
</div>

<h2 class="eh-form-section">Tickets</h2>

<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label for="eventPrice" class="form-label">Price per ticket (RM)</label>
        <input type="number" class="form-control" id="eventPrice" min="0" step="any" name="eventPrice" value="{{ $val('eventPrice') }}" required>
    </div>
    <div class="col-sm-6">
        <label for="eventCapacity" class="form-label">Capacity</label>
        <input type="number" class="form-control" id="eventCapacity" min="1" name="eventCapacity" value="{{ $val('eventCapacity') }}" required>
    </div>
</div>

@include('partials.sponsor-picker', ['selected' => $val('sponsor')])

<script>
    function previewEventImage(input) {
        var preview = document.getElementById('imagePreview');
        if (!preview || !input.files || !input.files[0]) { return; }
        preview.src = URL.createObjectURL(input.files[0]);
        preview.classList.remove('d-none');
    }
</script>
