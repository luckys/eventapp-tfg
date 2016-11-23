@extends('front.app')

@section('content')

    <div id="fh5co-hotel-section">
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        @include('admin.partials.message')
                        <div class="panel panel-default">
                            <div class="panel-heading">Formulario para resetear la contraseña</div>
                            <div class="panel-body" style="height: auto">
                                @include('admin.errors.form_error')

                                {!! Form::open(['url' => 'auth/password/reset', 'class' => 'form-horizontal']) !!}

                                <div class="form-group">
                                    <div class="col-lg-8">

                                        {!! Form::hidden('token', $data['token'], ['class' => 'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-lg-3 col-sm-2 control-label">Correo</label>
                                    <div class="col-lg-8">

                                        {!! Form::email('email', $data['email'], ['class' => 'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-lg-3 col-sm-2 control-label">Nueva Contraseña</label>
                                    <div class="col-lg-8">

                                        {!! Form::password('password', null, ['class' => 'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-lg-3 col-sm-2 control-label">Confirmar Contraseña</label>
                                    <div class="col-lg-8">

                                        {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-8 col-md-offset-5">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-check fa-fw" aria-hidden="true"></i>Cambiar Password </button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br><br>
@endsection