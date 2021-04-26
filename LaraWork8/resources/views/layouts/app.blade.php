<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <style>
          [x-cloak] { display: none; }
        </style>
    </head>
    <body>

      @include('partials.navbar')
      <livewire:flash />

      <div class="container mx-auto px-4">
        @yield('content')
      </div>
      @livewireScripts
    </body>
</html>