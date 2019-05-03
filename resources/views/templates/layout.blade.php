<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Werkgroepensite - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        @yield('style')
    </style>
</head>
<body>
    @if(auth()->check())
        <div class="row">
            <div class="col-12">
                @include('templates.partials.navbar')
            </div>
        </div>
    @endif
    <div class="row">
        @if(auth()->check())
            <div class="col-2">
                @include('templates.partials.sidebar')
            </div>
        @endif
        <div class="@if(auth()->check()) col-10 @else col-12 @endif">
            @include('templates.partials.status')
            <div id="app">
                @yield('content')
            </div>
            <footer class="footer">
              <div class="content has-text-centered">
                <p>Iewan - werkgroepensite</p>
              </div>
            </footer>
        </div>
    </div>
</body>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
</html>
