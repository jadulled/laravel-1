

    <div class="box-body">

        {!! Field::text('name') !!}
        {!! Field::email('email') !!}
        {!! Field::password('password') !!}
        {!! Field::password('password_confirmation') !!}
        {!! Field::select('type', Lang::get('utils.roles')) !!}

        {!! Field::file('avatar') !!}

        @if(isset($user) and file_exists($user->avatar))
        <div class="row text-center">
            <img class="img-circle avatar" src="{!! asset($user->avatar) !!}"  width="100">
        </div>
        @endif

    </div>


