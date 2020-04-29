<div class="modal modal-danger fade" id="modal-delete-{{$documento->id}}">
        {{Form::open(array('action'=>array('admin\documentosController@destroy',$documento->id),'method'=>'delete'))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Eliminar Registro</h4>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea Eliminar el documento</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline">Confirmar</button>
                </div>
            </div>
        </div>
        {{Form::close()}}
    </div>