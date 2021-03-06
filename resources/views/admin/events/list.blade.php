@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="success_message"></div>
            <br>
            <section class="panel panel-default">
                <header class="panel-heading">
                    Administración de Eventos
                </header>

                <div class="panel-body">
                    <a class="btn btn-default" href="{{ url('admin/events/create') }}" role="button">
                        <i class="fa fa-plus"> Nuevo Evento</i>
                    </a>

                    <table class="table table-hover general-table">
                        <thead>
                        <tr>
                            <th> Nombre</th>
                            <th>Fecha de Comienzo</th>
                            <th>Fecha de Terminación</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($events->isEmpty())
                            <tr class="text-center"><td>No hay eventos para mostrar</td></tr>
                        @endif

                        @foreach($events as $event)

                            <tr data-id="{{ $event->id }}">
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->end_date }}</td>
                                <td>{{ $event->price }} €</td>
                                <td>
                                    <p>
                                        <a class="btn btn-default" href="{{ url('events/show/'.$event->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-default" href="{{ url('admin/events/'.$event->id.'/edit/') }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-default btn-del" data-toggle="button">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    </div>

    {!! Form::open(['route' => ['admin.events.destroy', ':ID'], 'method' => 'DELETE', 'id' => 'myForm']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection