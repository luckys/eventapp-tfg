@extends('front.app')

@section('content')

    <div id="fh5co-hotel-section">
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        @include('admin.partials.message')
                        <div class="panel panel-default">
                            <div class="panel-heading">Formulario para el envio de enlace de cambio de contraseña</div>
                            <div class="panel-body">
                                @include('admin.errors.form_error')

                                {!! Form::open(['url' => 'auth/password/email', 'class' => 'form-horizontal']) !!}

                                <div class="form-group">
                                    <label  class="col-lg-3 col-sm-2 control-label">Correo</label>
                                    <div class="col-lg-8">

                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-8 col-md-offset-5">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-check fa-fw" aria-hidden="true"></i>Enviar Enlace </button>
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