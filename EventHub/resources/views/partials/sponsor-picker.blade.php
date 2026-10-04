{{-- Sponsorship choice for the event forms. Expects $sponsorships and $selected (current sponsor name or ''). --}}
<h2 class="eh-form-section">Sponsorship</h2>

@if ($sponsorships->isNotEmpty())
    <div class="eh-panel eh-sponsor-table">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sponsor</th>
                    <th scope="col">What they offer</th>
                    <th scope="col" class="text-end">Max amount (RM)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorships as $sponsor)
                    <tr>
                        <td>{{ $sponsor->sponsorName }}</td>
                        <td>{{ $sponsor->sponsorDescription }}</td>
                        <td class="text-end">{{ $sponsor->sponsorAmount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<div class="mb-3">
    <label for="sponsor" class="form-label">Apply to</label>
    <select class="form-select" id="sponsor" name="sponsor">
        <option value="">No sponsor</option>
        {{-- keep a current sponsor that isn't in the sponsorship list, so saving doesn't drop it --}}
        @if (filled($selected) && ! $sponsorships->contains('sponsorName', $selected))
            <option value="{{ $selected }}" selected>{{ $selected }}</option>
        @endif
        @foreach ($sponsorships as $sponsor)
            <option value="{{ $sponsor->sponsorName }}" @selected($selected === $sponsor->sponsorName)>{{ $sponsor->sponsorName }}</option>
        @endforeach
    </select>
    <p class="eh-help">An admin approves or rejects sponsorship applications. This can take up to 7 working days.</p>
</div>
