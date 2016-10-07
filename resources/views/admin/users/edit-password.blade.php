@extends('admin.master')

@section('content')
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Cambiar Contraseña</div>
                        <div class="panel-body">
                            @include('admin.errors.form_error')

                            {!! Form::open(['method' => 'PATCH', 'url' => 'admin/auth/user/change-password', 'class' => 'form-horizontal']) !!}

                            @include('admin.users.form-password', ['button' => 'Cambiar'])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
