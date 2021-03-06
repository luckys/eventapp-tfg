@extends('front.app')

@section('content')
    <br><br><br><br><br><br>
        <div class="tab-content-container">
            <div class="tab-content active show" data-tab-content="tab1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('uploads/events/'.$event->image) }}" class="img-responsive" alt="Image">
                        </div>
                        <div class="col-md-6">
                            <span class="super-heading-sm">Evento</span>
                            <h3 class="heading">{{ $event->name }}</h3>
                            <p>{{ $event->description }}</p>
                            <p class="service-hour">
                                <span>Fecha y Hora de Comienzo:</span>
                                <strong>{{ $event->start_date }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Fecha y Hora de Terminación:</span>
                                <strong>{{ $event->end_date }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Dirección:</span>
                                <strong>{{ $event->address }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Precio:</span>
                                <strong>
                                    {{ $event->price }} €
                                    @if(auth()->user())
                                        <a class="btn btn-primary" role="button" href="{{ url('events/'.$event->id.'/buy') }}"> Comprar</a>
                                    @else
                                        <a class="btn btn-primary" role="button" href="{{ url('events/'.$event->id.'/form') }}"> Comprar</a>
                                    @endif
                                </strong>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Charlas Subscritas al Evento</div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    @foreach($talks as $talk)
                                    <a href="{{ url('talks/show/'.$talk->id) }}" class="list-group-item">
                                        <div>
                                            <div class="media-left">
                                                <img class="media-object" src="{{ asset('uploads/talks/'.$talk->image) }}" width="64" height="64" alt="...">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{ $talk->title }} <span class="label label-info">{{ $talk->start_date }}</span></h4>
                                                <span>Ponente:</span>
                                                <strong>{{ $talk->speaker->fullname }}</strong>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </br>
@endsection