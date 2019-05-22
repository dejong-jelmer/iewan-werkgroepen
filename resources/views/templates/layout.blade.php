<!DOCTYPE html>
<html lang="nl" class="has-navbar-fixed-top">
<head>
    <meta charset="UTF-8">
    <title>Werkgroepensite - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        @yield('style')
    </style>
</head>
<body>
    @if(auth()->check())
        @include('templates.partials.navbar')
    @endif
    <div class="columns is-gapless">
        @if(auth()->check())
            <div class="column is-2 is-hidden-mobile sidebar-column">
                @include('templates.partials.sidebar',[
                        'workgroups' => isset($workgroups) ? $workgroups : null
                    ])
            </div>
        @endif
        @if(!auth()->check()) <div class="column is-3"></div> @endif
        <div class="column @if(!auth()->check()) is-6 @else is-10 is-full-mobile main-content @endif">
             <div id="app" class="container is-fluid">
                 @include('templates.partials.status')
                 @yield('content')
             </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
    @stack('script-partials')
    <script>
        $(document).ready(function(){
          $('.notification .delete').each(function() {
            var notification = this.parentNode;
            $(this).click(function(){
                notification.parentNode.removeChild(notification);
                });
            });
        });
    </script>
</body>
</html>
