@extends('admin.master')

@section('content')
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include('admin.partials.message')
                    <div class="panel panel-default">
                        <div class="panel-heading">Nuevo Evento</div>
                        <div class="panel-body">
                            @include('admin.errors.form_error')

                            {!! Form::open(['url' => 'admin/events', 'class' => 'form-horizontal', 'id' => 'nameForm', 'files' => true]) !!}

                            @include('admin.events.form', ['button' => 'Agregar'])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
