<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
    <a class="navbar-brand" href="/">EventHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item {{ request()->is('events*') ? 'active' : '' }}">
                <a class="nav-link" href="/events">Events</a> 
            </li>
            <li class="nav-item {{ request()->is('requests*') ? 'active' : '' }}">
                <a class="nav-link" href="/requests">Event Requests</a>
            </li>
            <li class="nav-item {{ request()->is('sponsor2*') ? 'active' : '' }}">
                <a class="nav-link" href="sponsor2">Sponsorship Requests</a>
            </li>
            <li class="nav-item {{ request()->is('sponsors*') ? 'active' : '' }}">
                <a class="nav-link" href="/sponsors">Sponsorships</a>
            </li>
            <li class="nav-item {{ request()->is('accounts*') ? 'active' : '' }}">
                <a class="nav-link" href="/accounts">Accounts</a>
            </li>
            <li class="nav-item {{ request()->is('accounts*') ? 'active' : '' }}">
                <a class="nav-link" href="/logout">Log out</a>
            </li>
        </ul>
    </div>
</div>
</nav>