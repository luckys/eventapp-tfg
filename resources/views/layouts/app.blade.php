<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EventApp</title>
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
</head>
<body>
<div id="fh5co-wrapper">
    <div id="fh5co-page">
        @include('partials.header')

        @include('partials.aside')

        @include('partials.navbar_search')

        @include('partials.navbar_counter')

        @include('partials.content')

        @include('partials.footer')
    </div>

</div>

<script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>
<script src="{{ asset('js/app1.js') }}"></script>
</body>
</html>