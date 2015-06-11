<div class="form-group @if($errors->has('html')) has-error @endif">
    {!! Form::textarea('html', null, ['class' => 'form-control', 'id' => 'text-editor', 'style' => 'height:300px', 'placeholder' => 'Escribe aqui tu mensaje!']) !!}
    @if($errors->has('html'))<p class="help-block">{{ $errors->first('html') }}</p>@endif
</div>



