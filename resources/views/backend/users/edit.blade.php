@extends('backend.template.master')

@section('content')
    <div class="row">
        <div class="col-md-8">

            {!! Form::model($user, ['route' => ['admin.users.update', $user->slug ], 'method' => 'PUT', 'files' => true]) !!}

                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">{{ $user->name }}</h3>
                    </div>

                    @include('backend.users.partials.form')

                    {!! Form::boxFooterSubmit('admin.users.index', $user) !!}

                </div>

            {!! Form::close() !!}

            @include('backend.users.partials.delete')

        </div>
    </div>
@stop

@section('title')
    User Management
    <small>Edit User</small>
@stop
