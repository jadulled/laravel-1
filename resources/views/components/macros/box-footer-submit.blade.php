<div class="box-footer">
    <div class="box-tools">
        <button type="submit" class="btn btn-app pull-right"><i class="fa fa-save"></i> Save</button>

        {!! Form::close() !!}

        <a href="{{ route($route) }}" class="btn btn-app no-margin">
            <i class="fa fa-reply"></i> Cancel
        </a>
        @if(isset($entity) && ($entity->exists))
            @if($entity instanceof \App\Modules\Users\User)
                @if($entity->id != Auth::User()->id)
                    {!! Field::deleteButton($entity) !!}
                @endif
            @else
                {!! Field::deleteButton($entity) !!}
            @endif
        @endif
    </div>
</div>
