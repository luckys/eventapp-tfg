@extends('admin.master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Evento</div>
                    <div class="panel-body">
                        <div></div>
                        <ul class="list-unstyled">
                            <li>
                                <h4>Nombre: {{ $event->name }}</h4>
                            </li>
                            <li>
                                <h4>Descripción: {{ $event->description }}</h4>
                            </li>
                            <li>
                                <h4>Fecha y Hora de Comienzo: {{ $event->start_date }}</h4>
                            </li>
                            <li>
                                <h4>Fecha y Hora de Terminación: {{ $event->end_date }}</h4>
                            </li>
                            <li>
                                <h4>Dirección: {{ $event->address }}</h4>
                            </li>
                            <li>
                                <h4>Precio: {{ $event->price }} €</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection