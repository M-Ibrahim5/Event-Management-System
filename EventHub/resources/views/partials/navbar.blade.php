    <!-- partial navbar (specific) -->
    <nav class="eh-nav">
        <div class="eh-nav__inner">
            <a class="eh-brand" href="/">EventHub</a>

            <!--Search Bar-->
            <form action="{{ route('search') }}" method="GET" class="eh-search" role="search">
                <input type="search" name="keyword" value="{{ request('keyword') }}" placeholder="Search events" autocomplete="off" aria-label="Search events">
                <button type="submit">Search</button>
            </form>

            <div class="eh-actions">
                @guest
                    <a class="eh-navlink" href="/login">Log in</a>
                    <a class="eh-cta" href="/signup">Sign up</a>
                @else
                    <a class="eh-iconlink" href="/show2/{{ Auth::user()->email }}" aria-label="Favourites ({{ $favoriteCount }})">
                        <img alt="" src="{{ asset('img/icons/icon-heart.svg') }}">
                        @if ($favoriteCount > 0)
                            <span class="eh-badge">{{ $favoriteCount }}</span>
                        @endif
                    </a>

                    @include('partials.user-menu', ['links' => [['Manage my events', '/organization']]])
                @endguest
            </div>
        </div>
    </nav>
