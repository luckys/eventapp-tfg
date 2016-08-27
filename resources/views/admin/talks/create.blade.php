@extends('admin.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('themes/admin/js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include('admin.partials.message')
                    <div class="panel panel-default">
                        <div class="panel-heading">Nueva Charla</div>
                        <div class="panel-body">
                            @include('admin.errors.form_error')

                            {!! Form::open(['url' => 'admin/talks', 'class' => 'form-horizontal', 'id' => 'nameForm', 'files' => true]) !!}

                            @include('admin.talks.form', ['button' => 'Agregar'])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('themes/admin/js/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}"></script>
    <script src="{{ asset('themes/admin/js/bootstrap-datetimepicker/js/datetimepicker-init.js') }}"></script>
@endsection
