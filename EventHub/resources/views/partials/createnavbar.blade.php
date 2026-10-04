    <!-- partial navbar (create / edit event) -->
    <nav class="eh-nav eh-nav--simple">
        <div class="eh-nav__inner">
            <a class="eh-brand" href="/organization">EventHub</a>

            <div class="eh-actions">
                @guest
                    <a class="eh-navlink" href="/login">Log in</a>
                    <a class="eh-cta" href="/signup">Sign up</a>
                @else
                    @include('partials.user-menu', ['links' => [['Switch to attending', '/']]])
                @endguest
            </div>
        </div>
    </nav>
