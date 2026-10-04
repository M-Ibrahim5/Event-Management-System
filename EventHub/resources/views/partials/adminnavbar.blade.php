@php
    $adminLinks = [
        ['Events', '/events', ['events*', 'createevent', 'editevent/*', 'report/*']],
        ['Event Requests', '/requests', ['requests*', 'details/*']],
        ['Sponsorship Requests', '/sponsor2', ['sponsor2*']],
        ['Sponsorships', '/sponsors', ['sponsors*', 'createsponsor', 'editsponsor/*']],
        ['Accounts', '/accounts', ['accounts*', 'createuser']],
    ];
@endphp
<nav class="eh-nav eh-nav--admin">
    <div class="eh-nav__inner">
        <a class="eh-brand" href="/admin">EventHub<small>Admin</small></a>

        <ul class="eh-menu-links">
            @foreach ($adminLinks as [$label, $href, $patterns])
                <li>
                    <a href="{{ $href }}" class="{{ request()->is(...$patterns) ? 'is-active' : '' }}"
                        @if (request()->is(...$patterns)) aria-current="page" @endif>{{ $label }}</a>
                </li>
            @endforeach
        </ul>

        <div class="eh-actions">
            <a class="eh-navlink" href="/logout">Log out</a>
        </div>
    </div>
</nav>
