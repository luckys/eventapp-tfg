@extends('front.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('themes/admin/js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')
    <br><br><br><br>
    <div id="fh5co-hotel-section">
        <div class="container" id="mytalks">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Charlas</h2>
                    </div>
                </div>
            </div>

            @include('front.talk.navbar-search-talks')
            <br>

            <div class="row">
                <talk-card
                        :filter-start-date="searchStartDate"
                        :filter-query="searchQuery"
                        :order="order",
                        url="api/talks"
                >
                </talk-card>
            </div>

        </div>
    </div>

    <template id="talk-template">
        <div v-for="talk in talks | filterBy filterStartDate in 'start_date' | filterBy filterQuery in 'title' | orderBy 'price' order">
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
                            <i class="fa fa-calendar"></i>  @{{ talk.start_date }}
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
    <script src="{{ asset('themes/luxe/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('themes/luxe/js/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('js/vue/vue.js') }}"></script>
    <script src="{{ asset('js/vue/components/talk-card.js') }}"></script>
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