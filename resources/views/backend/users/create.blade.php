@extends('backend.template.master')

@section('content')
    <div class="row">
        <div class="col-md-8">

            {!! Form::open(['route' => ['admin.users.store'], 'files' => true]) !!}

                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">New User</h3>
                    </div>

                    @include('backend.users.partials.form')

                    {!! Form::boxFooterSubmit('admin.users.index') !!}

                </div>

            {!! Form::close() !!}

        </div>

    </div>
@stop

@section('title')
    User Management
    <small>New User</small>
@stop

@section('scripts')

@stop