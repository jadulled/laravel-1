
<button type="button" class="btn btn-app no-margin" data-toggle="modal" data-target="#{{ $id }}"><i class="fa fa-trash-o"></i> Eliminar</button>

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="{{ $id }}Label"><i class="fa fa-trash-o"></i> Eliminar elemento</h4>
            </div>
            {!! Form::open(['route' => [$route, $entity->id], 'method' => 'DELETE']) !!}
                <div class="modal-body">
                    ¿Confirma eliminar este elemento?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger ">Eliminar</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>