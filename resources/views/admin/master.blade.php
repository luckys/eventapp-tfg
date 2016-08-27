<!doctype html>
<html lang="es">
<head>
    @include('admin.partials.header')

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