<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EventApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('partials.styles')


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
    <!-- END fh5co-page -->

</div>
<!-- END fh5co-wrapper -->

@include('partials.scripts')

</body>
</html>