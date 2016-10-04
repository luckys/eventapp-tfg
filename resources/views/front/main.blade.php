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

                <event-card url="api/all"></event-card>

            </div>

        </div>
    </div>

    <template id="event-template">
        <div v-for="event in events">
            <div class="col-md-4">
                <div class="hotel-content">
                    <div class="hotel-grid" style="background-image: url(uploads/events/@{{ event.image }});">
                        <div class="price"><small>Precio</small><span>@{{ event.price }} €</span></div>
                        <a class="book-now text-center" href=""> Comprar</a>
                    </div>
                    <div class="desc fix-text-event">
                        <h3><a href="{{ url('events/show') }}/@{{ event.id }}"><strong>@{{ event.name }}</strong></a></h3>
                        <h4>
                            <i class="fa fa-calendar"></i>  @{{ event.start_date }}
                        </h4>
                        <h3><i class="fa fa-map-marker"></i>  @{{ event.address}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection

@section('scripts')
    <script src="{{ asset('js/vue/vue.js') }}"></script>
    <script src="{{ asset('js/vue/components/event-card.js') }}"></script>
@endsection