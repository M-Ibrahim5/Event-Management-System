    <!-- partial navbar (organizer) -->
    <nav class="eh-nav">
        <div class="eh-nav__inner">
            <a class="eh-brand" href="/organization">EventHub</a>

            <div class="eh-actions ms-auto">
                @guest
                    <a class="eh-navlink" href="/login">Log in</a>
                    <a class="eh-cta" href="/signup">Sign up</a>
                @else
                    <a class="eh-cta" href="{{ route('organization.createEvent') }}">Create</a>
                    @include('partials.user-menu', ['links' => [['Switch to attending', '/']]])
                @endguest
            </div>
        </div>
    </nav>

    <div class="eh-tabs">
        <div class="eh-tabs__inner">
            <a href="{{ route('organizationhome') }}" class="{{ request()->is('organization') ? 'is-active' : '' }}">Home</a>
            <a href="{{ route('organization.showEvent') }}" class="{{ request()->is('organization/manageEvent*') ? 'is-active' : '' }}">Events</a>
        </div>
    </div>
