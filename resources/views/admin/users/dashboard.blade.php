@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="success_message"></div>
            <br>
            <section class="panel panel-default">
                <header class="panel-heading">
                    Charlas subscritas
                </header>

                <div class="panel-body">
                    <table class="table table-hover general-table">
                        <thead>
                        <tr>
                            <th> Charla</th>
                            <th> Fecha Inicial</th>
                            <th>Estado</th>
                            <th>Evento Subscrito</th>
                            <th>Fecha de Comienzo</th>
                            <th>Ponente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($talks as $talk)

                            <tr>
                                <td>{{ $talk->title }}</td>
                                <td>{{ $talk->initial_date }}</td>
                                <td>{!! $talk->status !!}</td>
                                <td>{{ $talk->name }}</td>
                                <td>{{ $talk->start_date }}</td>
                                <td>{{ $talk->firstname.' '.$talk->lastname }}</td>
                                <td>
                                    <p>
                                        <a class="btn btn-default" href="{{ url('admin/events/'.$talk->event_id.'/talks/change/state/'.$talk->id) }}">
                                            <i class="fa fa-random"></i>
                                        </a>
                                        <a class="btn btn-default" href="{{ url('admin/events/'.$talk->event_id.'/talks/delete/state/'.$talk->id) }}">
                                            <i class="fa fa-remove"></i>
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

@endsection
