<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div id="success_message"></div>

        <section class="panel panel-info">
            <header class="panel-heading">
                Eventos Disponibles de Subscripción
            </header>

            <div class="panel-body">

                <table class="table table-hover general-table">
                    <thead>
                    <tr>
                        <th> Nombre</th>
                        <th>Fecha de Comienzo</th>
                        <th>Fecha de Terminación</th>
                        <th>Dirección</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($events as $event)

                        <tr data-id="{{ $event->id }}">
                            <td><a href="{{ url('admin/events/show/'.$event->id) }}">
                                    {{ $event->name }}
                                </a>
                            </td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>{{ $event->address }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </section>
    </div>
</div>