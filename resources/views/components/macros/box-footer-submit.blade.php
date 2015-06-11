<div class="box-footer">
    <div class="box-tools">
        <button type="submit" class="btn btn-app pull-right"><i class="fa fa-save"></i> Save</button>
        <a href="{{ route($route) }}" class="btn btn-app no-margin">
            <i class="fa fa-reply"></i> Cancel
        </a>
        @if(isset($entity) && ($entity->exists))
            @if($entity instanceof \App\CaliforniaElectricalTraining\Users\User)
                @if($entity->id != Auth::User()->id)
                <a class="btn btn-app no-margin" data-toggle="modal" data-target="#modal_delete">
                    <i class="fa fa-trash"></i> Delete
                </a>
                @endif
            @else
                <a class="btn btn-app no-margin" data-toggle="modal" data-target="#modal_delete">
                    <i class="fa fa-trash"></i> Delete
                </a>
            @endif
        @endif
    </div>
</div>
