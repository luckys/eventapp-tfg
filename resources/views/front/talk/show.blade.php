@extends('front.app')

@section('content')
    <br><br><br><br><br><br>
        <div class="tab-content-container">
            <div class="tab-content active show" data-tab-content="tab1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('uploads/talks/'.$talk->image) }}" class="img-responsive" alt="Image">
                        </div>
                        <div class="col-md-6">
                            <span class="super-heading-sm">Charla</span>
                            <h3 class="heading">{{ $talk->title }}</h3>
                            <p>{{ $talk->description }}</p>
                            <p class="service-hour">
                                <span>Fecha y Hora de Comienzo:</span>
                                <strong>{{ $talk->start_date }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Tipo:</span>
                                <strong>{{ $talk->type }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Nivel:</span>
                                <strong>{{ $talk->level }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Duración:</span>
                                <strong>{{ $talk->length }} min</strong>
                            </p>
                            <p class="service-hour">
                                <span>Dirección:</span>
                                <strong>{{ $talk->address }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Url Slide:</span>
                                <strong>{{ $talk->url_slide }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Archivo Adicional:</span>
                                <strong>{{ $talk->file }}</strong>
                            </p>
                            <p class="service-hour">
                                <span>Precio:</span>
                                <strong>
                                    {{ $talk->price }} €
                                    @if(auth()->user())
                                        <a class="btn btn-primary" role="button" href="{{ url('talks/'.$talk->id.'/buy') }}"> Comprar</a>
                                    @else
                                        <a class="btn btn-primary" role="button" href="{{ url('talks/'.$talk->id.'/form') }}"> Comprar</a>
                                    @endif
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </br>
@endsection