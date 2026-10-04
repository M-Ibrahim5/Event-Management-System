<!doctype html>
<html lang="en">
  <head>
    @include('partials.head')
  </head>
  <body class="site">
    <main class="eh-auth">
        <div class="eh-auth__card">
            <a href="/" class="eh-brand eh-auth__brand">EventHub</a>
            @yield('container')
        </div>
    </main>
  </body>
</html>
