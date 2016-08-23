<div class="form-group">
    <div class="col-lg-8">

        {!! Form::hidden('id', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Nombre</label>
    <div class="col-lg-8">

        {!! Form::text('name', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Descripción</label>
    <div class="col-lg-8">

        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Fecha y Hora de comienzo</label>

    <div class="col-lg-4">

        {!! Form::date('start_date', null, ['class' => 'form-control']) !!}


    </div>
    <div class="col-lg-4">

        {!! Form::time('start_time', null, ['class' => 'form-control']) !!}

    </div>

</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">Fecha y Hora de clausura</label>
    <div class="col-lg-4">

        {!! Form::date('end_date', null, ['class' => 'form-control']) !!}

    </div>
    <div class="col-lg-4">

        {!! Form::time('end_time', null, ['class' => 'form-control']) !!}

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
    <label  class="col-lg-2 col-sm-2 control-label">Portada</label>
    <div class="col-lg-8">

        {!! Form::file('image', null) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}

    </div>
</div>
