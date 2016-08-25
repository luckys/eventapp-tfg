
    <fieldset>
        <div class="form-group ">
            {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group ">
            <label for="email">Correo</label>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label>Nombre</label>
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label>Apellidos</label>
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-check fa-fw" aria-hidden="true"></i>Registrarse</button>
        </div>
    </fieldset>
