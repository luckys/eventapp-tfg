{{ csrf_field() }}
    <fieldset>
        <div class="form-group ">
            <label for="email">Correo</label>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <a href="{{ url('auth/password/email') }}">¿Has olvidado tu contraseña?</a>
        </div>

        <div class="form-group col-md-offset-5">
            <button class="btn btn-primary" type="submit"><i class="fa fa-check fa-fw" aria-hidden="true"></i>Entrar</button>
        </div>
    </fieldset>
