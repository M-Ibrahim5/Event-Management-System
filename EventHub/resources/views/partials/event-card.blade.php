@php $start = \Carbon\Carbon::parse($event->eventStartDate); @endphp
<article class="eh-card">
    <div class="eh-card__media">
        {{-- If the image file is missing, drop the broken icon and keep the grey frame --}}
        <img src="{{ asset($event->imagePath) }}" alt="{{ $event->eventName }}" loading="lazy" onerror="this.remove()">
        <span class="eh-date">
            <span class="eh-date__day">{{ $start->format('j') }}</span>
            <span class="eh-date__month">{{ $start->format('M') }}</span>
        </span>
    </div>
    <div class="eh-card__body">
        <h3 class="eh-card__title">{{ $event->eventName }}</h3>
        <p class="eh-card__when">{{ $start->format('l, F j, Y') }}</p>
        <div class="eh-card__foot">
            <span class="eh-price">RM {{ number_format($event->eventPrice, 2) }}</span>
            <a href="{{ route('events.show', ['events' => $event->id]) }}" class="btn btn-primary">View details</a>
        </div>
    </div>
</article>
