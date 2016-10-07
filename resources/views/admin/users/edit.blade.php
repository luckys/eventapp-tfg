@extends('admin.master')

@section('content')
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Actualizar Perfil</div>
                        <div class="panel-body">
                            @include('admin.errors.form_error')

                            {!! Form::model(auth()->user(), ['method' => 'PUT', 'url' => 'admin/auth/user/profile', 'class' => 'form-horizontal', 'files' => true]) !!}

                            @include('admin.users.form', ['button' => 'Actualizar'])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
