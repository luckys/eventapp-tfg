
<!-- Modal -->
<div class="modal fade" id="myModalSubscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subscribir Charla a Eventos</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'auth/login', 'method' => 'post']) !!}

                <div class="form-group col-md-offset-2">
                    {!! Form::select('event_id[]', $events, isset($talk_event) ? $talk_event : null, array(
                        'multiple' => true, 'class' => 'multi-select', 'id' => 'eventSelect')) !!}
                </div>

                <div class="form-group col-md-offset-4">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                        Subscribir
                    </button>
                    <button class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                        Cancelar
                    </button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>