<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EventApp</title>
    @include('front.partials.styles')
</head>
<body>
<div id="fh5co-wrapper">
    <div id="fh5co-page">

        @include('front.partials.header')

        @unless((\Request::is('events/*/form')) ||
        (\Request::is('talks/*/form')) ||
         (\Request::is('auth/password/*')))
            @include('front.partials.aside')
        @endunless


        @if(\Request::is('/'))
            @include('front.partials.navbar_counter', [
                'total_users' => $users,
                'total_talks' => $talks,
                'total_events' => $events
            ])
        @endif

            @yield('content')

        @include('front.partials.footer')
    </div>

</div>

@include('front.partials.scripts')
</body>
</html>