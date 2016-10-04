<div id="form-payment">
    <!-- Modal -->
    <div class="modal fade" id="myModalPayment" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Proceso de Compra
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {!! Form::open(['route' => ['events.buy', ':ID'], 'method' => 'POST', 'id' => 'myForm']) !!}
                    <fieldset>
                        <div class="form-group ">
                            <label>Nombre y Apellidos</label>
                            {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group ">
                            <label for="email">Correo</label>
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-md-offset-5">
                            <button class="btn btn-primary btn-pay" type="submit"><i class="fa fa-check fa-fw" aria-hidden="true"></i>Comprar</button>
                        </div>
                    </fieldset>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>


