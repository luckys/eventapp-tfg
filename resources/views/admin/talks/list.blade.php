@extends('admin.master')

@section('content')
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="success_message"></div>
            <section class="panel panel-default">
                <header class="panel-heading">
                    Administración de Charlas
                </header>
                <div class="panel-body">
                    <a class="btn btn-default" href="{{ url('admin/talks/create') }}" role="button">
                        <i class="fa fa-plus"> Nueva Charla</i>
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

                        <tr data-id="{{ $talk->id }}">
                            <td>{{ $talk->title }}</td>
                            <td>{{ $talk->type }}</td>
                            <td>{{ $talk->level }}</td>
                            <td>{{ $talk->start_date }}</td>
                            <td>{{ $talk->length }} min</td>
                            <td>{{ $talk->price }} €</td>
                            <td>
                                <p>
                                    <a class="btn btn-default" href="{{ url('admin/talks/'.$talk->id.'/subscribe/') }}">
                                        <i class="fa fa-book"></i>
                                    </a>
                                    <a class="btn btn-default" href="{{ url('admin/talks/show/'.$talk->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-default" href="{{ url('admin/talks/'.$talk->id.'/edit/') }}">
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

    {!! Form::open(['route' => ['admin.talks.destroy', ':ID'], 'method' => 'DELETE', 'id' => 'myForm']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection