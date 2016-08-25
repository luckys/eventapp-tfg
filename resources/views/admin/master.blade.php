<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="#" type="{{ asset('themes/admin/images/favicon.ico') }}">
    <title>EventApp</title>

    @include('admin.partials.styles')
</head>

    <body class="sticky-header">
        <section>

            @include('admin.partials.sidebar')

            @include('admin.partials.header_top')

                <div class="main-content" >

                    @yield('content')

            @include('admin.partials.footer')

                </div>

    </section>

    @include('admin.partials.scripts')
    </body>
</html>