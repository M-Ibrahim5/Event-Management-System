<!doctype html>
<html lang="en">
  <head>
    @include('partials.head')
  </head>
<body class="site">

  @include('partials.navbar')

    <main class="eh-page">
        @yield('container')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/org.js') }}"></script>
  </body>
</html>
