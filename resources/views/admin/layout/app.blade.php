<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @stack('scripts')
  @vite('resources/css/app.css')
</head>
    <body class="flex">
        @yield('sidebar');
        <main class="flex-1 h-screen p-3 mt-12 overflow-y-scroll sm:p-4 md:p-7 md:mt-0">
            <header>
                @yield('header')
            </header>
            <main>
                @yield('content')
            </main>
            <footer>
                @yield('footer')
            </footer>
        </main>
    </body>
    @stack('scripts_low')
</html>
