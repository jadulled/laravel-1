@extends('backend.template.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('admin.users.create') }}" class="btn btn-app pull-right">
                <i class="fa fa-user-plus"></i> Agregar
            </a>
        </div>
    </div>
    @include('backend.users.partials.table')
@stop

@section('title')
    Usuarios
@stop

@section('scripts')

<script type="text/javascript">

      $("#check-all").on('ifUnchecked', function(event) {
          $("input[type='checkbox']", "#users").iCheck("uncheck");
      });

      $("#check-all").on('ifChecked', function(event) {
          $("input[type='checkbox']", "#users").iCheck("check");
      });
</script>
@stop