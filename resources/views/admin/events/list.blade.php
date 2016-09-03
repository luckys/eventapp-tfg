@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Administración de Eventos
                </header>
                <div class="panel-body">
                    <a class="btn btn-default" href="{{ url('admin/events/create') }}" role="button">
                        <i class="fa fa-plus"></i>
                    </a>
                    <table class="table table-hover general-table">
                        <thead>
                        <tr>
                            <th> Nombre</th>
                            <th>Fecha de Comienzo</th>
                            <th>Fecha de Terminación</th>
                            <th>Dirección</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($events as $event)

                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>{{ $event->address }}</td>
                            <td>{{ $event->price }} €</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-default" href="#" role="button">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-success" href="#" role="button">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#" role="button">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                </div>
            </section>
        </div>
    </div>
@stop