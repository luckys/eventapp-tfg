@extends('admin.master')

@section('content')
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                @include('admin.partials.message')
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Eventos para Suscribirse</div>
                        <div class="panel-body">
                            <table class="table table-hover general-table">
                                <thead>
                                <tr>
                                    <th> Nombre</th>
                                    <th>Fecha de Comienzo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($events as $event)

                                    {!! Form::open(['method' => 'POST', 'route' => ['admin.events.subscribe', $talk->id]]) !!}
                                    {!! Form::hidden('event_id', $event->id) !!}
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->start_date }}</td>
                                        <td>
                                            <button class="btn btn-primary" type="submit">Suscribir</button>
                                        </td>
                                    </tr>
                                    {!! Form::close() !!}
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Eventos Suscritos</div>
                        <div class="panel-body">
                            <table class="table table-hover general-table">
                                <thead>
                                <tr>
                                    <th> Nombre</th>
                                    <th>Fecha de Comienzo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($talk_event as $event)

                                    {!! Form::open(['method' => 'POST', 'route' => ['admin.events.unsubscribe', $talk->id]]) !!}
                                    {!! Form::hidden('event_id', $event->id) !!}
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->start_date }}</td>
                                        <td>
                                            <button class="btn btn-primary" type="submit">Desvincular</button>
                                        </td>
                                    </tr>
                                    {!! Form::close() !!}
                                @endforeach

                                </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
