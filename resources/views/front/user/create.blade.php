<div id="form-register">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Registrarse
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {!! Form::open(['url' => 'auth/signup', 'method' => 'post']) !!}

                        @include('front.user.form-register')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

