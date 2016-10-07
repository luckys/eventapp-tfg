<div class="form-group">
    <label  class="col-lg-3 col-sm-2 control-label">Contraseña Actual</label>
    <div class="col-lg-8">

        {!! Form::password('old_password', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-3 col-sm-2 control-label">Nueva Contraseña</label>
    <div class="col-lg-8">

        {!! Form::password('password', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-3 col-sm-2 control-label">Confirmar Nueva Contraseña</label>
    <div class="col-lg-8">

        {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('admin/auth/user/profile') }}" class="btn btn-default">Cancelar</a>

    </div>
</div>
