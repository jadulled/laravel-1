<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Usuarios registrados</h3>
            </div>

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th class="hidden-xs text-center">ID</th>
                            <th class="text-center">Avatar</th>
                            <th>Nombre</th>
                            <th class="hidden-xs hidden-sm">Email</th>
                            <th></th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td class="hidden-xs text-center">{{ $user->id }}</td>
                                <td class="text-center">
                                    <img class="img-circle avatar" width="40" src="{{ asset($user->present()->photo) }}" alt="{{ $user->name }}"/>
                                </td>
                                <td>{{ $user->present()->fullName }}</td>
                                <td class="hidden-xs hidden-sm">{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-block btn-sm btn-default" href="{{ route('admin.users.edit', $user->slug) }}">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>