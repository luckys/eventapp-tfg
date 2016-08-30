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

        @include('front.partials.aside')

        @if(\Request::is('/'))
            @include('front.partials.navbar_counter')
        @endif

            @yield('content')

        @include('front.partials.footer')
    </div>

</div>

@include('front.partials.scripts')
</body>
</html>