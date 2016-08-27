@extends('front.app')

@section('content')
    <div id="fh5co-hotel-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Eventos y Charlas</h2>
                    </div>
                </div>
            </div>
            <div class="row" id="myEvents">

                <event-card></event-card>

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
                    <div class="desc">
                        <h3><a href="{{ url('events/show') }}/@{{ event.id }}">@{{ event.name }}</a></h3>
                        <p>@{{ event.description | truncate '100' }}</p>
                        <h4>
                            <span class="label label-default">Comienzo:</span>  @{{ event.start_date }}
                        </h4>
                        <h4><span class="label label-default">Fin:</span>  @{{ event.end_date }}</h4>
                        <h4><span class="label label-default">Dirección:</span>  @{{ event.address }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection



@section('scripts')
    <script src="{{ asset('js/vue/vue.js') }}"></script>
    <script>

        Vue.component('event-card', {
            template: '#event-template',

            data: function () {
                return {
                    events: []
                }
            },

            filters: {

                truncate: function(string, value) {
                    return string.substring(0, value) + '...';
                }

            },

            created: function () {
                this.fetchEventList();
            },

            methods: {
                fetchEventList: function () {
                    $.getJSON('api/events', function (event) {
                        this.events = event;

                        console.log(event);

                    }.bind(this));
                }
            }
        });

        new Vue({
            el: '#myEvents'
        });
    </script>
@endsection