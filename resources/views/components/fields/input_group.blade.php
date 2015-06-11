<div class="form-group @if($error) has-error @endif">
{!! Form::label($name, $label) !!}
<div class="input-group">
  	<span class="input-group-addon"><i class="{!! $icon !!}"></i></span>
  	{!! $control !!}
</div>
@if ($error) <p class="help-block">{!! $error !!}</p> @endif
</div>