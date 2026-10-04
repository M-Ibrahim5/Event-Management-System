{{-- Logged-in user pill + dropdown. Pass $links = [[label, href], ...] shown above "Log out". --}}
<div class="dropdown">
    <a class="nav-link eh-user dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="eh-user__avatar">{{ strtoupper(substr(Auth::user()->email, 0, 1)) }}</span>
        <span class="eh-user__email">{{ Auth::user()->email }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end eh-menu">
        @foreach ($links as [$label, $href])
            <li><a class="dropdown-item" href="{{ $href }}">{{ $label }}</a></li>
        @endforeach
        <li><a class="dropdown-item" href="/logout">Log out</a></li>
    </ul>
</div>
