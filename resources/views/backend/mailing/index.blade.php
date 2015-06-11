@extends('backend.template.master')

@section('content')

<div class="row">
    <div class="col-md-8">
          <div class="box box-primary">
                {!! Form::open() !!}

                    @include('backend.mailing.partials.header')
                    @include('backend.mailing.partials.body')
                    @include('backend.mailing.partials.footer')

                {!! Form::close() !!}
          </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de subscriptores</h3>
            </div>
            @include('backend.mailing.partials.members')
        </div>
    </div>
</div>

@stop

@section('title')
    Subscriptores
@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"></link>
@stop

@section('scripts')
<script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$('#text-editor').wysihtml5();
</script>
@stop
