<div class="form-group @if($errors->has('subject')) has-error @endif">
    {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'ASUNTO:']) !!}
    @if($errors->has('subject'))<p class="help-block">{{ $errors->first('subject') }}</p>@endif
</div>
