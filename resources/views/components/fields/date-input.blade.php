<div class="form-group @if($error) has-error @endif">
    {!! Form::label($name, $label) !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! $control !!}
    </div>
     @if ($error) <p class="help-block">{!!$error !!}</p> @endif
</div>