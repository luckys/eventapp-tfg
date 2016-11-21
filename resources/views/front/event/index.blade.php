@extends('front.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('themes/admin/js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <style>
        .staggered-transition {
            transition: all .5s ease;
            overflow: hidden;
            margin: 0;
            height: 20px;
        }
        .staggered-enter, .staggered-leave {
            opacity: 0;
            height: 0;
        }
    </style>
@endsection

@section('content')
    <br><br><br><br>
    <div id="fh5co-hotel-section">
        <div class="container" id="myEvents">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Eventos</h2>
                    </div>
                </div>
            </div>

            @include('front.event.navbar-search-events')
            <br>

            <div class="row">
                <event-card
                        :filter-start-date="searchStartDate"
                        :filter-query="searchQuery"
                        :order="order"
                        url="api/events"
                >
                </event-card>
            </div>

        </div>
    </div>

    <template id="event-template">
        <div v-for="event in events | filterBy filterStartDate in 'start_date' | filterBy filterQuery in 'name' | orderBy 'price' order">
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
                            <i class="fa fa-calendar"></i>  @{{ event.start_date }}
                        </h4>
                        <h3><i class="fa fa-map-marker"></i>  @{{ event.address }}</h3>
                        <h3><i class="fa fa-ticket"></i>  @{{ event.total_tickets }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection



@section('scripts')
    <script src="{{ asset('themes/luxe/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('themes/luxe/js/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('js/vue/vue.js') }}"></script>
    <script src="{{ asset('js/vue/components/event-card.js') }}"></script>
    <script>

        var today = new Date();
        var actual = String(today.getFullYear()+'-'+("0" + (today.getMonth() + 1)).slice(-2)+'-'+today.getDate());

        $(".form_datetime").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: actual,
            language: 'es'
        });
    </script>
@endsection