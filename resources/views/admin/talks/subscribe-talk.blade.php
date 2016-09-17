@extends('admin.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('themes/admin/js/jquery-multi-select/css/multi-select.css') }}">
@endsection

@section('content')
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    @include('admin.partials.message')
                    <div class="panel panel-default">
                        <div class="panel-heading">Subscribir Charla a Eventos</div>
                        <div class="panel-body">
                            @include('admin.errors.form_error')

                            {!! Form::model($talk, ['method' => 'PUT', 'route' => ['admin.talks.subscribe', $talk->id], 'id' => 'myForm']) !!}

                                <div class="form-group col-md-offset-2">

                                    {!! Form::select('event_id[]', $events, isset($talk_event) ? $talk_event : null, [
                                        'multiple' => true, 'id' => 'eventSelect']) !!}
                                </div>

                                <div class="form-group col-md-offset-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                                        Subscribir
                                    </button>
                                    <a href="{{ url('admin/talks') }}" class="btn btn-default">Cancelar</a>
                                </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('themes/admin/js/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
    <script>$('#eventSelect').multiSelect();</script>
@endsection