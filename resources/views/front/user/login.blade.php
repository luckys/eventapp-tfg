<div id="form-register">
    <!-- Modal -->
    <div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Iniciar Sesión
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {!! Form::open(['url' => 'auth/login', 'method' => 'post']) !!}

                    @include('front.user.form-login')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>


