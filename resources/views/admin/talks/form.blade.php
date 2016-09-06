<div class="form-group">
    <div class="col-lg-8">

        {!! Form::hidden('id', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Título</label>
    <div class="col-lg-8">

        {!! Form::text('title', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Descripción</label>
    <div class="col-lg-8">

        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Tipo</label>
    <div class="col-lg-8">

        {!! Form::select('type', ['Seminario' => 'Seminario', 'Taller' => 'Taller', 'Conferencia' => 'Conferencia'], null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Nivel</label>
    <div class="col-lg-8">

        {!! Form::select('level', ['Principiante' => 'Principiante', 'Intermedio' => 'Intermedio', 'Avanzado' => 'Avanzado'], null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Fecha y Hora de comienzo</label>

    <div class="col-lg-4">

        {!! Form::text('start_date', null, ['class' => 'form-control form_datetime']) !!}

    </div>

</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Tiempo de Duración</label>
    <div class="col-lg-4">

        {!! Form::text('length', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Aforo</label>
    <div class="col-lg-8">

        {!! Form::text('capacity', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Dirección</label>
    <div class="col-lg-8">

        {!! Form::text('address', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Precio €</label>
    <div class="col-lg-8">

        {!! Form::text('price', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Archivo de Presentación</label>
    <div class="col-lg-8">

        {!! Form::file('file', null) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Portada</label>
    <div class="col-lg-8">

        {!! Form::file('image', null) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Notas</label>
    <div class="col-lg-8">

        {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('admin/talks') }}" class="btn btn-default">Cancelar</a>

    </div>
</div>
