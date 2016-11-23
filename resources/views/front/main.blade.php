@extends('front.app')

@section('content')
    <div id="fh5co-hotel-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Últimos Eventos y Charlas Añadidas</h2>
                    </div>
                </div>
            </div>
            <div class="row" id="myEvents">

                <event-card url="api/events?limit=3"></event-card>

            </div>

            <div class="row" id="mytalks">

                <talk-card url="api/talks?limit=3"></talk-card>

            </div>

        </div>
    </div>

    <template id="event-template">
        <div v-for="event in events">
            <div class="col-md-4">
                <div class="hotel-content">
                    <div class="hotel-grid" style="background-image: url(uploads/events/@{{ event.image }});">
                        <div class="price"><small>Precio</small><span>@{{ event.price }} €</span></div>
                        @if(auth()->user())
                            <a class="book-now text-center" href="{{ url('events/') }}/@{{ event.id }}/buy"> Comprar</a>
                        @else
                            <a class="book-now text-center" href="{{ url('events/') }}/@{{ event.id }}/form"> Comprar</a>
                        @endif
                        <div v-show="event.promo" class="promotion">
                            <h4><i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                Apúrate!!</h4>
                        </div>
                    </div>
                    <div class="desc fix-text-event">
                        <h3><a href="{{ url('events/show') }}/@{{ event.id }}"><strong>@{{ event.name }}</strong></a></h3>
                        <h4>
                            <i class="fa fa-calendar"></i>  @{{ event.start_date }} <span class="label label-primary pull-right">Evento</span>
                        </h4>
                        <h3><i class="fa fa-map-marker"></i>  @{{ event.address }}</h3>
                        <h3><i class="fa fa-ticket"></i>  @{{ event.total_tickets }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <template id="talk-template">
        <div v-for="talk in talks">
            <div class="col-md-4">
                <div class="hotel-content">
                    <div class="hotel-grid" style="background-image: url(uploads/talks/@{{ talk.image }});">
                        <div class="price"><small>Precio</small><span>@{{ talk.price }} €</span></div>
                        @if(auth()->user())
                            <a class="book-now text-center" href="{{ url('talks/') }}/@{{ talk.id }}/buy"> Comprar</a>
                        @else
                            <a class="book-now text-center" href="{{ url('talks/') }}/@{{ talk.id }}/form"> Comprar</a>
                        @endif
                        <div v-show="event.promo" class="promotion">
                            <h4><i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                Apúrate!!</h4>
                        </div>
                    </div>
                    <div class="desc fix-text-talk">
                        <h3><a href="{{ url('talks/show') }}/@{{ talk.id }}"><strong>@{{ talk.title }}</strong></a></h3>
                        <h4>
                            <i class="fa fa-calendar"></i>  @{{ talk.start_date }} <span class="label label-primary pull-right">@{{ talk.type }}</span>
                        </h4>
                        <h3><i class="fa fa-map-marker"></i>  @{{ talk.address }}</h3>
                        <h3><i class="fa fa-user"></i>  @{{ talk.speaker }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection

@section('scripts')
    <script src="{{ asset('js/vue/vue.js') }}"></script>
    <script src="{{ asset('js/vue/components/event-card.js') }}"></script>
    <script src="{{ asset('js/vue/components/talk-card.js') }}"></script>
@endsection