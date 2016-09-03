@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Administración de Charlas
                </header>
                <div class="panel-body">
                    <a class="btn btn-default" href="{{ url('admin/talks/create') }}" role="button">
                        <i class="fa fa-plus"></i>
                    </a>
                    <table class="table table-hover general-table">
                        <thead>
                        <tr>
                            <th> Título</th>
                            <th> Tipo</th>
                            <th> Nivel</th>
                            <th>Fecha de Comienzo</th>
                            <th>Duración</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($talks as $talk)

                        <tr>
                            <td>{{ $talk->title }}</td>
                            <td>{{ $talk->type }}</td>
                            <td>{{ $talk->level }}</td>
                            <td>{{ $talk->start_date }}</td>
                            <td>{{ $talk->length }} min</td>
                            <td>{{ $talk->price }} €</td>
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