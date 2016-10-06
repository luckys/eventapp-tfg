<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Correo</label>
    <div class="col-lg-8">

        {!! Form::email('email', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Nombre</label>
    <div class="col-lg-8">

        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Apellidos</label>
    <div class="col-lg-8">

        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Compañia</label>
    <div class="col-lg-8">

        {!! Form::text('company', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Biografía</label>
    <div class="col-lg-8">

        {!! Form::textarea('biography', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Github</label>
    <div class="col-lg-8">

        {!! Form::text('url_github', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Twitter</label>
    <div class="col-lg-8">

        {!! Form::text('url_twitter', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Foto de Perfil</label>
    <div class="col-lg-8">

        {!! Form::file('photo', null) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('admin/auth/user/profile') }}" class="btn btn-default">Cancelar</a>

    </div>
</div>
