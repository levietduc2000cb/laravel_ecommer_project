<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @stack('scripts')
  @vite('resources/css/app.css')
</head>
    <body>
        <header>
            @yield('header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
    @stack('scripts_footer')
</html>
